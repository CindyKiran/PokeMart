@extends('layouts.master')

@section('content')
    @if(Session::has('cart'))
        <div>
            <h1>Your shopping cart</h1>
            @foreach (Session::get('cart')->items as $item)
            {{$item['qty']}}  x {{$item['price']}}
            @endforeach
            <hr>
            <strong>Total: {{Session::get('cart')->totalPrice}}</strong>
            <br>
            <a href={{ route('checkout')}}><button>Checkout</button></a>
        </div>
    @else
    @endif
@endsection