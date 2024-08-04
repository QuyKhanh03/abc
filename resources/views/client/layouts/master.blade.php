<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->


    @include('client.layouts.partials.css')
    <style>

        .wrapper-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 9999;
            transition: 0.5s;
            display: none;
        }

        .container-loading {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .newtons-cradle {
            --uib-size: 200px;
            --uib-speed: 1.2s;
            --uib-color: #474554;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: var(--uib-size);
            width: var(--uib-size);
        }

        .newtons-cradle__dot {
            position: relative;
            display: flex;
            align-items: center;
            height: 100%;
            width: 25%;
            transform-origin: center top;
        }

        .newtons-cradle__dot::after {
            content: '';
            display: block;
            width: 100%;
            height: 25%;
            border-radius: 50%;
            background-color: var(--uib-color);
        }

        .newtons-cradle__dot:first-child {
            animation: swing var(--uib-speed) linear infinite;
        }

        .newtons-cradle__dot:last-child {
            animation: swing2 var(--uib-speed) linear infinite;
        }

        @keyframes swing {
            0% {
                transform: rotate(0deg);
                animation-timing-function: ease-out;
            }
            25% {
                transform: rotate(70deg);
                animation-timing-function: ease-in;
            }
            50% {
                transform: rotate(0deg);
                animation-timing-function: linear;
            }
        }

        @keyframes swing2 {
            0% {
                transform: rotate(0deg);
                animation-timing-function: linear;
            }
            50% {
                transform: rotate(0deg);
                animation-timing-function: ease-out;
            }
            75% {
                transform: rotate(-70deg);
                animation-timing-function: ease-in;
            }
        }

        @media screen and (max-width: 500px) {
            .newtons-cradle {
                --uib-size: 150px;
            }
        }

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="wrapper-loading">
        <div class="container-loading">
            <div class="newtons-cradle">
                <div class="newtons-cradle__dot"></div>
                <div class="newtons-cradle__dot"></div>
                <div class="newtons-cradle__dot"></div>
                <div class="newtons-cradle__dot"></div>
            </div>
        </div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="{{ route('login') }}">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="/clients/img/icon/search.png" alt=""></a>
            <a href="#"><img src="/clients/img/icon/heart.png" alt=""></a>
            <a href="#"><img src="/clients/img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
      @include('client.layouts.partials.header')
    </header>
        @yield('main-content')
    <!-- Footer Section Begin -->

    <!-- Footer Section End -->
    @include('client.layouts.partials.footer')
    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
   @include('client.layouts.partials.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('script')
</body>

</html>
