@extends('layout.index')

@section('content')
    <section class="reg">
        <h1 class="section-title">Вход</h1>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <form action="{{route('login')}}" method="post">
            @csrf
            <input value="{{old('login')}}" name="login" type="text" placeholder="Логин">
            <input name="password" type="text" placeholder="Пароль">

            <input type="submit" value="Войти">
        </form>
    </section>
@endsection
