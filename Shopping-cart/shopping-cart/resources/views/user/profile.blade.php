@extends('layouts.master')

@section('content')
    <h1>Profile!</h1>

    <h3>Your orders</h3>
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
@endsection
