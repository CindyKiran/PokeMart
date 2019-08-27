@extends('layouts.master')

@section('content')
<div class="container form">
  <h1>Sign Up</h1>
  @if(count($errors) > 0)
      <div class="error">
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
  @endif
  <form action="{{ route('user.signup') }}" method="post">
    <h3>Personal Information</h3>
      <input type="firstName" id="firstName" name="firstName" placeholder="First Name*">
      <input type="lastName" id="lastName" name="lastName" placeholder="Last Name*">
      <input type="address" id="address" name="address" placeholder="Address and house number">
      <input type="place" id="place" name="place" placeholder="Place">
      <input type="country" id="country" name="country" placeholder="Country">
    <h3>Login Information</h3>
      <input type="text" id ="email" name="email" placeholder="E-mail*">
      <input type="password" id="password" name="password" placeholder="Password*">
    <button type="submit" class="btn">Sign Up</button>
    <br><br></b><p style="color:gray">*Fields are required</p>
    <p>
        You already have an account? <a href="{{ route('user.signin') }}">Signin </a>now!
    </p>
    {{ csrf_field() }}
  </form>
</div>
@endsection