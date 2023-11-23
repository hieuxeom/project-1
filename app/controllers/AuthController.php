<?php

class AuthController extends BaseController
{
    private $authModel;

    public function __construct()
    {
        $this->loadModel("AuthModel");
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        return header("Location: " . BASEPATH . "/auth/login");
    }

    public function register()
    {
        $serverMethod = $_SERVER["REQUEST_METHOD"];
        switch ($serverMethod) {
            case "GET":
                return $this->view("auth.register");
            case "POST":
                print_r($_POST);
                $registerStatus = $this->authModel->createAccount($_POST);

                if ($registerStatus == 2) {
                    echo "Đăng kí thất bại do `email` đã tồn tại trên hệ thống";
                } else if ($registerStatus == 3) {
                    echo "Đăng kí thất bại do `username` đã tồn tại trên hệ thống";
                } else {
                    if ($registerStatus) {
                        echo "Đăng kí thành công";
                    } else {
                        echo "Đăng kí thất bại";
                    }
                    break;
                }
        }
    }

    public function login()
    {
        $serverMethod = $_SERVER["REQUEST_METHOD"];

        switch ($serverMethod) {
            case "GET":
                return $this->view("auth.login");
            case "POST":
                print_r($_POST);
                $loginStatus = $this->authModel->checkLogin($_POST);
                if ($loginStatus != 2) {
                    if ($loginStatus) {
                        echo "Login thành công";
                    } else {
                        echo "Sai mật khẩu";
                    }
                } else {
                    echo "Không tìm thấy thông tin tài khoản ứng với $_POST[username]";
                }
                break;
        }
    }
}