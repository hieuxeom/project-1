<?php

class HomeController extends BaseController
{
    private $homeModel;

    private $productModel;
    public function __construct()
    {
        $this->loadModel("HomeModel");
        $this->homeModel = new HomeModel();
    }

    public function index()
    {
        return $this->view(viewPath: 'home.index', params: [
            "test" => "123",
            "arrayTest" => [
                "user_id" => '123',
                "fullname" => 'ten thu nghiem',
                "score" => '10',
            ],
        ]);
    }

    public function add() {
        print_r($_POST);
        $fullName = $_POST['fullName'];
        $birthDay = $_POST['birthDay'];
        $score = $_POST['score'];

        $this->homeModel->addNewUser($fullName, $birthDay, $score);
    }

    public function search() {
        $id = $_POST['id'];
        return $this->view(viewPath: "home.index", params: [
            "pageTitle" => "Test title",
            "searchData" => $this->homeModel->getUserById($id),
        ]);
    }

    public function update() {
        $this->homeModel->updateUser();
    }

    public function delete() {
        print_r($_GET);

        $id = $_GET['id'];
        echo $id;
        $this->homeModel->deleteUser($id);
    }

}