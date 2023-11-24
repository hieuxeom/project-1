<?php

class CommentController extends BaseController
{
    private $commentModel;

    public function __construct()
    {
        $this->loadModel("CommentModel");
        $this->commentModel = new CommentModel();
    }

    public function index()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $productId = $_GET["productId"];
        $userId = $_SESSION["user_id"];

        switch ($method) {
            case "GET":
                return header("Location: " . BASEPATH . "/home");
            case "POST":
                echo $productId . " - " . $userId;
                print_r($_POST);

                $this->commentModel->createComment(productId: $productId, userId: $userId, commentData: $_POST);
                return header("Location: " . BASEPATH . "/product/details/$productId");
            default:
                return header("Location: " . BASEPATH . "/home");
        }
    }


}