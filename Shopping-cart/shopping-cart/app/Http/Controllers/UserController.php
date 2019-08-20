<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

    public function postSignup(Request $request){
        $this->validate($request, [
            'email' => 'email|required|unique:users|min:4',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        
        Auth::login($user);
        
        return redirect()->route('product.index');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required|min:4',
            'password' => 'required|min:4'
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        
        //unserialize cart information
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        //dd($orders);
        return view('user.profile', ['orders' => $orders]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }
}
