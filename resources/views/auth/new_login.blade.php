@extends('layouts.app')
@section('content')
    {!! LaraYii::alert($errors) !!}
    <form id="login" action="{{ route('auth.login') }}" method="post" class="form">
    	@csrf
        <div class="form-group">
            <label for="username" class="form-control">Username</label>
            <input id="username" type="text" name="username" class="form-control w-100"  autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password" class="form-control">Password</label>
            <input id="password" type="password" name="password" class="form-control w-100"  autocomplete="off">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Login</button>
        </div>
    </form>
@endsection