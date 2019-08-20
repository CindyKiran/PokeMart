@extends('layouts.master')

@section('content')
  <h1>Sign Up</h1>
  @if(count($errors) > 0)
      <div>
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
  @endif
  <form action="{{ route('user.signup') }}" method="post">
    <div class="formgroup">
      <label for="email">E-mail</label>
      <input type="text" id ="email" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    {{ csrf_field() }}
</form>
@endsection