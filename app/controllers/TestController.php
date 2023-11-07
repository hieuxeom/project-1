<?php

class TestController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel("HomeModel");
        $this->productModel = new HomeModel();
    }

    public function index()
    {
        return $this->view(viewPath: "home.index", params: [
            "pageTitle" => "Test title",
            "usersData" => $this->homeModel->getAllUser()
        ]);
    }

}

?>