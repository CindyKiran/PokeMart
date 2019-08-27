@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <h2>Profile stats of {{$user->firstName}}</h2>
            <table>
                <tr>
                    <td>Name:</td>
                    <td>{{$user->firstName}} {{$user->lastName}}</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>{{$user->address}} <br>
                        {{$user->place}}<br>
                        {{$user->country}}
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td> {{$user->email}}</td>
                </tr>
            </table>
        </div>
        <div class="card">
            <h2>Your order history</h2>
            @if($orders)
                @foreach($orders as $order)
                <table>
                    <tr>
                        <th>Placement Date</th>
                        <th>Order Number</th>
                        <th>Total Price</th>
                    </tr>
                    <tr>
                        <td>{{$order['created_at']}}</td>
                        <td>{{$order['payment_id']}}</td>
                        <td>{{$order['totalPrice']}}</td>
                    </tr>
                </table>
                @endforeach
            @else
                <p>No order has been placed yet</p>
            @endif
        </div>
    </div>
@endsection
