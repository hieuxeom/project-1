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
        print_r($_REQUEST);
//        return $this->view(viewPath: "home.index", params: [
//            "linkTest" => "/home/add"
//        ]);
    }

    public function add() {
        print_r($_REQUEST);
        echo __METHOD__;
    }
}