@extends('master')

@section('title', 'Главная')

@section('content')

<!-- MAIN
    <main class="main">
        <div class="container">
            <div style="text-align: center"></div>
            <h1 class="main__title">Компания Витаминика</h1>
            <a href="" class="button">В магазин</a>
        </div>
    </main> -->

<!-- DECOR 
    <div class="container">
        <img class="decor__big-arrow" src="/img/arrow-big-left.svg" alt="arrow">
    </div>-->

<!-- COMMON-CAT -->


<!-- HISTORY
    <section class="history">
        <div class="container">
            <div class="history__wrapper">
                <div class="history__column">
                    <div class="topic">
                        <span class="topic__number">02</span>
                        <span class="topic__name">История</span>
                    </div>
                    <div class="history__box">
                        <div class="history__decor"></div>
                        <h2 class="history__title">НАША ИСТОРИЯ</h2>
                        <div class="history__content">
                            <p class="history__text">Подводка высыхает за считанные секунды после нанесения, не скатывается
                                и не отпечатывается на верхнем веке. В комплекте с подводкой вы найдете
                                миниатюрную кисть, с помощью которой легко регулировать толщину и
                                интенсивность стрелок. Beauty Glazed Eyeliner Gel — волшебная палочка
                                в мире </p>
                            <div class="history__nav">
                                <a href="" class="button">В магазин</a>
                                <div class="history__video">
                                    <label for="video" class="history__label">Краткий видео-обзор</label>
                                    <button class="history__button" id="video"><i class="fas fa-play"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     -->

<!-- TOPCAT -->
<section class="topcat">
    <div class="container">
        <div class="topcat__inner">
            <div class="topic">
                <span class="topic__name">Топ товары</span>
            </div>
            <div class="topcat__title">
                <h2 class="topcat__suptitle">Топ товары</h2>
                <span class="topcat__subtitle">Бренда {{ $topBrand->name }}</span>
            </div>
        </div>
        <div class="topcat__box">
            <div class="topcat__left">
                <div class="topcat__category">
                    {{-- <span class="topcat__catname">{{ $brands[0]->name }}</span>--}}
                    <img src="{{ $topBrand->image }}" alt="image" class="topcat__cat-img">
                </div>
                <div class="topcat__link">
                    <a href="{{ route('brand', ['brand' => $topBrand->name]) }}" class="button">Все товары</a>
                </div>
            </div>

            @foreach($topBrand->products as $key => $product)
            @if($key >= 4)
            @break
            @endif
            <div class="topcat__item">
                <div class="prod-card">
                    <a href="{{ route('product', ['brand' => $topBrand->name, 'product' => $product->name]) }}" class="prod-card__link">
                        <img src="{{ $product->image }}" alt="image" class="prod-card__image">
                    </a>
                    <div class="prod-card__descript">
                        <div class="prod-card__name">{{ $product->name }}</div>
                        <div class="prod-card__price">{{ $product->price }}₽</div>
                    </div>
                    {{-- <form action="{{ route('basket.add', $product) }}" method="POST">--}}
                    <button class="button basket-add" type="submit" data-cart_id="{{ $cart_id }}" data-basket_add="{{ $product->id }}">В корзину</button>
                    {{-- </form>--}}
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="common-cat" id="common-cat">
    <div class="container">
        <div class="common-cat__inner">
            <h2 class="common-cat__title">Бренды</h2>
            <div class="topic">
                <span class="topic__name">Бренды</span>
            </div>
        </div>
        <div class="common-cat__wrapper">
            @foreach($allBrands as $brand)
            <a href="{{ route('brand', ['brand' => $brand->name]) }}" class="common-cat__item">
                <img class="common-cat__img" src="{{ $brand->image }}" alt="category_picture">
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection