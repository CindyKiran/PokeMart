@extends('layouts.master')

@section('content')
    <h1>Profile!</h1>

    <h3>Your orders</h3>
    @foreach($orders as $order)
    <div class="panel panel-default">
        <div class="panel-body">
            {{-- @if(is_array($order))
            Yes is array
            @else
            Not an array
            @endif --}}
            <ul class="list-group">
                @foreach($order->cart->items['items'] as $item)
                <li class="list-group-item">
                    {{ $item['price'] }}
                    {{ $item['item']['title'] }}
                    {{ $item['qty'] }}
                </li>
                @endforeach
              </ul>
        </div>
        <div class="panel-footer">
            {{-- <strong>Total Price: {{ $order->cart->totalPrice }}</strong> --}}
        </div>
      </div>
    @endforeach
@endsection