@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Welcome, {{$user->firstName}}</h1>
        <div class="card">
            <h2>Profile Stats</h2>
            <table>
                <tr>
                    <td>Name:</td>
                    <td>{{$user->firstName}} {{$user->lastName}}</td>
                </tr>
                <tr style="background-color: white;">
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
        <div class="card" style="width: 50%;">
            <h2>Order History</h2>
            <table style="width: 90%;">
                <tr>
                    <th>Placement Date</th>
                    <th>Order Number</th>
                    <th>Delivered to</th>
                    <th>Total Price</th>
                </tr>
                <!--If user never placed order before-->
                @if($orders->isEmpty())
                    <tr>
                        <td colspan="4" style="text-align: center;">You have not yet placed an order</td>
                    </tr>
                @else
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order['created_at']->toDateString()}}</td>
                        <td>{{$order['payment_id']}}</td>
                        <td>{{$order['address']}}</td>
                        <td>{{$order['totalPrice']}}</td>
                    </tr>
                     @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
