@extends('layout.index')

@section('content')
    <section>
        <div class="books">
            <div class="book">
                <div class="column">
                    <h3 class="book-author">{{$book->author()->surname}} {{ $book->author()->name}}</h3>

                    <h3 class="book-title">{{$book->title}}</h3>

                    <p class="book-text">{{ $book->content }}</p>

                    <p class="book-price">{{ $book->price }} ₽</p>

                    <p class="book-price">Год издания: {{ $book->year }}</p>

                    @auth
                        @if($book->user_has_actions)
                            <div class="buttons button-update">
                                <a href="{{ route('update', $book->id) }}" class="button">Редактировать</a>
                                <a href="{{ route('delete', $book->id) }}" class="button">Удалить</a>
                            </div>
                        @endif
                    @endauth

                </div>

                <img class="book-img" src="{{ $book->image_url }}" alt="">
            </div>
        </div>
    </section>
@endsection
