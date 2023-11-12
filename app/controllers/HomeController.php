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
        return $this->view(viewPath: "home.index");
    }
}