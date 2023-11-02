<?php

class HomeController extends BaseController
{
    private $homeModel;

    public function __construct()
    {
        $this->loadModel("HomeModel");
        $this->homeModel = new HomeModel();
    }

    public function index()
    {
        echo __METHOD__;

        return $this->view(viewPath: "home.index", params: [
            "pageTitle" => "Test title",
            "usersData" => $this->homeModel->getAllUser()
        ]);
    }

    public function add()
    {
        $this->add();
    }

    public function update()
    {
        $this->homeModel->updateUser(2, [
            "score" => 8
        ]);
    }

    public function delete() {
        $this->homeModel->deleteUser(4);
    }

}