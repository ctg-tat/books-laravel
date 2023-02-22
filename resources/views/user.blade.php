@extends('layout.index')

@section('content')
    <section class="user">
        <div class="wrapper">
            <div class="buttons">
                <a href="{{ route('add') }}" class="button">Добавить книгу</a>
            </div>
        </div>
    </section>
@endsection
