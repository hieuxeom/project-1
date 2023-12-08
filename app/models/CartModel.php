<?php

class CartModel extends BaseModel
{
    const CART_TABLE = "carts";
    const CART_ITEMS_TABLE = "cart_items";
    const USER_TABLE = "users";
    const VOUCHES_TABLE = "vouchers";
    const PROD_TABLE = "products";


    public function getCartId($userId)
    {
        $request = $this->getOne(table: self::CART_TABLE, conditions: [
            "user_id" => $userId,
            "status" => "active",
        ]);

        if (sizeof($request) != 0) {
            return $request["cart_id"];
        } else {
            $this->createNewCartId($userId);
            return $this->getCartId($userId);
        }
    }

    public function getCartInfo($userId = null, $cartId = null)
    {
        if (!isset($cartId)) {
            $cartId = $this->getCartId($userId);
        }

        return $this->getOne(table: self::CART_TABLE, conditions: [
            "cart_id" => $cartId
        ]);
    }

    private function createNewCartId($userId)
    {
        return $this->insert(table: self::CART_TABLE, data: [
            "user_id" => $userId
        ]);

    }


    // User với Cart
    public function getCartItems($userId = null, $cartId = null)
    {
        if (!isset($cartId)) {
            $cartId = $this->getCartId($userId);
        }

        $cartItems = $this->getTwoTable(table1: self::CART_ITEMS_TABLE, table2: self::PROD_TABLE, joinColumn: "prod_id", table1Select: [
            "quantity",
        ], table2Select: [
            "prod_id",
            "prod_name",
            "prod_price",
            "img_path",
        ], conditions: [
            "cart_id" => $cartId,
        ]);
        return $cartItems;
    }

    public function addItemsToCart($cartId, $productId, $quantity = 1)
    {
        if (!$this->checkItemExistsInCart($cartId, $productId)) {
            $this->insert(table: self::CART_ITEMS_TABLE, data: [
                "prod_id" => $productId,
                "quantity" => $quantity,
                "cart_id" => $cartId,
            ]);
            return $this->updateCartTotal($cartId);
        } else {
            $this->update(table: self::CART_ITEMS_TABLE, data: [
                "quantity" => $this->checkItemExistsInCart($cartId, $productId) + $quantity,
            ], conditions: [
                "cart_id" => $cartId,
                "prod_id" => $productId,
            ]);
            return $this->updateCartTotal($cartId);
        }

    }

    private function checkItemExistsInCart($cartId, $productId)
    {
        $request = $this->getOne(table: self::CART_ITEMS_TABLE, conditions: [
            "prod_id" => $productId,
            "cart_id" => $cartId,
        ]);

        if (sizeof($request) != 0) {
            echo "cc: $request[quantity]";
            return $request["quantity"];
        } else {
            return false;
        }
    }

    public function removeItemsInCart($cartId, $productId,)
    {
        $this->delete(table: self::CART_ITEMS_TABLE, conditions: [
            "cart_id" => $cartId,
            "prod_id" => $productId,
        ]);

        return $this->updateCartTotal($cartId);
    }

    public function updateQuantity($cartId, $productId, $quantity)
    {

        $this->update(table: self::CART_ITEMS_TABLE, data: [
            "quantity" => $quantity,
        ], conditions: [
            "cart_id" => $cartId,
            "prod_id" => $productId,
        ]);

        return $this->updateCartTotal($cartId);
    }

    public function addVoucherToCart($userId, $voucherCode)
    {
        $cartId = $this->getCartId($userId);
        print_r(isset($voucherCode) ? "có" : "không");
        return $this->update(table: self::CART_TABLE, conditions: [
            "cart_id" => $cartId,
        ], data: [
            "voucher_id" => $voucherCode == "" ? null : $voucherCode,
        ]);

    }

    public function getVoucherData($voucherId)
    {
        return $this->getOne(table: self::VOUCHES_TABLE, conditions: [
            "voucher_id" => $voucherId,
        ]);
    }

    public function updateCartTotal($cartId)
    {
        $status = $this->getCartInfo(cartId: $cartId);

        if ($status["status"] != "active") {
            return false;
        }

        $getTotalPrice = $this->getTwoTable(table1: self::CART_ITEMS_TABLE, table2: self::PROD_TABLE, joinColumn: "prod_id", table1Select: [
            "prod_id",
            "quantity",
        ], table2Select: [
            "prod_price",
        ], conditions: [
            "cart_id" => $cartId,
        ]);

        $sum = 0;

        foreach ($getTotalPrice as $prod) {
            $sum += $prod["prod_price"] * $prod["quantity"];
        }

        $this->update(table: self::CART_TABLE, data: [
            "cart_total" => $sum,
        ], conditions: [
            "cart_id" => $cartId,
        ]);


        return true;
    }

    public function setCartTotal($cartId, $cartTotal)
    {
        $this->update(table: self::CART_TABLE, data: [
            "cart_total" => $cartTotal,
        ], conditions: [
            "cart_id" => $cartId,
        ]);
    }

    public function getAllCarts($userId = null)
    {
        if (!isset($userId)) {
            return $this->getTwoTable(table1: self::CART_TABLE, table2: self::USER_TABLE, joinColumn: "user_id",
                table1Select: [
                    "cart_id",
                    "cart_total",
                    "status",
                ], table2Select: [
                    "username",
                ]);
        } else {
            return $this->getTwoTable(table1: self::CART_TABLE, table2: self::USER_TABLE, joinColumn: "user_id",
                table1Select: [
                    "cart_id",
                    "cart_total",
                    "status",
                ], table2Select: [
                    "username",
                ], conditions: [
                    "user_id" => $userId,
                ], order: [
                    "status" => "desc",
                    "paid_date" => "desc",
                ]);
        }
    }

    public function changeStatusCart($cartId)
    {
        return $this->update(table: self::CART_TABLE, conditions: [
            "cart_id" => $cartId,
        ], data: [
            "status" => "order_success",
        ]);
    }


}