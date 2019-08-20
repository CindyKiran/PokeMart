@extends('layouts.master')

@section('content')
    <h1>Checkout</h1>
    <h4>Total: $ {{ $total }}</h4>
    <form action={{ route('payment') }}>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="card-name">Card Holder Name</label>
            <input type="text" id="card-name" required>
        </div>
        <div>
            <label for="card-number">Credit Card Number</label>
            <input type="text" id="card-number" required>
        </div>
        <div>
            <label for="card-cvc">CVC</label>
            <input type="text" id="card-cvc" required>
        </div>
        {{ csrf_field() }}
        <button type="submit">Bye</button>
    </form>
@endsection 