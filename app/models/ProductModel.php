<?php

class ProductModel extends BaseModel
{
    const PROD_CAT = "categories";
    const PROD = "products";
    const PROD_STOCK = "product_stocks";
    const PROD_CMT = "product_comments";
    const USER = "users";
    const PROD_RATE = "product_rates";


    public function getProductDetails($id)
    {
        $productData2 = $this->getTwoTable(table1: self::PROD, table2: self::PROD_CAT,
            joinColumn: "category_id",
            table1Select: [
                "prod_id",
                "prod_name",
                "prod_desc",
                "prod_price",
                "img_path"
            ], table2Select: [
                "category_name"
            ], conditions: [
                "prod_id" => $id,
            ]);
        return $productData2;
    }

    public function getProductName($id)
    {
        $ProductName = $this->getOne(table: self::PROD, arraySelect: ["prod_name"],
            conditions: ["prod_id" => $id]);
        return $ProductName;
    }

    public function getProductStock($id)
    {
        $prodStock = $this->getOne(table: self::PROD_STOCK, conditions: [
            "prod_id" => $id,
        ]);
        return $prodStock;
    }


    public function getListCategories()
    {
        $listCategories = $this->getAll(table: self::PROD_CAT);
        return $listCategories;
    }

    public function getProductRates($id)
    {
        $productRates = $this->getTwoTable(table1: self::PROD_RATE, table2: self::USER,
            joinColumn: "user_id", table1Select: ["rate_star", "rate_text", "rate_date"],
            table2Select: ["username"], conditions: ["prod_id" => $id,],
            limit: 5, order: ["rate_date" => "desc"]);
        return $productRates;
    }

    // Showw comment
    public function getComments($id)
    {
        $productComment = $this->getOne(table: self::PROD_CMT, conditions: [
            "prod_id" => $id,
        ]);

        $productComment2 = $this->getTwoTable(table1: self::PROD_CMT, table2: self::USER,
            joinColumn: "user_id", table1Select: ["comment_text", "comment_time"],
            table2Select: ["username", "email"], conditions: [
                "prod_id" => $id,
            ], limit: 10, order: ["comment_time" => "desc"]);
        return $productComment2;
    }

    public function getListProduct($limit = null, $filter = null, $search = null)
    {
        if (isset($search)) {
            $searchData = [
                "prod_name" => $search
            ];
        } else {
            $searchData = [];
        }


        if (isset($filter)) {
            $filterData = [
                "category_id" => $filter
            ];
        } else {
            $filterData = [];
        }


        $listProduct = $this->getAll(table: self::PROD, limit: $limit, conditions: $filterData, likeConditions: $searchData);

        return $listProduct;
    }


    public function getScore($id)
    {
        $Score = $this->getAll(table: self::PROD_RATE, arraySelect: ["rate_star"],
            conditions: ["prod_id" => $id]);
        return $Score;
    }

    // Lấy sp theo seach key
    public function getProductSkey($kyw)
    {
        $Key = $this->getAll(table: self::PROD, arraySelect: ["prod_name", "prod_desc", "prod_price", "img_path"],
            likeConditions: ["prod_name" => $kyw]);
        return $Key;
    }

    // Lọc sp theo iddm
    public function getProductByIddm($iddm)
    {
        $fitter = $this->getTwoTable(table1: self::PROD, table2: self::PROD_CAT,
            joinColumn: "category_id", table1Select: ["prod_name", "prod_desc", "prod_price", "img_path"],
            table2Select: ["category_name"], conditions: ["category_id" => $iddm]);
        return $fitter;
    }
}