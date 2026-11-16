@extends('layouts.app')

@section('title', 'Login | Tasks for Today')

@section('content')
<section class="page-heading compact"><p class="eyebrow">Protected management area</p><h1>Log in</h1><p class="lead">Sign in to create, edit, and archive tasks.</p></section>
<section class="content-panel form-panel login-panel"><form method="POST" action="{{ url('/login') }}">@csrf
    @if ($errors->any())<div class="validation-errors">{{ $errors->first() }}</div>@endif
    <div class="form-group"><label for="username">Username</label><input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus></div>
    <div class="form-group"><label for="password">Password</label><input id="password" name="password" type="password" required></div>
    <label class="remember"><input type="checkbox" name="remember"> Remember me</label>
    <button class="button primary" type="submit">Log in</button>
    <p class="login-hint">Demo account: <strong>ashtonchy</strong> / <strong>password</strong></p>
</form></section>
@endsection
