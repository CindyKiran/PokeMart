@extends('layouts.master')

@section('content')
    <h1>Checkout</h1>
    <h4>Total: $ {{ $total }}</h4>
    <h4>Order Number: {{ $orderNumber}}</h4>

    <form action={{ route('payment') }}>
        <div>
            <label for="fname">First Name</label>
            <input type="text" name="firstName" required>
        </div>
        <div>
            <label for="fname">Last Name</label>
            <input type="text" name="lastName" required>
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" required>
        </div>
        <div>
            <label for="address">Country</label>
            <input type="text" name="country" required>
        </div>
        {{ csrf_field() }}
        <button type="submit">Submit Order</button>


    </form>
@endsection 