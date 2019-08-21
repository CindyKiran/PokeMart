@extends('layouts.master')

@section('content')
    @if(Session::has('cart'))
        <div>
            <h1>Your shopping cart</h1>
            @foreach ($products as $item)
            {{$item['item']['title']}}
            @endforeach
            <hr>

            <br>
            <a href={{ route('checkout')}}><button>Checkout</button></a>
        </div>
    @else
    @endif
@endsection