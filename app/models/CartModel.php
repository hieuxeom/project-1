<?php

class CartModel extends BaseModel
{
    const CART_TABLE="carts";
    const CART_ITEMS_TABLE="cart_items";
    const USER_TABLE="users";
    const VOUCHES_TABLE="vouchers";
    const PROD_TABLE="products";

    // User với Cart
    public function getCart($userId){
        $CartData=$this->getTwoTable(table1: self::USER_TABLE, table2: self::CART_TABLE,
                            joinColumn:"user_id", table1Select:["username",],
                             table2Select:["cart_id", "status", "paid_date","cart_total","address"],
                            conditions:["user_id"=>$userId]);
                            return $CartData;
    }
    // Showw cart
    public function getShowCart($cartId, $prodId){
        $cart=$this->getOne(table: self::CART_TABLE, conditions:["cart_id"=>$cartId]);
        $showCart=$this->getTwoTable(table1: self::PROD_TABLE, table2: self::CART_ITEMS_TABLE,
        joinColumn:"prod_id", table1Select:["prod_name","img_path","prod_price"],
        table2Select:["quantity"], conditions:["prod_id"=>$prodId]);
        return $showCart;
    }
// add khi chưa có sp
    public function addProduct($cartId,$productId,$quantity,$pad){
        $addPro=$this->insert(table: self::CART_ITEMS_TABLE,
         data:["cart_id"=>$cartId,
         "prod_id"=>$productId,
         "quantity"=>$quantity,
         "price_at_paid"=>$pad]
    ); return $addPro;
    }
//add khi có sp
    public function addQuantityProduct($productId,$quantity){
        $addQProd=$this->update(table: self::CART_ITEMS_TABLE, data:["quantity"=>$quantity],
        conditions:["prod_id"=>$productId]);
        return $addQProd;
    }

    // Xóa giỏ hàng
    public function delCart($cartId){
        $delCart=$this->delete(table: self:: CART_TABLE, conditions:["cart_id"=>$cartId]);
        return $delCart;

    }

    // Xóa sp trong giỏ hàng
    public function delProductCart($productId){
        $delProdCart=$this->delete(table: self::CART_ITEMS_TABLE,
        conditions:["prod_id"=>$productId]);
        return $delProdCart;
    }
}