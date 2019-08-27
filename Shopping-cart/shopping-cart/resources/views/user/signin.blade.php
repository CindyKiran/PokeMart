@extends('layouts.master')

@section('content')
<div class="container form">
    <h1>Sign In</h1>
    @if(count($errors) > 0)
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('user.signin') }}" method="post">
        <input type="text" id ="email" name="email" placeholder="E-mail">
        <input type="password" id="password" name="password" placeholder="Password">
      <button type="submit" class="btn">Sign In</button>
      <p>
          Don't have an account yet? <a href="{{ route('user.signup') }}">Signup </a>now!
      </p>
      {{ csrf_field() }}
  </form>
</div>
@endsection