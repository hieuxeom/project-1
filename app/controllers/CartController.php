<?php

class CartController extends BaseController
{
    private $cartModel;
    private $userModel;
    private $voucherModel;
    private $productModel;

    public function __construct()
    {
        if ($this->checkLogin()) {
            $this->loadModel("CartModel");
            $this->cartModel = new CartModel();

            $this->loadModel("UserModel");
            $this->userModel = new UserModel();

            $this->loadModel("VoucherModel");
            $this->voucherModel = new VoucherModel();

            $this->loadModel("ProductModel");
            $this->productModel = new ProductModel();

        } else {
            return header("Location: " . BASEPATH . "/home");
        }
    }

    private function checkLogin()
    {
        if ($_SESSION['is_login']) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        $userId = $_SESSION['user_id'];
        $cartId = $_REQUEST["cartId"] ?? null;

        if (isset($cartId)) {
            $cartItems = $this->cartModel->getCartItems(cartId: $cartId);
            $cartData = $this->cartModel->getCartInfo(cartId: $cartId);
        } else {
            $cartItems = $this->cartModel->getCartItems($userId);
            $cartData = $this->cartModel->getCartInfo($userId);
        }

        $voucherId = $cartData["voucher_id"];
        if ($this->voucherModel->canUseVoucher($voucherId)) {
            $voucherData = $this->cartModel->getVoucherData($cartData["voucher_id"]);
        } else {
            $this->voucherModel->removeUsingVoucher($voucherId);
        }
        return $this->view(viewPath: "cart.index", params: [
            "cartData" => $cartData ?? null,
            "cartItems" => $cartItems ?? null,
            "voucherData" => $voucherData ?? null,
        ]);
    }

    public function delete()
    {
        $prodId = $_GET["prodId"];
        $cartId = $_GET["cartId"];
        $this->cartModel->removeItemsInCart(cartId: $cartId, productId: $prodId);
        return header("Location: " . BASEPATH . "/cart?cartId=$cartId");
    }

    public function update()
    {
        return $this->cartModel->updateQuantity(cartId: $_POST["cartId"], quantity: $_POST["quantity"], productId: $_POST["prodId"]);
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            return header("Location: " . BASEPATH . "/cart");
        }

        return $this->cartModel->addItemsToCart(cartId: $_POST["cartId"], productId: $_POST["prodId"], quantity: $_POST["quantity"]);
    }

    public function voucher()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            return header("Location: " . BASEPATH . "/cart");
        }

        $userId = $_SESSION['user_id']; // Sau code xong login sẽ dùng cái này
        $voucherCode = $_POST['voucher_code'];

        if ($this->voucherModel->canUseVoucher($voucherCode)) {
            $this->cartModel->addVoucherToCart($userId, $voucherCode);
            return header("Location: " . BASEPATH . "/cart");
        } else {
            return $this->view("base.log", params: [
                "status" => "Lỗi",
                "message" => "Voucher đã hết lượt sử dụng",
                "btn_title" => "Quay lại trang giỏ hàng",
                "url_back" => BASEPATH . "/cart",
            ]);
        }


    }

    public function payment()
    {
        $action = $_REQUEST["pr1"] ?? "default";

        switch ($action) {
            case "success":
                $newAddress = $_POST["address"];
                $userId = $_SESSION["user_id"];
                $cartId = $_POST["cart_id"];
                $cartTotal = $_POST["cart_total"];
                $voucherId = $this->voucherModel->getVoucherByCartId($cartId);

                $this->userModel->updateUserAddress(userId: $userId, newAddress: $newAddress);
                $this->productModel->updateStockAfterPayment($cartId);
                $this->cartModel->changeStatusCart(cartId: $cartId);
                $this->cartModel->setCartTotal($cartId, $cartTotal);
                $this->voucherModel->decreaseRemainingUseVoucher($voucherId);
                $this->cartModel->setCartTotal($cartId, $cartTotal);


                return $this->view(viewPath: "base.log", params: [
                    "status" => "Done!",
                    "message" => "Thanh toán thành công, cảm ơn bạn đã đặt hàng!",
                    "btn_title" => "Đến trang chủ",
                    "url_back" => BASEPATH . "/home",
                ]);
            default:
                $cartData = $this->cartModel->getCartInfo(cartId: $_POST["cart_id"]);
                $userInfo = $this->userModel->getUserInfo($_SESSION["user_id"]);
                $cartTotal = $_POST["cart_total"];
                return $this->view(viewPath: "cart.payment", params: [
                    "userInfo" => $userInfo,
                    "cartData" => $cartData,
                    "cartTotal" => $cartTotal,
                ]);
        }

    }


    public function test()
    {
        $cartId = 6;
        return $this->view(viewPath: "cart.test", params: [
            "cartItems" => $this->cartModel->updateCartTotal($cartId),
        ]);
    }

}