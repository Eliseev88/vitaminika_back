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
    @livewireStyles
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
                    <a href="{{ route('admin.feedbacks') }}">
                        <span class="las la-user-circle"></span>
                        <span>Обратная связь</span>
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
                <button id="sidebar-open" class="las la-bars"></button>

                <span>Панель администратора</span>
            </h2>
            <div class="user-wrapper">

                <div>
                    <h4>{{ Auth::user()->name }}</h4>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a  class="dropdown-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >
                            <small>{{ __('Выйти') }}</small>
                        </a>

                        <form   id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                class="d-none"
                        >
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

        </header>


        @yield('content')


    </div>

{{--    SIDEBAR--}}
    <script>
        const btnSidebarOpen = document.querySelector('#sidebar-open')
        const sidebar = document.querySelector('.sidebar')

        btnSidebarOpen.addEventListener('click', (event) => {
            if (!sidebar.classList.contains('sidebar_active')) {
                sidebar.classList.add('sidebar_active')
            } else {
                sidebar.classList.remove('sidebar_active')
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

    @livewireScripts

</body>

</html>
