@extends('master')

@section('content')
    <x-breadcrumps brand="Корзина" />
        <div class="popup__body container">
            <div class="popup__content">
                <div class="cart__title">Корзина</div>
                <div class="cart" id="#cart">
                    @foreach($cart as $key => $el)
                        <div class="cart__item" id="item_{{ $key }}">
                            <div class="cart__left">
                                <div class="cart__image">
                                    <img src="{{ $el->attributes->img }}" alt="image">
                                </div>
                                <div class="cart__product">
                                    <div class="cart__name">{{ $el->name }}</div>
                                    <div class="cart__amount">{{ $el->attributes->amount }}</div>
                                    <div class="number">
                                        <button class="number-minus" data-product_id="{{ $el->id }}" data-cart_id="{{ $cart_id }}">-</button>
                                        <input id="item-quantity_{{ $el->id }}" type="number" min="1" value="{{ $el->quantity }}" readonly>
                                        <button class="number-plus" data-product_id="{{ $el->id }}" data-cart_id="{{ $cart_id }}">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="cart__right">
                                <button class="cart__delete fas fa-trash" data-item_id="{{ $key }}" data-cart_id="{{$cart_id}}" data-product_id="{{ $el->id }}"></button>
                                <!--<div class="price__old">{{ $el->price * $el->quantity - 100 }}₽</div>-->
                                <div class="price" id="item-price_{{ $el->id }}">{{ $el->price * $el->quantity }} <sup>₽</sup></div>
                            </div>
                        </div>
                    @endforeach
                    <div class="cart__bottom">
                                <div class="cart__line">
                                    <div class="cart__box cart__box_right">
                                        <span class="cart__text cart__text_sum">Итого:</span>
                                        <div class="price" id="sum">{{ \Cart::session($cart_id)->getTotal() }}<sup> ₽</sup></div>
                                    </div>
                                </div>
                                <div class="cart__line">
                                    <a href="{{ route('index') }}" class="cart__link">Продолжить покупки</a>
                                    <a href="{{ route('order') }}" class="button">Оформить заказ</a>
                                </div>
                            </div>
                </div>
            </div>
        </div>
@endsection
