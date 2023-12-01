<?php

class CartController extends BaseController
{
    private $cartModel;
    private $userModel;

    public function __construct()
    {
        if ($this->checkLogin()) {
            $this->loadModel("CartModel");
            $this->cartModel = new CartModel();

            $this->loadModel("UserModel");
            $this->userModel = new UserModel();

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
        $userId = $_SESSION['user_id']; // Sau code xong login sẽ dùng cái này
        $cartId = $_REQUEST["cartId"] ?? null;

        if (isset($cartId)) {
            if ($_SESSION["role"] == "admin") {
                $cartItems = $this->cartModel->getCartItems(cartId: $cartId);
                $cartData = $this->cartModel->getCartInfo(cartId: $cartId);
            } else {
                return header("Location: " . BASEPATH . "/cart");
            }
        } else {
            $cartItems = $this->cartModel->getCartItems($userId);
            $cartData = $this->cartModel->getCartInfo($userId);
        }

        if (isset($cartData["voucher_id"])) {
            $voucherData = $this->cartModel->getVoucherData($cartData["voucher_id"]);
        }
        return $this->view(viewPath: "cart.index", params: [
            "cartData" => $cartData ?? null,
            "cartItems" => $cartItems ?? null,
            "voucherData" => $voucherData ?? null,
        ]);

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

        $addVoucher = $this->cartModel->addVoucherToCart($userId, $voucherCode);

        return header("Location: " . BASEPATH . "/cart");

    }

    public function payment()
    {
        $action = $_REQUEST["pr1"] ?? "default";

        switch ($action) {
            case "success":
                $newAddress = $_POST["address"];
                $userId = $_SESSION["user_id"];
                $cartId = $_POST["cart_id"];
                $this->userModel->updateUserAddress(userId: $userId, newAddress: $newAddress);
                $this->cartModel->changeStatusCart(cartId: $cartId);

                return $this->view(viewPath: "base.log", params: [
                    "status" => "Done!",
                    "message" => "Thanh toán thành công, cảm ơn bạn đã đặt hàng!",
                    "btn_title" => "Đến trang chủ",
                    "url_back" => BASEPATH . "/home",
                ]);
            default:
                $cartData = $this->cartModel->getCartInfo(cartId: $_POST["cart_id"]);
                $userInfo = $this->userModel->getUserInfo($_SESSION["user_id"]);
                return $this->view(viewPath: "cart.payment", params: [
                    "userInfo" => $userInfo,
                    "cartData" => $cartData,
                ]);
        }

    }


    public function test()
    {
        $cartId = 6;
//        $this->cartModel->addItemsToCart(userId: $userId,productId: 6,quantity: 3);
//        $this->cartModel->removeItemsInCart(userId: $userId,productId: 6);
//        $this->cartModel->updateQuantity(userId: $userId,productId: 6, quantity: 1);
        return $this->view(viewPath: "cart.test", params: [
            "cartItems" => $this->cartModel->updateCartTotal($cartId),
        ]);
    }

}