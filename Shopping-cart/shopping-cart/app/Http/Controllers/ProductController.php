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
        //Session::put('cart', $cart);
        //dd($request->session()->get('cart'));
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

    public function getCheckout(){
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        //dd($oldCart);
        $cart = new Cart($oldCart);
        //dd($cart);
        $total = $cart->totalPrice; 
        
        return view('shop.checkout', ['total' => $total]);
    }

    public function paid(Request $request){
        //save order
        $order = new Order();
        $order->cart = serialize('cart'); //convert to string
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->payment_id = 999;

        Auth::user()->orders()->save($order);

        //clear cart
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Sucessfully purchased');

    }
}
