@extends('master')

@section('title', $currentProduct->brand->name . ':' . $currentProduct->name)

@section('content')

    <x-breadcrumps brand="{{ $currentProduct->brand->name }}"
                   brandId="{{ $currentProduct->brand->id }}"
                   product="{{ $currentProduct->name }}" />
    <!-- PRODUCT -->
    <main class="product container">
        <div class="">
            <div class="product__wrapper">
                <div class="product__left">
                    <img src="/storage/{{ $currentProduct->image }}" alt="image" class="product__image">
                </div>
                <div class="product__right">
                    <div class="product__code">Код товара: {{ $currentProduct->code }}</div>
                    <h1 class="product__title">{{ $currentProduct->name }}</h1>
                    <form action="" class="form">
                        <div class="product__descript">
                            <span class="product__question">Назначение:</span>
                            <span class="product__answer">{{ $currentProduct->function }}</span>
                        </div>
                        <div class="product__descript">
                            <span class="product__question">Форма выпуска:</span>
                            <span class="product__answer">{{ $currentProduct->form }}</span>
                        </div>
                        <div class="product__descript">
                            <span class="product__question">Количество:</span>
                            <span class="product__answer">{{ $currentProduct->amount }}</span>
                        </div>
                        <div class="product__descript">
                            <span class="product__question">Фирма:</span>
                            <span class="product__answer">{{ $currentProduct->brand->name }}</span>
                        </div>
                        <div class="product__descript">
                            <span class="product__question">Страна производитель:</span>
                            <span class="product__answer">{{ $currentProduct->brand->country }}</span>
                        </div>
                        <div class="product__bottom">
                            <div class="price">{{ $currentProduct->price }} <sup>₽</sup></div>
                            <button class="button basket-add" type="submit" data-basket_add="{{ $currentProduct->id }}">В корзину</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- DETAILS -->
    <section class="details">
        <div class="container">
            <div class="details__header">
                <h2 class="title">{{ $currentProduct->name }}</h2>
                <div class="topic">
                    <span class="topic__name">Подробнее</span>
                </div>
            </div>
            <p class="details__text">
                {{ $currentProduct->description }}
            </p>
            <div class="details__consist">
                <div class="topic">
                    <span class="topic__name">Состав</span>
                </div>
            </div>
            <p class="details__text">{{ $currentProduct->details }}</p>
        </div>
    </section>

    <!-- SLIDER -->
    <div class="container">
        <div class="details__header">
            <h2 class="title">Товары бренда</h2>
            <div class="topic">
                <span class="topic__name">Товары</span>
            </div>
        </div>
        <div class="slider">
            @foreach($products as $product)
            <div class="slider__item">
                <div class="prod-card">
                    <a href="{{ route('product', ['brand' => $currentProduct->brand, 'product' => $product]) }}" class="prod-card__link">
                        <img src="/storage/{{ $product->image }}" alt="image" class="prod-card__image">
                    </a>
                    <div class="prod-card__descript">
                        <span class="prod-card__name">{{ $product->name }}</span>
                        <span class="prod-card__price">{{ $product->price }}₽</span>
                    </div>
                    <button class="button basket-add" data-basket_add="{{ $product->id }}">В корзину</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection


@push('js')
    <script type="text/javascript" src="/js/slick.min.js"></script>
    <script type="text/javascript" src="/js/slider.js"></script>
@endpush
