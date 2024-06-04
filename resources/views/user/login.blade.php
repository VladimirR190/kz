@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('user.login.post') }}">
    @csrf
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Войти</button>
</form>
@endsection
