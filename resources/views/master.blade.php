<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Интернет магазин: @yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/8d73d6a795.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
         
        $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
        $('.scrollup').fadeIn();
        } else {
        $('.scrollup').fadeOut();
        }
        });
         
        $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
        });
         
        });
        </script>
</head>

<body>

<div class="content">

    <!-- HEADER -->
    <header class="header container">
        <div class="header__block left">
            <div class="header__cart">
                <a href="#popup_favor" class="header__link popup-link"><i class="far fa-heart"></i></a>
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
            <a href="{{ route('index') }}"><img src="/img/main_logo2.png" alt="logo"></a>
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
                                <a href="{{ route('brand', ['brand' => $brand->name]) }}" class="nav__sublink">{{ $brand->name }}</a>
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
                <h3 class="footer__title">Витаминика</h3>
                <p class="footer__subtitle">Официальный
                    представитель в России</p>
                <div class="footer__social">
                    <a href="" target="_blank" class="footer__social_item"><i class="fab fa-instagram"></i></a>
                    <a href="" target="_blank" class="footer__social_item"><i class="fab fa-twitter"></i></a>
                    <a href="" target="_blank" class="footer__social_item"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            <div class="footer__right">
                <nav class="footer__contacts">
                    <div class="footer__box">
                        <div class="footer__contacts_title">Навигация по сайту</div>
                        <div class="footer__items">
                            <a href="#common-cat" class="footer__element">Продукция</a>
                            <a href="/contacts" class="footer__element">Контакты</a>
                            <a href="/delivery" class="footer__element">Доставка</a>
                            <a href="/basket" class="footer__element">Корзина</a>
                        </div>
                    </div>
                    <div class="footer__box">
                        <div class="footer__contacts_title">Наши контакты</div>
                        <div class="footer__items">
                            <span class="footer__element fix">T: 098 738 12 93</span>
                            <span class="footer__element fix">T: 098 738 12 93</span>
                            <span class="footer__element fix">Украина, г. Харьков, пл. Конституции, 31</span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="footer__bottom">
            <span class="footer__element">Политика конфиденциальности</span>
            <span class="footer__element">Договор оферты</span>
            <span class="footer__element">Разработка сайта</span>
        </div>
    </div>
</footer>

<!-- POPUP -->
<div id="popup_order" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <a href="#" class="popup__close close-popup"><i class="fas fa-times"></i></a>
            <div class="order__title">Оформление заказа</div>
            <form action="" class="order">
                <div class="order__block">
                    <div class="order__column">
                        <div class="order__info">Ваше имя</div>
                        <input type="text" class="order__input" placeholder="Андрей">
                        <div class="order__info">Ваша фамилия</div>
                        <input type="text" class="order__input" placeholder="Иванов">
                    </div>
                    <div class="order__column">
                        <div class="order__info">Ваш телефон</div>
                        <input type="text" class="order__input" placeholder="+ 38(099) 947 1852">
                        <div class="order__info">Ваш e-mail</div>
                        <input type="email" class="order__input" placeholder="marikstru@gmail.com">
                    </div>
                </div>
                <div class="order__footer">
                    <div class="error">* Одно из полей не заполнено</div>
                    <button class="button" type="submit">Оформить</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
<button class="scrollup">
        <i class="fas fa-angle-up"></i>
</button>
<script type="text/javascript" src="/js/popup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@stack('js')

<!-- Basket-->
<script>
/*
    ADD PRODUCT
 */
    $(document).ready(function () {
        let totalQuantity = parseInt($('.quantity__box').text());
        if (totalQuantity != 0) $('.quantity__box').css('visibility', 'visible');
        $('.basket-add').click(function (event) {
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
    $(document).ready(function () {
        $('.cart').on('click', '.cart__delete', function (event) {
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
                    jQuery.each( data, function(i, val) {
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
    $(document).ready(function () {
    $('.number-minus').click(function (event) {
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
                $('#item-price_' + productId).html(data.currentProduct.quantity * data.currentProduct.price + ' <sup>₽</sup>')
                $('#sum').html(data.totalSum + '<sup> ₽</sup>');

            }
        })
    })
})

    // PLUS
    $(document).ready(function () {
    $('.number-plus').click(function (event) {
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
                $('#item-price_' + productId).html(data.currentProduct.quantity * data.currentProduct.price + ' <sup>₽</sup>')
                $('#sum').html(data.totalSum + '<sup> ₽</sup>');
            }
        })
    })
})

    function renderCart(object) {
        let str = '';
        let sum = 0;
        jQuery.each( object, function(i, val) {
            sum += val.price * val.quantity;
            str += `
                            <div class="cart__item" id="item_${i}">
                                <div class="cart__left">
                                    <div class="cart__image">
                                        <img src="${val.attributes.img}" alt="image">
                                    </div>
                                    <div class="cart__product">
                                        <div class="cart__name">${val.name}</div>
                                        <div class="cart__amount">60 таб.</div>
                                        <div class="number">
                                            <button class="number-minus basket-minus" type="button" onclick="this.nextElementSibling.stepDown();">-</button>
                                            <input type="number" min="1" value="${val.quantity}" readonly>
                                            <button class="number-plus basket-plus" type="button" onclick="this.previousElementSibling.stepUp();">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart__right">
                                    <button class="cart__delete fas fa-trash basket-delete" data-cart_id="{{ $cart_id }}" data-productId="${val.id}"></button>
                                    <div class="price__old">${val.price * val.quantity - 100}₽</div>
                                    <div class="price">${val.price * val.quantity} <sup>₽</sup></div>
                                </div>
                            </div>`
        })
        let cartBottom = `<div class="cart__bottom">
                    <div class="cart__line">
                        <div class="cart__box">
                            <span class="cart__text">Промокод:</span>
                            <input type="text" class="cart__input" placeholder="Введите промокод">
                        </div>
                        <div class="cart__box cart__box_right">
                            <span class="cart__text cart__text_sum">Итого:</span>
                            <div class="price" id="sum">${sum}<sup>₽</sup></div>
                        </div>
                    </div>
                    <div class="cart__line">
                        <a href="{{ route('index') }}" class="cart__link">Продолжить покупки</a>
                        <a href="#popup_order" class="button popup-link">Оформить заказ</a>
                    </div>
                </div>`
        return $('.cart').html(str + cartBottom);
    }

</script>

<script src="js/buttonAdd.js"></script>

</body>

</html>
