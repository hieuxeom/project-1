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

    public function deleteRate($rateId) {
        return $this->delete(table: self::RATES_TABLE, conditions: [
            "rate_id" => $rateId,
        ]);
    }

    public function getRateScore($productId) {
        $listRate = $this->getAll(table: self::RATES_TABLE,conditions: [
            "prod_id" => $productId,
        ]);

        if (empty($listRate)) {
            return [
                "score" => 0,
                "count" => 0,
            ];
        }

        $score = 0;
        $count = 0;


        foreach ($listRate as $rate) {
            $score += $rate["rate_star"];
            $count ++;
        }
        return [
            "score" => $score/$count,
            "count" => $count,
        ];
    }
}