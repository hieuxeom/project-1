<?php

class ProductModel extends BaseModel
{
    const PROD_CAT = "categories";
    const PROD = "products";
    const PROD_STOCK = "product_stocks";

    public function getProductDetails($id) {
        $productData = $this->getOne(table: self::PROD, conditions: [
            "prod_id" => $id,
        ]);

        $productData2 = $this->getTwoTable(table1: self::PROD, table2: self::PROD_CAT,
                                            joinColumn: "category_id", table1Select: ["prod_name", "prod_desc", "prod_price", "img_path"], table2Select: ["category_name"], conditions: [
                                                "prod_id" => $id,
            ]);
        return $productData2;
    }

    public function getProductStock($id) {
        $prodStock = $this->getOne(table: self::PROD_STOCK, conditions: [
            "prod_id" => $id,
        ]);
        return $prodStock;
    }

    public function getCategoryName($cat_id) {
        $catName = $this->getOne(table: self::PROD_CAT, conditions: [
            "category_id" => $cat_id,
        ]);
        return $catName;
    }

}