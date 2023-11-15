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
//        $listTop10BestSeller // Lấy top 10  sản phẩm có best_sell = 1
//        $listFAQs // Lấy tất cả trong FAQs
        return $this->view(viewPath: "home.index", params: [
            "listTop10BestSeller" => $listTop10BestSeller ?? null,
            "listFAQs" => $listFAQs ?? null,
        ]);
    }
}