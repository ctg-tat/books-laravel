@extends('layout.index')

@section('content')
    <section class="reg">
        <h1 class="section-title">Редактирование книги</h1>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <form action="{{route('book.update', $book->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input value="{{ $book->title }}" name="title" type="text" placeholder="Название книги">
            <input value="{{ $book->content }}" name="content" type="text" placeholder="Текст">
            <input value="{{ $book->year }}" name="year" type="text" placeholder="Год издания">
            <input value="{{ $book->price }}" name="price" type="text" placeholder="Цена">
            <input type="file" name="photo">

            <input type="submit" value="Редактировать">
        </form>
    </section>
@endsection
