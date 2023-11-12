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
        $id = 1;
        print_r($_REQUEST);
        $productDetails = $this->productModel->getProductDetails($id);
        $productCategory = $productDetails['category_id'];
        $productCategoryName = $this->productModel->getCategoryName($productCategory);
        return $this->view("product.productDetails", params: [
            "productDetails" => $productDetails,
            "productCategory" => $productCategoryName,
            "productStock" => $this->productModel->getProductStock($id),
            ""
        ]);
    }

    public function test()
    {
        $id = 1;
        print_r($_REQUEST);
        $productDetails = $this->productModel->getProductDetails($id);
        return $this->view("product.productDetails", params: [
            "productDetails" => $productDetails,
            "productStock" => $this->productModel->getProductStock($id),
        ]);
    }
}