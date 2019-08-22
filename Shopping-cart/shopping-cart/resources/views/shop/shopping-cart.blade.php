@extends('layouts.master')

@section('content')
    <div>
        <h1>Your shopping cart</h1>
        <table>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
                <!--When cart isn't empty-->
                @if(Session::has('cart') && $totalPrice > 0)
                    @foreach ($products as $item)
                    <tr>
                        <td>
                            <img src="{{$item['item']['imagePath']}}" style="width:100px">
                            {{$item['item']['title']}}
                        </td>
                        <td>
                            <div id="quantity">
                                <span><a href={{ route('product.reduceQty', ['id' => $item['item']['id']]) }}><i class="fas fa-minus"> </i></a></span>
                                <span>{{$item['qty']}}</span>
                                <span><a href={{ route('product.increaseQty', ['id' => $item['item']['id']]) }}><i class="fas fa-plus"> </i></a></span>
                            </div>      
                            <a href={{ route('product.removeItem', ['id' => $item['item']['id']]) }}><i class="fas fa-trash-alt"> </i></a>
                        </td>
                        <td>{{$item['item']['price']}}</td>
                        <td>{{$item['item']['price'] * $item['qty']}} </td>
                    </tr>
                    @endforeach
                <!--When cart is empty-->
                @else
                    <tr><td colspan="2"><p style="text-align: center">Your cart is empty</p></td></tr>
                @endif
         </table>
            <hr>
            <!--When cart isn't empty-->
            @if(Session::has('cart'))
                <h3>Total: &#165;{{ $totalPrice }}</h3><br>
                <a href={{ route('checkout')}}><button>Checkout</button></a>
            <!--When cart isn't empty-->
            @else
                <h3>Total: 0</h3>
            @endif
            
    </div>
@endsection