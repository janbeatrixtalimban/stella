@extends('layout.app')

@section('content')

    <form id="reg" method="POST" action="/login">
        {{ csrf_field() }}
        @if (\Session::has('failure'))
        <div class="alert alert-danger" role="alert">
        {!! \Session::get('failure') !!}
        </div>
        @endif
        <div class="form-group px-5">
            <label for="emailAddress">Email Address:</label>
            <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter email">
        </div>
        <div class="form-group px-5">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <button type="submit" class=" btn btn-md btn-block btn-rounded btn-primary text-uppercase my-4">Log In</button>
        </div>
    </form>
@endsection