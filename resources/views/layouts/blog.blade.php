<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Home</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
<header id="header">
    <div class="container">
        <div class="header-content">
            <div class="header-content__logo">
                <a href="{{route('main.index')}}" class="header-content__logo-link">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,256,256">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(3.2,3.2)"><path d="M42.471,77.5c3.56,-1.682 6.029,-5.308 6.029,-9.5v-57.5h27v57.5c0,5.238 -4.262,9.5 -9.5,9.5z" fill="#c97412"></path><path d="M75,11v57c0,4.963 -4.037,9 -9,9h-21.682c2.83,-1.992 4.682,-5.284 4.682,-9v-57h26M76,10h-28v58c0,5.523 -4.477,10 -10,10h28c5.523,0 10,-4.477 10,-10v-58z" fill="#788b9c"></path><path d="M13,77.5c-5.238,0 -9.5,-4.262 -9.5,-9.5v-65.5h53v65.5c0,5.07 3.993,9.226 9,9.487v0.013z" fill="#ffffff"></path><path d="M56,3v65c0,3.953 2.306,7.378 5.643,9h-48.643c-4.963,0 -9,-4.037 -9,-9v-65h52M57,2h-54v66c0,5.523 4.477,10 10,10h53v-1c-4.971,0 -9,-4.029 -9,-9v-66z" fill="#788b9c"></path><path d="M13,12h34v4h-34zM13,24h14v1h-14zM13,30h14v1h-14zM13,36h14v1h-14zM13,42h14v1h-14zM13,48h14v1h-14zM13,54h14v1h-14zM13,60h14v1h-14zM13,66h14v1h-14zM57,22h11v1h-11zM57,28h11v1h-11zM57,34h11v1h-11zM57,40h11v1h-11zM57,46h11v1h-11zM57,52h11v1h-11zM57,58h11v1h-11zM57,64h11v1h-11zM33,24h14v1h-14zM33,30h14v1h-14zM33,36h14v1h-14zM33,42h14v1h-14zM33,48h14v1h-14zM33,54h14v1h-14zM33,60h14v1h-14zM33,66h14v1h-14z" fill="#788b9c"></path></g></g>
                    </svg>
                </a>
            </div>
            <ul class="header-content__nav-list">
                <li class="header-content__nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle bg-transparent header__menu-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Категории
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{route('category.posts.show',$category->id)}}">{{$category->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="header-content__nav-item">
                    <a class="header-content__nav-link" href="#">Свежие новости</a>
                </li>
                <li class="header-content__nav-item">
                    <a class="header-content__nav-link" href="#">О нас</a>
                </li>
                <li class="header-content__nav-item">
                    <a class="header-content__nav-link" href="#">Контакты</a>
                </li>
            </ul>
            <ul class="header-content__search-personal">
                <li class="header__search">
                    <button class="header__search-icon" onclick="search()"><i class="fas fa-search"></i></button>
                    <div class="header__search-form" >
                        <form action="{{route('search.index')}}" >
                            <input class="header__search-input" type="text" name="s" placeholder="Поиск">
                            <button type="button" class="header__search-close" onclick="search()"><i class="fas fa-times"></i></button>
                            <button type="submit" class="header__search-btn"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <li class="header-content__search-personal-item">
                    @auth()
                        <a href="{{route('personal.main.index')}}" class="header-content__search-personal-link"><i class="fas fa-user"></i> {{auth()->user()->name}}</a>
                @endauth
                @guest()
                    <li class="header-content__search-personal-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle bg-transparent header__menu-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </button>
                            <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1">
                                <a href="{{route('personal.login.index')}}" class="header-content__search-personal-link--black">Войти</a>
                                <a href="{{route('personal.register.index')}}" class="header-content__search-personal-link--black">Зарегистрироваться</a>
                            </ul>
                        </div>
                    </li>
                    @endguest
                    </li>
            </ul>
        </div>
    </div>
</header>

@yield('content')

<footer id="footer">
    <div class="container">
        <div class="footer__info">
            <div>
                <p class="footer__info-item footer__info-email">eeeee@mail.ru</p>
                <p class="footer__info-item footer__info-number">8-900-900-00-00</p>
                <p class="footer__info-item footer__info-number">8-900-800-11-11</p>
            </div>
            <div>
                <a href="" class="footer__info-item footer__info-link"><i class="fab fa-vk"></i></a>
                <a href="" class="footer__info-item footer__info-link"><i class="fab fa-facebook-square"></i></a>
                <a href="" class="footer__info-item footer__info-link"><i class="fab fa-odnoklassniki-square"></i></a>
            </div>
            <div>
                <a href="" class="footer__info-item footer__info-link">Свежие новости</a>
                <a href="" class="footer__info-item footer__info-link">Контакты</a>
                <a href="" class="footer__info-item footer__info-link">О нас</a>
            </div>
        </div>

    </div>

</footer>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script><script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
