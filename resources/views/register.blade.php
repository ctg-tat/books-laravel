@extends('layout.index')

@section('content')
    <section class="reg">
        <h1 class="section-title">Регистрация</h1>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <form action="{{route('register')}}" method="post">
            @csrf
            <input value="{{old('login')}}" name="login" type="text" placeholder="Логин">
            <input value="{{old('surname')}}" name="surname" type="text" placeholder="Фамилия">
            <input value="{{old('surname')}}" name="name" type="text" placeholder="Имя">
            <input name="password" type="text" placeholder="Пароль">
            <input name="re_password" type="text" placeholder="Повторный пароль">

            <input type="submit" value="Зарегистрироваться">
        </form>
    </section>
@endsection
