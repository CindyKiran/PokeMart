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
            <th>{{$order['created_at']}}</th>
            <th>{{$order['payment_id']}}</th>
        </tr>
    </table>
    @endforeach
@endsection
