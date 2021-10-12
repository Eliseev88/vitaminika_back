<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/adminStyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <span class="lab la-accusoft"></span>
                <span>Витаминика</span>
            </h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="#" class="active">
                        <span class="las la-igloo"></span>
                        <span>Главная</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="las la-shopping-bag"></span>
                        <span>Заказы</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="las la-clipboard-list"></span>
                        <span>Продукты</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="las la-receipt"></span>
                        <span>Бренды</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="las la-user-circle"></span>
                        <span>Пользователи</span>
                    </a>
                </li>
                <!--
                <li>
                    <a href="#">
                        <span class="las la-clipboard-list"></span>
                        <span>tasks</span>
                    </a>
                </li>
                -->

                
            </ul>
        </div>

    </div>

    <div class="main-content">

        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                Главная
            </h2>

            <div class="search-wrapper">
                <span class="las la-search">

                </span>
                <input type="search" placeholder="search here">

            </div>

            <div class="user-wrapper">
                <img src="/img/main-logo.png" alt="" width="30px" height="30px" alt="">
                <div>
                    <h4>John Doe</h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>


        @yield('content')


    </div>

</body>

</html>