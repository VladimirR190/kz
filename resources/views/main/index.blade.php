@extends('layouts.layout')

@section('content')
@csrf
@if(Auth::check())
<h1>Привет, {{ Auth::user()->name }}</h1>
<form action="{{route('user.logout.post')}}" method="POST">
    @csrf
    <button type="submit">Выйти</button>
</form>
<form method="POST" action="{{route('user.create.car.post')}}" >
    @csrf
    <input type="text" name="name" placeholder="Текст">
    <button type="submit"> отправить</button>
</form>
<form method="POST" action="{{route('main.index.post')}}">
    @csrf
    @foreach($cars as $car)
<div>
    <h1>{{$car->name}} </h1>
    @if (!\App\Models\zaklad::where('userid', Auth::id())->where('carid', $car->id)->exists())
    <input type="date" name="bdate">
    <button value="{{$car->id}}" name="zkld">Оставить заявку</button>
    @else
    <p>заявка уже добавлена</p>
@endif
</div>
@endforeach
</form>
    @else
<h1>Привет</h1>
@foreach($cars as $car)
<div>
    <h1>{{$car->name}} </h1>
</div>
@endforeach
<button type="submit"><a href="{{route('user.login')}}" > Войти</a></button>
@endif
@endsection