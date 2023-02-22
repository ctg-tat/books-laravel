@php use Illuminate\Support\Facades\Auth; @endphp
<header>
    <div class="logo">
        <a href="{{route('home')}}">
            Books
        </a>
    </div>

    @guest
        <div class="buttons">
            <a href="{{route('login')}}" class="button">Войти</a>
            <a href="{{route('register')}}" class="button">Зарегистрироваться</a>
        </div>
    @endguest

    @auth
        @if(Auth::user()->role === 'admin')
            <div class="buttons">
                <a href="{{route('admin')}}" class="button">Админ</a>
                <a href="{{route('logout')}}" class="button">Выход</a>
            </div>
        @else
            <div class="buttons">
                <a href="{{route('user')}}" class="button">Профиль</a>
                <a href="{{route('logout')}}" class="button">Выход</a>
            </div>
        @endif
    @endauth
</header>
