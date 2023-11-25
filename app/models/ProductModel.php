<?php

class ProductModel extends BaseModel
{
    const PROD_CAT = "categories";
    const PROD = "products";
    const PROD_STOCK = "product_stocks";
    const PROD_CMT = "product_comments";
    const PROD_RATE = "product_rates";
    const CART_ITEMS_TABLE = "cart_items";
    const USER = "users";
    const USER_SAVED = "user_saved";


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

    public function getProductDetails($id)
    {
        $productData2 = $this->getTwoTable(table1: self::PROD, table2: self::PROD_CAT,
            joinColumn: "category_id",
            table1Select: [
                "prod_id",
                "prod_name",
                "prod_desc",
                "prod_price",
                "category_id",
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

    public function getCategoryInfo($categoryId) {
        return $this->getOne(table: self::PROD_CAT,conditions: [
            "category_id" => $categoryId,
        ]);
    }

    public function getProductRates($productId, $limit = null)
    {
        $productRates = $this->getTwoTable(table1: self::PROD_RATE, table2: self::USER,
            joinColumn: "user_id", table1Select: ["rate_star", "rate_text", "rate_date"],
            table2Select: ["username"], conditions: ["prod_id" => $productId,],
            limit: $limit, order: ["rate_date" => "desc"]);
        return $productRates;
    }

    public function getComments($id)
    {
        $productComment = $this->getTwoTable(table1: self::PROD_CMT, table2: self::USER,
            joinColumn: "user_id", table1Select: ["comment_text", "comment_time"],
            table2Select: ["username", "email"], conditions: [
                "prod_id" => $id,
            ], limit: 10, order: ["comment_time" => "desc"]);
        return $productComment;
    }

    public function getScore($id)
    {
        $score = $this->getAll(table: self::PROD_RATE, arraySelect: ["rate_star"],
            conditions: ["prod_id" => $id]);
        return $score;
    }


    public function addNewProduct($insertData) {
        return $this->insert(table: self::PROD, data: [
            "prod_name" => $insertData["prod_name"],
            "prod_desc" => $insertData["prod_desc"],
            "prod_price" => $insertData["prod_price"],
            "category_id" => $insertData["category_id"],
            "best_sell" => $insertData["best_sell"],
            "img_path" => $insertData["img_path"],
        ]);
    }

    public function updateProductInfo($modifyData, $productId)
    {
        return $this->update(table: self::PROD, data: [
            "prod_name" => $modifyData["prod_name"],
            "prod_desc" => $modifyData["prod_desc"],
            "prod_price" => $modifyData["prod_price"],
            "category_id" => $modifyData["category_id"],
            "best_sell" => $modifyData["best_sell"],
            "img_path" => $modifyData["img_path"],
        ], conditions: [
            "prod_id" => $productId,
        ]);
    }

    public function updateCategoryInfo($modifyData, $categoryId)
    {
        return $this->update(table: self::PROD_CAT, data: [
            "category_name" => $modifyData["category_name"],
            "category_desc" => $modifyData["category_desc"],
        ], conditions: [
            "category_id" => $categoryId,
        ]);
    }

    public function deleteProduct($productId) {
        $this->delete(table: self::PROD_STOCK, conditions: [
            "prod_id" => $productId,
        ]);

        $this->delete(table: self::PROD_CMT, conditions: [
            "prod_id" => $productId,
        ]);

        $this->delete(table: self::CART_ITEMS_TABLE, conditions: [
            "prod_id" => $productId,
        ]);

        $this->delete(table: self::PROD_RATE, conditions: [
            "prod_id" => $productId,
        ]);

        $this->delete(table: self::USER_SAVED, conditions: [
            "prod_id" => $productId,
        ]);

        return $this->delete(table: self::PROD, conditions: [
            "prod_id" => $productId,
        ]);
    }
}