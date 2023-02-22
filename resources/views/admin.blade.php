@extends('layout.index')

@section('content')
    <section>
        <div class="books">
            @foreach($books as $book)
                <div class="book">
                    <div class="column">
                        <h3 class="book-author">{{$book->author()->surname}} {{ $book->author()->name}}</h3>

                        <h3 class="book-title">{{$book->title}}</h3>

                        <p class="book-text">{{ mb_substr($book['content'], 0, 150) }}...</p>

                        <p class="book-price">{{ $book->price }} ₽</p>

                        <a href="{{ route('book', $book->id) }}" class="link">Посмотреть</a>

                        <div class="buttons top">
                            <a href="{{ route('published', $book) }}" class="button">Опубликовать</a>
                            <a href="{{ route('blocked', $book) }}" class="button">Заблокировать</a>
                        </div>
                    </div>

                    <img class="books-img" src="{{ $book->image_url }}" alt="">
                </div>
            @endforeach
        </div>
    </section>
@endsection
