@extends('layouts.layout')

@section('content')
<p>Привет админ</p>
<table>
<tr>
    <th>имя</th>
    <th>почта</th>
</tr>
@foreach($users as $user)
<tr>
    <th>{{$user->name}}</th>
    <th>{{$user->email}}</th>
</tr>


@endforeach
</table>
<table>
<tr>
    <th>№</th>
    <th>заявка</th>
</tr>
@foreach($cars as $car)
<tr>
    <th>{{$car->id}}</th>
    <th>{{$car->name}}</th>
</tr>


@endforeach
</table>
@endsection