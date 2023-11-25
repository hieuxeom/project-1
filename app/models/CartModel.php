<?php

class CartModel extends BaseModel
{
    const CART="carts";
    const CART_IT="cart_items";
    const USER="users";
    const VOU="vouchers";
    const PRO="products";

    // User với Cart
    public function getCart($userId){
        $CartData=$this->getTwoTable(table1: self::USER, table2: self::CART,
                            joinColumn:"user_id", table1Select:["username",],
                             table2Select:["cart_id", "status", "paid_date","cart_total","address"],
                            conditions:["user_id"=>$userId]);
                            return $CartData;
    }
    // Showw cart
    public function getShowCart($cartId, $prodId){
        $cart=$this->getOne(table: self::CART, conditions:["cart_id"=>$cartId]);
        $showCart=$this->getTwoTable(table1: self::PRO, table2: self::CART_IT,
        joinColumn:"prod_id", table1Select:["prod_name","img_path","prod_price"],
        table2Select:["quantity"], conditions:["prod_id"=>$prodId]);
        return $showCart;
    }
// add khi chưa có sp
    public function addProduct($cartId,$productId,$quantity,$pad){
        $addPro=$this->insert(table: self::CART_IT,
         data:["cart_id"=>$cartId,
         "prod_id"=>$productId,
         "quantity"=>$quantity,
         "price_at_paid"=>$pad]
    ); return $addPro;
    }
//add khi có sp
    public function addQuantityProduct($productId,$quantity){
        $addQProd=$this->update(table: self::CART_IT, data:["quantity"=>$quantity],
        conditions:["prod_id"=>$productId]);
        return $addQProd;
    }

    // Xóa giỏ hàng
    public function delCart($cartId){
        $delCart=$this->delete(table: self:: CART, conditions:["cart_id"=>$cartId]);
        return $delCart;

    }

    // Xóa sp trong giỏ hàng
    public function delProductCart($productId){
        $delProdCart=$this->delete(table: self::CART_IT,
        conditions:["prod_id"=>$productId]);
        return $delProdCart;
    }
}