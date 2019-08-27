@extends('layouts.master')

@section('title')
    Pokemart construction
@endsection

@section('content')
<div class="container">
    <!--message order confirmation-->
    @if(Session::has('success'))
        <div class="orderSuccess">
            {{Session::get('success')}}
        </div>
    @endif
    @foreach($products as $product)
        <div class="product">
            <h2>{{$product->name}}</h2>
            <img src="{{$product->imagePath}}" style="width:200px;">
            <h3>&#165;{{$product->price}}</h3>
            @if($product->price == 0)
                <p style="color: red">Out of stock</p>
            @else
                <a href="{{route('product.addToCart', ['id'=> $product->id])}}" class="btn">Order</a>
            @endif
        </div>
    @endforeach
</div>
@endsection
