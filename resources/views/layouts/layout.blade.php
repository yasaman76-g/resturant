<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <img src="{{ asset('img/logo.jpg') }}" width="180" height="70">
            </div>
            <div class="col-md-6 link">
                @auth()
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="sabtnam btn btn-primary">خروج</button>
                    </form>
                @else  
                    <a href="{{route('login')}}" class="login">ورود به سایت</a>
                    <a href="{{route('register')}}" class="sabtnam">ثبت نام کنید</a>
                @endauth


            </div>

            <aside class="menu-bar">
                <nav id="menu_item">
                    <ul class="menu">
                        <li>
                            <a href="{{route('dashboard')}}" dideo-checked="true">محصولات</a>
                        </li> 
                        @auth
                        <li>
                            <a href="{{route('cart.index')}}" class="login">سبد خرید
                                {{ Cart::getTotalQuantity()}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('order.index')}}" class="login">سفارشات</a>
                        </li>
                        @endauth

                    </ul>
                </nav>
            </aside>
        </div>
    </div>
</div>

@yield('content')

<footer>
    
</footer>


<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>