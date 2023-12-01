<?php

class UserController extends BaseController
{

    private $userModel;
    private $authModel;
    private $adminModel;
    private $commentModel;
    private $cartModel;

    public function __construct()
    {


        $this->loadModel("UserModel");
        $this->userModel = new UserModel();

        $this->loadModel("AuthModel");
        $this->authModel = new AuthModel();

        $this->loadModel("AdminModel");
        $this->adminModel = new AdminModel();

        $this->loadModel("CommentModel");
        $this->commentModel = new CommentModel();

        $this->loadModel("CartModel");
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        return header("Location: " . BASEPATH . "/user/changePwd");
    }

    public function changePwd()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $changePwdData = $_POST;

        switch ($method) {
            case "GET":
                $userId = $_REQUEST["pr1"] ?? $_SESSION["user_id"];
                $userInfo = $this->userModel->getUserInfo($userId);
                return $this->view(viewPath: "users.changePwd", params: [
                    "userInfo" => $userInfo ?? null,
                    "errorLog" => null,
                ]);
            case "POST":
                $userId = $_POST["user_id"];
                $userInfo = $this->userModel->getUserInfo($userId);
                if ($this->authModel->verifyPassword(password: $_POST["old_password"], accountId: $userId)) {
                    if ($this->adminModel->verifyAuthCode(userId: $userId, otpCodeInput: $_POST["otp_code"])) {
                        $this->authModel->changePassword(newPassword: $_POST["new_password"], userId: $userId);
                        return $this->view(viewPath: "base.log", params: [
                            "status" => "OK!",
                            "message" => "Đổi mật khẩu thành công!",
                            "btn_title" => "Quay lại trang cá nhân",
                            "url_back" => BASEPATH . "/user/changePwd",
                        ]);
                    } else {
                        return $this->view(viewPath: "users.changePwd", params: [
                            "userInfo" => $userInfo ?? null,
                            "errorLog" => "Sai OTP, kiểm tra lại nhé!",
                        ]);
                    }
                } else {

                    return $this->view(viewPath: "users.changePwd", params: [
                        "userInfo" => $userInfo ?? null,
                        "errorLog" => "Sai mật khẩu cũ",
                    ]);
                }
        }
    }

    public function commentHistory()
    {
        $userId = $_SESSION["user_id"];
        $userInfo = $this->userModel->getUserInfo($userId);
        $listComments =$this->adminModel->mergeArray($this->commentModel->getCommentByUserId($userId), "comment_id");
        return $this->view(viewPath: "users.commentHistory", params: [
            "userInfo" => $userInfo ?? null,
            "listComments" => $listComments ?? null,
        ]);
    }

    public function orderHistory()
    {
        $userId = $_SESSION["user_id"];
        $userInfo = $this->userModel->getUserInfo($userId);
        $listCarts = $this->cartModel->getAllCarts($userId);
        return $this->view(viewPath: "users.orderHistory", params: [
            "userInfo" => $userInfo ?? null,
            "listCarts" => $listCarts,
        ]);
    }

}