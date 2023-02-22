@extends('layout.index')

@section('content')
    <section class="reg">
        <h1 class="section-title">Добавление книги</h1>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <form action="{{route('profile.add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input value="{{old('title')}}" name="title" type="text" placeholder="Название книги">
            <input value="{{old('content')}}" name="content" type="text" placeholder="Текст">
            <input value="{{old('year')}}" name="year" type="text" placeholder="Год издания">
            <input value="{{old('price')}}" name="price" type="text" placeholder="Цена">
            <input type="file" name="photo">

            <input type="submit" value="Добавить">
        </form>
    </section>
@endsection
