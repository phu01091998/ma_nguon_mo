<?php
class CartItem
{
    #Begin properties
    var $phoneid;
    var $phonename;
    var $image;
    var $price;
    var $quantity;
    var $totalCost;
    #end properties
    #Construct function
    function __construct($phoneid, $phonename, $image, $price, $quantity)
    {
        $this->phoneid = $phoneid;
        $this->phonename = $phonename;
        $this->image = $image;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->totalCost = $price * $quantity;
    }
    // public function getPhoneID(){
    //     return $this->phoneid;
    // }
    // public function getImage(){
    //     return $this->image;
    // }
    // public function getPrice(){
    //     return $this->price;
    // }
    // public function getQuantity(){
    //     return $this->quantity;
    // }
    // public function setQuantity($quantity){
    //     $this->quantity = $quantity;
    // }
    public function getTotalCost(){
        return $this->totalCost;
    }
    public function setTotalCost()
    {
        $this->totalCost = $this->price * $this->quantity;
    }
    #Member function
    /**
     * Lấy toàn bộ các điện thoại
     */

    // static  function addCart($phoneid, $phonename, $image, $price, $quantity)
    // {   
    //     $ls = CartItem::getLSCartItem();
    //     foreach ($ls as $key => $value) {
    //         if ($value->phoneid = $phoneid) {
    //             $value->quantity = $value->quantity + $quantity;
    //             $value->setTotalCost();
    //             return;
    //         }
    //     }
    //     $cartItem = new CartItem($phoneid, $phonename, $image, $price, $quantity);
    //     array_push($this->lsCartItem, $cartItem);
    // }
    // function getCart(){
    //     return $this->lsCartItem;
    // }
}
       

    ?>