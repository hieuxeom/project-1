<?php

class HomeController extends BaseController
{
    private $homeModel;
    private $productModel;

    public function __construct()
    {
        $this->loadModel("HomeModel");
        $this->homeModel = new HomeModel();

        $this->loadModel("ProductModel");
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $listTop4BestSeller = $this->productModel->getTopSeller(limit: 4);
//        $listFAQs // Lấy tất cả trong FAQs
        return $this->view(viewPath: "home.index", params: [
            "listTopBestSeller" => $listTop4BestSeller ?? null,
            "listFAQs" => $listFAQs ?? null,
        ]);
    }
}