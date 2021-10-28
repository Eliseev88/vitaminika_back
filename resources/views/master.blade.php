<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Интернет магазин: @yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://kit.fontawesome.com/8d73d6a795.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>

<body>

    <div class="content">

        <!-- HEADER -->
        <header class="header container">
            <div class="header__logo">
                <a href="{{ route('index') }}">
                    <img src="/img/logoVitv1.png" alt="logo">
                </a>
            </div>

            <button id="burger-btn" class="fa fa-bars"></button>

            <div id='burger-menu' class="header__menu">

                <div action="" class="header__search">
                    <form class="header__form form-group">
                        <input type="text" data-provide="typeahead" class="header__form-input form-control typeahead-input typeahead" placeholder="Поиск...">
                        <button type="submit" class="header__form-icon fas fa-search"></button>
                    </form>
                </div>

                <div class="header__block-left">
                    <div class="header__cart">
                        <a href="{{ route('admin') }}" class="header__cart-link">
                            <i class="far fa-user"></i>
                            <span>Войти</span>
                        </a>
                        <a href="{{ route('basket') }}" class="header__cart-link quantity">
                            <div class="quantity__box">{{ $quantity }}</div>
                            <i class="fas fa-shopping-cart"></i>
                            <span>Корзина</span>
                        </a>
                    </div>

                </div>


                <div class="header__block-right">
                   
                        <i class="fas fa-phone"></i>
                        <span class="header__phone">+7-985-047-00-44</span>
                    
                    
                </div>


                <div class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item">
                        <details href="#" class="header__nav-details">
                          <summary><span>Продукция</span></summary> 
                        
                        <ul class="header__nav-subnav">
                            @foreach($allBrands as $brand)
                            <li>
                                <a href="{{ route('brand', ['brand' => $brand]) }}">{{ $brand->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        </details>
                    </li>
                    <li class="header__nav-item nav__item">
                        <a href="/contacts" class="nav__link"><i class="fas fa-address-book"></i>Контакты</a>
                    </li>
                    <li class="header__nav-item nav__item">
                        <a href="/delivery" class="nav__link"><i class="fas fa-truck"></i> Доставка</a>
                    </li>
                </ul>
                </div>
            </div>
        </header>

        <!-- NAV -->
        <nav class="nav">
            <div class="container">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="" class="nav__link has-subnav">Продукция</a>
                        <ul class="nav__subnav">
                            @foreach($allBrands as $brand)
                            <li class="nav__subitem">
                                <a href="{{ route('brand', ['brand' => $brand]) }}" class="nav__sublink">{{ $brand->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav__item">
                        <a href="/contacts" class="nav__link"> Контакты</a>
                    </li>
                    <li class="nav__item">
                        <a href="/delivery" class="nav__link">Доставка</a>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')

    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="footer__left">
                    <img src="/img/logoVitv2.png" alt="">
                    <h3 class="footer__title">Витаминика</h3>
                </div>
                <div class="footer__right">
                    <nav class="footer__contacts">
                        <div class="footer__box">
                            <div class="footer__contacts_title">Навигация по сайту</div>
                            <div class="footer__nav">
                                <a href="{{ route('contacts') }}" class="footer__element">Контакты</a>
                                <a href="{{ route('delivery') }}" class="footer__element">Доставка</a>
                                <a href="{{ route('basket') }}" class="footer__element">Корзина</a>
                            </div>
                        </div>
                        <div class="footer__box">
                            <div class="footer__contacts_title">Наши контакты</div>
                            <div class="footer__items">
                                <div class="footer__items-top">
                                    <span class="footer__element fix">T: +7-985-047-00-44</span>
                                    <span class="footer__element fix">T: +7-919-997-99-37</span>
                                    <span class="footer__element fix">T: +7-905-709-85-22</span>
                                </div>
                                <div class="footer__social">
                                    <a href="" target="_blank" class="footer__social_item"><i class="fab fa-instagram"></i></a>
                                    <a href="" target="_blank" class="footer__social_item"><i class="fab fa-twitter"></i></a>
                                    <a href="" target="_blank" class="footer__social_item"><i class="fab fa-facebook"></i></a>
                                </div>

                            </div>
                            <div class="footer__items-bottom">
                                <div class="footer__contacts_title">Наш адрес</div>
                                <span class="footer__element fix">Россия, г. Москва, Ул. Фридриха Энгельса, 75, стр. 21, 6 этаж, офис 619</span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="footer__bottom">
                <span class="footer__element">Авторские права &copy; <?php echo date("Y"); ?> Витаминика</span>
            </div>
        </div>
    </footer>

    <button class="scrollup">
        <i class="fas fa-angle-up"></i>
    </button>


    @stack('js')
    <script type="text/javascript" src="/js/popup.js"></script>
    <script src="/js/buttonAdd.js"></script>
    <script src="/js/bootstrap3-typeahead.js"></script>
    <!-- Basket -->
    <script>
        //ADD PRODUCT
        $(document).ready(function() {
            let totalQuantity = $('.quantity__box').text();
            if (+totalQuantity != 0 || totalQuantity != '') $('.quantity__box').css('visibility', 'visible');
            if (totalQuantity == 0) $('.quantity__box').css('visibility', 'hidden');
            $('.basket-add').click(function(event) {
                event.preventDefault();
                let productId = $(this).data('basket_add')
                $.ajax({
                    url: "{{ route('basket.add') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                    },
                    success: (data) => {
                        $('.quantity__box').css('visibility', 'visible');
                        $('.quantity__box').text(data);
                    }
                });
            });
        });

        //   DELETE PRODUCT
        $(document).ready(function() {
            $('.cart').on('click', '.cart__delete', function(event) {
                event.preventDefault();
                let productId = $(this).data('product_id');
                let cart_id = $(this).data('cart_id');
                let item_id = $(this).data('item_id');
                $.ajax({
                    url: "{{ route('basket.delete') }}",
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        cart_id: cart_id,
                    },
                    success: (data) => {
                        $('#item_' + item_id).remove();
                        let sum = 0;
                        let qty = 0;
                        jQuery.each(data, function(i, val) {
                            sum += val.price * val.quantity;
                            qty += val.quantity;
                        });
                        $('#sum').html(sum + '<sup> ₽</sup>');
                        if (qty == 0) {
                            $('.quantity__box').css('visibility', 'hidden');
                            $('#cart').html('<div class="cart__empty">Вы не добавили ни одного товара</div>')
                        }
                        $('.quantity__box').text(qty);
                    }
                })
            })
        })

        //  UPDATE PRODUCT
        // MINUS
        $(document).ready(function() {
            $('.number-minus').click(function(event) {
                event.preventDefault();
                let productId = $(this).data('product_id');
                $.ajax({
                    url: "{{ route('basket.update') }}",
                    method: "PATCH",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                    },
                    success: (data) => {
                        $('#item-quantity_' + productId).val(data.currentProduct.quantity);
                        $('#item-price_' + productId).html(data.currentProduct.quantity * data.currentProduct.price + '<sup>₽</sup>')
                        $('#sum').html(data.totalSum + '<sup> ₽</sup>');
                        $('.quantity__box').text(data.totalQuantity);
                    }
                })
            })
        })

        // PLUS
        $(document).ready(function() {
            $('.number-plus').click(function(event) {
                event.preventDefault();
                let productId = $(this).data('product_id');
                $.ajax({
                    url: "{{ route('basket.update') }}",
                    method: "PATCH",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        positive: true,
                    },
                    success: (data) => {
                        $('#item-quantity_' + productId).val(data.currentProduct.quantity);
                        $('#item-price_' + productId).html(data.currentProduct.quantity * data.currentProduct.price + '<sup>₽</sup>')
                        $('#sum').html(data.totalSum + '<sup> ₽</sup>');
                        $('.quantity__box').text(data.totalQuantity);
                    }
                })
            })
        })
    </script>

    {{-- SCROLL TOP--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });

            $('.scrollup').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                return false;
            });
            open

        });
    </script>

    {{-- // BASKET BUTTON ANIMATION--}}


    <script>
        const btnBurger = document.querySelector('#burger-btn')
        const menuBurger = document.querySelector('.header__menu')


        btnBurger.addEventListener('click', (event) => {

            if (!menuBurger.classList.contains('open')) {
                menuBurger.classList.add('open')
            } else {
                menuBurger.classList.remove('open')
            }
        })
    </script>


    <script type="text/javascript">
        const path = "{{ route('search.query') }}";

        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }

        });
    </script>

</body>

</html>