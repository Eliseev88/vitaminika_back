@extends('master')

@section('title', 'Главная')

@section('content')

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
                    <img src="{{ $topBrand->image }}" alt="image" class="topcat__cat-img">
                </div>
                <div class="topcat__link">
                    <a href="{{ route('brand', ['brand' => $topBrand]) }}" class="button">Все товары</a>
                </div>
            </div>

            @foreach($topBrandRandomProducts as $key => $product)
                    @if($key >= 4)
                        @break
                    @endif
                    <div class="topcat__item">
                        <div class="prod-card">
                            <a href="{{ route('product', ['brand' => $topBrand, 'product' => $product]) }}" class="prod-card__link">
                                <img src="{{ $product->image }}" alt="image" class="prod-card__image">
                            </a>
                            <div class="prod-card__descript">
                                <div class="prod-card__name">{{ $product->name }}</div>
                                <div class="prod-card__price">{{ $product->price }}₽</div>
                            </div>
                            <button class="button basket-add"
                                    type="submit"
                                    data-basket_add="{{ $product->id }}">В корзину</button>
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
            <a href="{{ route('brand', ['brand' => $brand]) }}" class="common-cat__item">
                <img class="common-cat__img" src="{{ $brand->image }}" alt="category_picture">
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
