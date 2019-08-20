<?php

namespace App;

use Session;

class Cart 
{
    public $items = Array();
    public $totalQty = 0;
    public $totalPrice = 0;

    public function _construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        //default values if item not in cart 
        $storedItem = [
            'qty' => 0,
            'price' => $item->price,
            'item' => $item
        ];

        //if item is already in shopping cart
        if($this->items) {
            if(array_key_exists($id, $this->items) ) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
}
