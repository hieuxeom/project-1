<?php

class ProductModel extends BaseModel
{
    const CATEGORIES_TABLE = "categories";
    const PROD_TABLE = "products";
    const PROD_STOCK_TABLE = "product_stocks";
    const PROD_CMT_TABLE = "product_comments";
    const PROD_RATE_TABLE = "product_rates";
    const CART_ITEMS_TABLE = "cart_items";
    const USER_TABLE = "users";
    const USER_SAVED_TABLE = "user_saved";


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


        $listProduct = $this->getAll(table: self::PROD_TABLE, limit: $limit, conditions: $filterData, likeConditions: $searchData);

        return $listProduct;
    }

    public function getProductDetails($id)
    {
        $productData = $this->getTwoTable(table1: self::PROD_TABLE, table2: self::CATEGORIES_TABLE,
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
        return $productData;
    }

    public function getProductName($productId)
    {
        return $this->getOne(table: self::PROD_TABLE,
            conditions: [
                "prod_id" => $productId,
            ]);
    }

    public function getProductStock($id)
    {
        $prodStock = $this->getOne(table: self::PROD_STOCK_TABLE, conditions: [
            "prod_id" => $id,
        ]);
        return $prodStock;
    }


    public function getListCategories()
    {
        $listCategories = $this->getAll(table: self::CATEGORIES_TABLE);
        return $listCategories;
    }

    public function getCategoryInfo($categoryId)
    {
        return $this->getOne(table: self::CATEGORIES_TABLE, conditions: [
            "category_id" => $categoryId,
        ]);
    }

    public function getProductRates($productId, $limit = null)
    {
        $productRates = $this->getTwoTable(table1: self::PROD_RATE_TABLE, table2: self::USER_TABLE,
            joinColumn: "user_id", table1Select: [
                "rate_id",
                "rate_star",
                "rate_text",
                "rate_date"
            ],
            table2Select: [
                "username"
            ], conditions: [
                "prod_id" => $productId,
            ],
            limit: $limit, order: [
                "rate_date" => "desc"
            ]
        );
        return $productRates;
    }

    public function getComments($id)
    {
        $productComment = $this->getTwoTable(table1: self::PROD_CMT_TABLE, table2: self::USER_TABLE,
            joinColumn: "user_id", table1Select: [
                "comment_id",
                "comment_text",
                "comment_time"
            ],
            table2Select: ["username", "email"], conditions: [
                "prod_id" => $id,
            ], limit: 10, order: ["comment_time" => "desc"]);
        return $productComment;
    }

    public function getScore($id)
    {
        $score = $this->getAll(table: self::PROD_RATE_TABLE, arraySelect: ["rate_star"],
            conditions: ["prod_id" => $id]);
        return $score;
    }


    public function addNewProduct($insertData)
    {
        return $this->insert(table: self::PROD_TABLE, data: [
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
        return $this->update(table: self::PROD_TABLE, data: [
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


    public function deleteProduct($productId)
    {
//        $this->delete(table: self::PROD_STOCK_TABLE, conditions: [
//            "prod_id" => $productId,
//        ]);
//
//        $this->delete(table: self::PROD_CMT_TABLE, conditions: [
//            "prod_id" => $productId,
//        ]);
//
//        $this->delete(table: self::CART_ITEMS_TABLE, conditions: [
//            "prod_id" => $productId,
//        ]);
//
//        $this->delete(table: self::PROD_RATE_TABLE, conditions: [
//            "prod_id" => $productId,
//        ]);
//
//        $this->delete(table: self::USER_SAVED_TABLE, conditions: [
//            "prod_id" => $productId,
//        ]);

//        return $this->delete(table: self::PROD_TABLE, conditions: [
//            "prod_id" => $productId,
//        ]);
        return $this->update(table: self::PROD_TABLE, data: [
            "is_delete" => 1,
        ], conditions: [
            "prod_id" => $productId
        ]);
    }

    public function addNewCategory($insertData)
    {
        return $this->insert(table: self::CATEGORIES_TABLE, data: [
            "category_name" => $insertData["category_name"],
            "category_desc" => $insertData["category_desc"],
        ]);
    }

    public function updateCategoryInfo($modifyData, $categoryId)
    {
        return $this->update(table: self::CATEGORIES_TABLE, data: [
            "category_name" => $modifyData["category_name"],
            "category_desc" => $modifyData["category_desc"],
        ], conditions: [
            "category_id" => $categoryId,
        ]);
    }

    public function deleteCategory($categoryId)
    {
        $this->delete(table: self::PROD_TABLE, conditions: [
            "category_id" => $categoryId,
        ]);

        return $this->delete(table: self::CATEGORIES_TABLE, conditions: [
            "category_id" => $categoryId,
        ]);
    }

    public function getTopSeller($limit = 10)
    {
        return $this->getAll(table: self::PROD_TABLE, conditions: [
            "best_sell" => "1",
        ],limit: $limit);
    }

    public function increaseViewProduct($productId)
    {
        $currentViews = $this->getOne(table: self::PROD_TABLE, conditions: [
            "prod_id" => $productId,
        ])["views"];

        return $this->update(table: self::PROD_TABLE, conditions: [
            "prod_id" =>$productId,
        ], data: [
            "views" => $currentViews + 1,
        ]);
    }
}