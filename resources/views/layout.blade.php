<!DOCTYPE html>
<html lang=“ja”>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="ja">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{$title}}</title>
    <!-- <meta name=”description” content="サイトの説明">
    <meta name=”keywords” content="キーワード, キーワード">
    <link rel="shortcut icon" href=""> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/smooth-scroll@16/dist/smooth-scroll.min.js"></script>


    @if(app('env')=='local')
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('css/base.css') }}" rel="stylesheet" media="all">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet" media="all">
        <link href="{{ secure_asset('css/base.css') }}" rel="stylesheet" media="all">
    @endif
</head>
<body>


    <header>
        <div>
            <h1><a href="/">{{$title}}</a></h1>
            <p id="menu-trigger">
                <span></span>
                <span></span>
                <span></span>
            </p>
        </div>
    </header>



    <nav id="top-menu">
        <ul>
            <li><a href="/"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="contact"><i class="fab fa-telegram-plane"></i> Contact</a></li>
        </ul>
    </nav>




    <main>
        @yield('main')
    </main>






    <footer>
        <div>
            <ul class="sns">
                <a href="https://twitter.com/{{$twitter}}"><i class="fab fa-twitter-square"></i></a>
                <a href="https://github.com/{{$git}}"><i class="fab fa-github-square"></i></i></a>
            </ul>
            <a href="#" id="top-button"><i class="fas fa-chevron-up"></i></a>
        </div>
    </footer>






</body>
@if(app('env')=='local')
    <script src="{{ asset('js/base.js') }}"></script>
@endif
@if(app('env')=='production')
    <script src="{{ secure_asset('js/base.js') }}"></script>
@endif
</html>
