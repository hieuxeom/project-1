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
                return $this->view(viewPath: "auth.register");
            case "POST":
                $registerStatus = $this->authModel->createAccount($_POST);

                if ($registerStatus == 2) {
                    return $this->view(viewPath: "base.log", params: [
                        "status" => "Lỗi",
                        "message" => "Đăng kí thất bại do `email` đã tồn tại trên hệ thống",
                        "btn_title" => "Quay lại trang đăng kí",
                        "url_back" => BASEPATH . "/auth/register",
                    ]);
                } else if ($registerStatus == 3) {
                    return $this->view(viewPath: "base.log", params: [
                        "status" => "Lỗi",
                        "message" => "Đăng kí thất bại do `username` đã tồn tại trên hệ thống",
                        "btn_title" => "Quay lại trang đăng kí",
                        "url_back" => BASEPATH . "/auth/register",
                    ]);
                } else {
                    if ($registerStatus) {
                        return $this->view(viewPath: "base.log", params: [
                            "status" => "Thanks",
                            "message" => "Đăng kí thành công",
                            "btn_title" => "Đến trang chủ",
                            "url_back" => BASEPATH . "/home",
                        ]);
                    } else {
                        return $this->view(viewPath: "base.log", params: [
                            "status" => "Lỗi",
                            "message" => "Đăng kí thất bại",
                            "btn_title" => "Quay lại trang đăng kí",
                            "url_back" => BASEPATH . "/auth/register",
                        ]);
                    }
                }
            default:
                return $this->view("auth.register");
        }
    }

    public function login()
    {
        $serverMethod = $_SERVER["REQUEST_METHOD"];

        switch ($serverMethod) {
            case "GET":
                return $this->view("auth.login");
            case "POST":
                $loginStatus = $this->authModel->checkLogin($_POST);
                if ($loginStatus != 2) {
                    if ($loginStatus) {
                        return $this->view(viewPath: "base.log", params: [
                            "status" => "Successfully!",
                            "message" => "Đăng nhập thành công",
                            "btn_title" => "Đến trang chủ",
                            "url_back" => BASEPATH . "/home",
                        ]);
                    } else {
                        return $this->view(viewPath: "base.log", params: [
                            "status" => "Có gì đó sai sai!",
                            "message" => "Mật khẩu không đúng!!",
                            "btn_title" => "Quay lại trang đăng nhập",
                            "url_back" => BASEPATH . "/auth/login",
                        ]);
                    }
                } else {
                    return $this->view(viewPath: "base.log", params: [
                        "status" => "Có gì đó sai sai!",
                        "message" => "Không tìm thấy thông tin tài khoản ứng với $_POST[username]",
                        "btn_title" => "Quay lại trang đăng nhập",
                        "url_back" => BASEPATH . "/auth/login",
                    ]);
                }
            default:
                return $this->view("auth.login");
        }
    }
}