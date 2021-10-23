<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/adminStyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/8d73d6a795.js" crossorigin="anonymous"></script>
</head>

<body>

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
                    <a href="{{ route('admin') }}">
                        <span class="las la-igloo"></span>
                        <span>Главная</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders') }}">
                        <span class="las la-shopping-bag"></span>
                        <span>Заказы</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products') }}">
                        <span class="las la-clipboard-list"></span>
                        <span>Продукты</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.brand.all') }}">
                        <span class="las la-receipt"></span>
                        <span>Бренды</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="las la-user-circle"></span>
                        <span>Пользователи</span>
                    </a>
                </li>
                
                <li>
                    <a href="/">
                        <span class="fas fa-sign-in-alt"></span>
                        <span>Вернуться на сайт</span>
                    </a>
                </li>
                


            </ul>
        </div>

    </div>

    <div class="main-content">

        <header>
            <h2>
                <button id="sidebar-open">
                    <span class="las la-bars"></span>
                </button>

                Главная
            </h2>

            <!--
            <div class="search-wrapper">
                <span class="las la-search">

                </span>
                <input type="search" placeholder="search here">

            </div>

            <div class="user-wrapper">
                <img src="/img/main-logo.png" alt="" width="30px" height="30px">
                <div>
                    <h4>John Doe</h4>
                    <small>Super Admin</small>
                </div>
            </div>
            -->
        </header>


        @yield('content')


    </div>

    <script>
        const btnSidebarOpen = document.querySelector('#sidebar-open')
        const sidebar = document.querySelector('.sidebar')

        console.log(sidebar.classList.contains)

        btnSidebarOpen.addEventListener('click', (event) => {
            if(!sidebar.classList.contains('active')) {
                sidebar.classList.add('active')
            } else {
                 sidebar.classList.remove('active')
            }
        })

        const curpath = document.location.pathname;
        const link = curpath && document.querySelector('li a[href="' + curpath + '"]');

        if (link) {
            link.className += 'link-active';
        }

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @stack('js')

</body>

</html>
