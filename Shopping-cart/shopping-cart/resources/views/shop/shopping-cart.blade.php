@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Your shopping cart</h1>
        <table>
            <tr>
                <th colspan="2">Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
                <!--When cart isn't empty-->
                @if(Session::has('cart') && $totalPrice > 0)
                    @foreach ($products as $item)
                    <tr>
                        <td style="text-align: right;"><img src="{{$item['item']['imagePath']}}" style="width:100px;"></td>
                        <td>{{$item['item']['name']}}</td>
                        <td>
                            <div id="quantity">
                                <span><a href={{ route('product.reduceQty', ['id' => $item['item']['id']]) }}><i class="fas fa-minus"> </i></a></span>
                                <span style="padding: 0 5px;">{{$item['qty']}}</span>
                                <span><a href={{ route('product.increaseQty', ['id' => $item['item']['id']]) }}><i class="fas fa-plus"> </i></a></span>
                            </div>      
                            <a href={{ route('product.removeItem', ['id' => $item['item']['id']]) }}><i class="fas fa-trash-alt"> </i></a>
                        </td>
                        <td>&#165;{{$item['item']['price']}}</td>
                        <td>&#165;{{$item['item']['price'] * $item['qty']}} </td>
                    </tr>
                    @endforeach
                <!--When cart is empty-->
                @else
                    <tr><td colspan="5"><p style="text-align: center">Your cart is empty</p></td></tr>
                @endif
        </table>

        <div id="total">
            <!--When cart isn't empty-->
            @if(Session::has('cart'))
                <h2 style="text-align:right;">Total: &#165;{{ $totalPrice }}</h2><br>
                <a href={{ route('checkout')}} class="btn">Checkout</a>
            <!--When cart isn't empty-->
            @else
                <h2 style="text-align:right;">Total: &#165;0</h2><br>
            @endif
        </div>
    </div>
@endsection