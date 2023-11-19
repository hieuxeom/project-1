<?php

class CartController extends BaseController
{
    private $cartModel;

    public function __construct()
    {
        $this->loadModel("CartModel");
        $this->cartModel = new CartModel();
    }

    public function index() {
//        $userId = $_SESSION['userId']; // Sau code xong login sẽ dùng cái này
        $userId = 1; // Gán tạm 1 userId

        return $this->view(viewPath: "cart.index", params: [
            "cartData" => $cartData ?? null // Lấy dữ liệu cho $cartData
        ]);
    }

    public function add() {
//        if ($_SERVER["REQUEST_METHOD"] != "POST") {
//            return header("Location: " . BASEPATH . "/cart");
//        } // Không bỏ comment đoạn này

//        $userId = $_SESSION['userId']; // Sau code xong login sẽ dùng cái này
        $userId = 1; // Gán tạm 1 userId
//        $prodId = $_POST['product_id'];
        $prodId = 1;

        // return $this->cartModel->[hàm insert dữ liệu tương ứng]
    }

    public function delete() {
//        if ($_SERVER["REQUEST_METHOD"] != "POST") {
//            return header("Location: " . BASEPATH . "/cart");
//        } // Không bỏ comment đoạn này

//        $userId = $_SESSION['userId']; // Sau code xong login sẽ dùng cái này
        $userId = 1; // Gán tạm 1 userId
//        $prodId = $_POST['product_id'];
        $prodId = 1;
        // return $this->cartModel->[hàm xóa dữ liệu tương ứng]
    }

    public function voucher() {
//        if ($_SERVER["REQUEST_METHOD"] != "POST") {
//            return header("Location: " . BASEPATH . "/cart");
//        } // Không bỏ comment đoạn này

//        $userId = $_SESSION['userId']; // Sau code xong login sẽ dùng cái này
        $userId = 1; // Gán tạm 1 userId
//        $voucherCode = $_POST['voucher_code'];
        $voucherCode = "ABCXYZ";

//         $addVoucher = $this->cartModel->[hàm add voucher cho cart tương ứng] // Bỏ comment để viết hàm này nhé

        return header("Location: " . BASEPATH . "/cart");

    }

}