<?php


namespace App;


class Cart
{
    public $items = [];
    public $totalPrice;
    public $totalQty;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function add($id, $product) {
        $storeProduct = [
            "item" =>$product,
            "totalPrice" => 0,
            "totalQty" => 0
        ];

        //kiem tra neu san pham da ton tai trong gio hang
        if (array_key_exists($id, $this->items)) {
            $this->items[$id]["totalQty"] += 1;
            $this->items[$id]["totalPrice"] += $product->price;
        }else {
            //neu san pham khong co trong gio hang
            $storeProduct["totalPrice"] = $product->price;
            $storeProduct["totalQty"] = 1;
            $this->items[$id] = $storeProduct;
        }

        //tang tong tien vs tong so luong san pham trong gio hang
        $this->totalPrice += $product->price;
        $this->totalQty += 1;
    }
}
