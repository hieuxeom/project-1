<?php

class ProductController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel("ProductModel");
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        print_r($_REQUEST);
        $filter = $_REQUEST['filter'] ?? null;
        $search = $_REQUEST['search'] ?? null;

        echo "<br>";

        if ($filter && $search) {
            $viewMode = "filter-search";
        } else if (!$filter && $search) {
            $viewMode = "search";
        } else if ($filter && !$search) {
            $viewMode = "filter";
        } else {
            $viewMode = "default";
        }

        echo $viewMode;

        switch ($viewMode) {
            case "filter-search":
                // Xử lí code lấy sản phẩm vừa có filter, vừa có search key
                break;
            case "search":
                // Xử lí code lấy sản phẩm theo search key
                break;
            case "filter":
                // Xử lí code lấy sản phẩm theo filter
                break;
            case "default":
                // Xử lí code lấy toàn bộ sản phẩm
                break;
        }

        return $this->view(viewPath: "product.index", params: [
            "listCategories" => $listCategories ?? null,
            "listProducts" => $listProducts ?? null,
        ]);
    }

    public function details()
    {
        $productId = $_REQUEST['pr1'];
        $viewMode = "default";
        if (isset($_REQUEST['view'])) {
            $viewMode = $_REQUEST['view'];
        }

        switch ($viewMode) {
            case "rate":
                // Xử lí code lấy các thông tin cần trong return
                $productName=$this->productModel->getProductRates($productId);

                return $this->view(viewPath: "product.viewRate", params: [
                    "productName" => $productName ?? null,
                    "rateScore" => $rateScore ?? null,
                    "listRateData" => $listRateData ?? null
                ]);
            case "default":
                // Xử lí code lấy các thông tin cần trong return
                // Test

                return $this->view(viewPath: "product.viewDefault", params: [
                    "productData" => $productData ?? null,
                    // "productCategory" => $productCategory ?? null, // Bỏ '//' nếu cần
                    "rateScore" => $rateScore ?? null,
                    "listRateData" => $listRateData ?? null, // limit 5 rate gần nhất
                    "listComment" => $listCommentData ?? null, // limit 10 comment gần nhất
                ]);

        }
    }
}