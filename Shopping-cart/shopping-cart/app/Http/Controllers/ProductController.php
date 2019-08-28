<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers;
use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart= new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getCart(){
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.shopping-cart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
            ]
        );
    }

    public function getReduceQty($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart= new Cart($oldCart);
        $cart->reduceQty($id);

        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getIncreaseQty($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart= new Cart($oldCart);
        $cart->increaseQty($id);

        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getCheckout(){
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice; 
        $orderNumber = rand(1000000, 9999999);
        Session::put('orderNumber', $orderNumber);

        return view('shop.checkout', ['total' => $total, 'orderNumber' => $orderNumber]);
    }

    public function paid(Request $request){
        //fill in order
        $order = new Order();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $fullname = $request->input('firstName'). " ". $request->input('lastName');
        $place = $request->input('address') . ", " . $request->input('place') . ", " . $request->input('country') ;
        $orderNumber = Session::get('orderNumber');

        //send order to db
        $order->cart = serialize('cart'); //convert to string
        $order->name = $fullname;
        $order->address = $place;
        $order->payment_id = $orderNumber; 
        $order->totalPrice = $cart->totalPrice;

        Auth::user()->orders()->save($order);

        //when order submitted
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Sucessfully purchased');

    }
}
