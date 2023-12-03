<?php

class ProductController extends BaseController
{
    private $productModel;
    private $cartModel;
    private $rateModel;

    public function __construct()
    {
        $this->loadModel("ProductModel");
        $this->productModel = new ProductModel();

        $this->loadModel("CartModel");
        $this->cartModel = new CartModel();

        $this->loadModel("RateModel");
        $this->rateModel = new RateModel();
    }

    public function index()
    {
//        $id=$_REQUEST['pr1'];
        $filter = $_REQUEST['filter'] ?? null; // category_id
        $search = $_REQUEST['search_key'] ?? null; // pattern tên sản phẩm


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


        $listCategories = $this->productModel->getListCategories();
        switch ($viewMode) {
            case "filter-search":
                $listProducts = $this->productModel->getListProduct(filter: $filter, search: $search);
                break;
            case "search":
                $listProducts = $this->productModel->getListProduct(search: $search);
                break;
            case "filter":
                $listProducts = $this->productModel->getListProduct(filter: $filter);
                break;
            case "default":
                $listProducts = $this->productModel->getListProduct();
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
                $productData = $this->productModel->getProductDetails($productId)[0];
                $listRateData = $this->productModel->getProductRates($productId);
                $rateScore = $this->rateModel->getRateScore($productId);


                return $this->view(viewPath: "product.viewRate", params: [
                    "productData" => $productData ?? null,
                    "rateScore" => $rateScore ?? null,
                    "listRateData" => $listRateData ?? null
                ]);
            case "default":

                if (isset($_SESSION["user_id"])) {
                    $cartData = $this->cartModel->getCartInfo($_SESSION["user_id"]);
                };
                $this->productModel->increaseViewProduct($productId);
                $productData = $this->productModel->getProductDetails($productId)[0];
                $rateScore = $this->rateModel->getRateScore($productId);
                $listRateData = $this->productModel->getProductRates(productId: $productId, limit: 5);
                $listComments = $this->productModel->getComments($productId);
                $productStock = $this->productModel->getProductStock($productId);
                return $this->view(viewPath: "product.viewDefault", params: [
                    "cartData" => $cartData ?? null,
                    "productData" => $productData ?? null,
                    "productStock" => $productStock ?? null,
                    "rateScore" => $rateScore ?? null,
                    "listRateData" => $listRateData ?? null, // limit 5 rate gần nhất
                    "listComments" => $listComments ?? null, // limit 10 comment gần nhất
                ]);

        }
    }
}