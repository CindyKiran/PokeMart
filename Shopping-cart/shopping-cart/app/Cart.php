<?php

namespace App;

use Session;

class Cart 
{
    public $items = array();
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        //if session already has cart
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
            if( array_key_exists($id, $this->items) ) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];

        $this->items[$id] = $storedItem;
      
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceQty($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        //make sure qty cannot be negative
        if($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]); //destroy var 
        }
    }

    public function increaseQty($id){
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];

        //make sure qty cannot be negative
        if($this->items[$id]['qty'] >= 100) {
            unset($this->items[$id]); //destroy var 
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }



}
