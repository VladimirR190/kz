@extends('layouts.layout')
@section('content')
    <div>
        <h1>Регистраиця </h1>
    </div>
    <form action="{{route('user.register.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
        <p>Имя</p>
        <input type="text" placeholder="Имя" name="name">
        <p>Фамилия</p>
        <input type="text" placeholder="Фамилия" name="sername">
        <p>Отчество</p>
        <input type="text" placeholder="Отчество" name="last_name">
        <p>Почта</p>
        <input type="text" placeholder="Mail" name="email">
        <p>Номер телефона</p>
        <input type="tel" placeholder="+7(952)-689-51-40" name="phone_number">
        <p>Пароль</p>
        <input type="password" placeholder="Пароль" name="password">
        <p>Подтвердите пароль</p>
        <input type="password" placeholder="Повторите пароль" name="password_confirmation">
        <p>Фото профиля</p>
        <input type="file" placeholder="Фото профиля" name="UserPhoto" >
        <p>Департамент</p>
        <select name="department">
            @foreach($departments as $department)
            <option value="{{ $department->name}}" name="department">{{ $department->name}}</option>
            @endforeach
        </select>

        
        
        
    </div>
    <button type="submit">Зарегистрироваться</button>
    </form>
@endsection
