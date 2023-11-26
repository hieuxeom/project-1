<?php
class RateModel extends BaseModel
{
    const RATES_TABLE = "product_rates";
    const PRODUCTS_TABLE = "products";
    const USER_TABLE = "users";

    public function getAllRate() {
        $a = $this->getTwoTable(table1: self::RATES_TABLE, table2: self::PRODUCTS_TABLE,joinColumn: "prod_id", table1Select: [
            "rate_id",
            "rate_star",
            "rate_text",
            "rate_date",
        ], table2Select: [
            "prod_id",
            "prod_name",
        ]);

        $b = $this->getTwoTable(table1: self::RATES_TABLE, table2: self::USER_TABLE, joinColumn: "user_id", table1Select: [
            "rate_id",
        ], table2Select: [
            "username",
        ]);

        return array_merge($a, $b);
    }
}