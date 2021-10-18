<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Интернет магазин: @yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <script src="https://kit.fontawesome.com/8d73d6a795.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
</head>

<body>

    <div class="content">

        <!-- HEADER -->
        <header class="header container">
            <div class="header__block left">
                <div class="header__cart">
                    <a href="{{ route('admin') }}" class="header__link"><i class="far fa-user"></i></a>
                    <a href="{{ route('basket') }}" class="header__link quantity">
                        <div class="quantity__box">{{ \Cart::session($cart_id)->getTotalQuantity() }}</div>
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
                <div class="header__search">
                    <form action="" class="header__form">
                        <input type="text" class="header__input" placeholder="Поиск">
                        <button type="submit" class="header__icon fas fa-search"></button>
                    </form>
                </div>
            </div>
            <div class="header__block">
                <a href="{{ route('index') }}"><img src="/img/logoVit-v2.png" alt="logo"></a>
            </div>
            <div class="header__block right">
                <i class="fas fa-phone"></i>
                <span class="header__phone">+38 099 947 19 23</span>
            </div>
        </header>

        <!-- NAV -->
        <nav class="nav">
            <div class="container">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#common-cat" class="nav__link has-subnav">Продукция</a>
                        <ul class="nav__subnav">
                            @foreach($allBrands as $brand)
                            <li class="nav__subitem">
                                <a href="{{ route('brand', ['brand' => $brand]) }}" class="nav__sublink">{{ $brand->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav__item">
                        <a href="/contacts" class="nav__link">Контакты</a>
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
                                <a href="#common-cat" class="footer__element">Продукция</a>
                                <a href="/contacts" class="footer__element">Контакты</a>
                                <a href="/delivery" class="footer__element">Доставка</a>
                                <a href="/basket" class="footer__element">Корзина</a>
                            </div>
                        </div>
                        <div class="footer__box">
                            <div class="footer__contacts_title">Наши контакты</div>
                            <div class="footer__items">
                                <div  class="footer__items-top">
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
                <span class="footer__element">Авторские права &copy; <?php echo date("Y");?> Витаминика</span>
            </div>
        </div>
    </footer>

    <button class="scrollup">
        <i class="fas fa-angle-up"></i>
    </button>
    <script type="text/javascript" src="/js/popup.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @stack('js')

    <!-- Basket -->
    <script>
        /*
    ADD PRODUCT
 */
        $(document).ready(function() {
            let totalQuantity = parseInt($('.quantity__box').text());
            if (totalQuantity != 0) $('.quantity__box').css('visibility', 'visible');
            $('.basket-add').click(function(event) {
                event.preventDefault();
                let productId = $(this).data('basket_add')
                let cart_id = $(this).data('cart_id')
                $.ajax({
                    url: "{{ route('basket.add') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        cart_id: cart_id,
                    },
                    success: (data) => {
                        $('.quantity__box').css('visibility', 'visible');
                        $('.quantity__box').text(data);
                    }
                });
            });
        });

        /*
            DELETE PRODUCT
        */
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
                        if (qty == 0) $('.quantity__box').css('visibility', 'hidden');
                        $('.quantity__box').text(qty);
                    }
                })
            })
        })

        /*
            UPDATE PRODUCT
         */
        // MINUS
        $(document).ready(function() {
            $('.number-minus').click(function(event) {
                event.preventDefault();
                let productId = $(this).data('product_id');
                let cart_id = $(this).data('cart_id');
                $.ajax({
                    url: "{{ route('basket.update') }}",
                    method: "PATCH",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        cart_id: cart_id,
                    },
                    success: (data) => {
                        $('#item-quantity_' + productId).val(data.currentProduct.quantity);
                        $('#item-price_' + productId).html(data.currentProduct.quantity * data.currentProduct.price + '<sup>₽</sup>')
                        $('#sum').html(data.totalSum + '<sup> ₽</sup>');

                    }
                })
            })
        })

        // PLUS
        $(document).ready(function() {
            $('.number-plus').click(function(event) {
                event.preventDefault();
                let productId = $(this).data('product_id');
                let cart_id = $(this).data('cart_id');
                $.ajax({
                    url: "{{ route('basket.update') }}",
                    method: "PATCH",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        cart_id: cart_id,
                        positive: true,
                    },
                    success: (data) => {
                        $('#item-quantity_' + productId).val(data.currentProduct.quantity);
                        $('#item-price_' + productId).html(data.currentProduct.quantity * data.currentProduct.price + '<sup>₽</sup>')
                        $('#sum').html(data.totalSum + '<sup> ₽</sup>');
                    }
                })
            })
        })
    </script>
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

        });
    </script>
    <script src="/js/buttonAdd.js"></script>
</body>

</html>
