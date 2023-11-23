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
        $kyw=1;
        $iddm=1;
        $id=$_REQUEST['1'];
        $filter = $_REQUEST['filter'] ?? null; // category_id
        $search = $_REQUEST['search'] ?? null; // pattern tên sản phẩm

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
                $listCategories = $this->productModel->getProductByIddm($iddm);
                $listProducts = $this->productModel->getProductSkey($kyw);
                // Xử lí code lấy sản phẩm vừa có filter, vừa có search key
                break;
            case "search":
                $listCategories = "test";
                $listProducts = $this->productModel->getProductSkey($kyw);
                // Xử lí code lấy sản phẩm theo search key
                break;
            case "filter":
                $listCategories = $this->productModel->getProductByIddm($iddm);
                $listProducts = "tesst";
                // Xử lí code lấy sản phẩm theo filter
                break;
            case "default":
                $listCategories = $this->productModel->getCategoryName($id);
                $listProducts = $this->productModel->getShowProduct($id) ;
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
                //$productName=$this->productModel->getProductRates($productId);

                return $this->view(viewPath: "product.viewRate", params: [
                    "productName" => $productName ?? null,
                    "rateScore" => $rateScore ?? null,
                    "listRateData" => $listRateData ?? null
                ]);
            case "default":
                // Xử lí code lấy các thông tin cần trong return
                // Test
                $productData=$this->productModel->getProductDetails($productId);
                $rateScore=$this->productModel->getScore($productId);
                $listRateData=$this->productModel->getProductRates($productId);
                $listComment=$this->productModel->getComments($productId);
                return $this->view(viewPath: "product.viewDefault", params: [
                    "productData" => $productData ?? null,
                    // "productCategory" => $productCategory ?? null, // Bỏ '//' nếu cần
                    "rateScore" => $rateScore ?? null,
                    "listRateData" => $listRateData ?? null, // limit 5 rate gần nhất
                    "listComment" => $listComment ?? null, // limit 10 comment gần nhất
                ]);

        }
    }
}