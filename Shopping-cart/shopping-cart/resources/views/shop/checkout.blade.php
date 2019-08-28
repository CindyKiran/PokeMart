@extends('layouts.master')

@section('content')
<div class="container form">
    <h1>Checkout</h1>
    <h3 style="text-align: left;">Total: $ {{ $total }}</h3>
    <h3 style="text-align: left;">Order Number: {{ $orderNumber}}</h3><hr>

    <form action={{ route('payment') }}>
        <input type="text" name="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="place" placeholder="City" required>
        <input type="text" name="country" placeholder="Country" required>
        {{ csrf_field() }}
        <button type="submit">Submit Order</button>
    </form>
</div>
@endsection 