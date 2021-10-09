@extends('master')

@section('title', $currentBrand->name)

@section('content')

    <x-breadcrumps brand="{{ $currentBrand->name }}" />
    <!-- CATEGORY -->
    <section class="category">
        <div class="container">
            <div class="category__wrapper">
                <div class="category__image">
                    <img src="{{ $currentBrand->image }}" alt="vitamins">
                </div>
                <div class="category__content">
                    <h1 class="category__slogan">{{ $currentBrand->title }}</h1>
                    <div class="category__box">
                        <p class="category__descript">{{ $currentBrand->description }}</p>
                        <a href="{{ $currentBrand->presentation }}" class="category__presentation" target="_blank"><i class="far fa-file-alt"></i>Скачать презентацию</a>
                    </div>
                </div>
            </div>
            <div class="category__inner">
                <h2 class="title">{{ $currentBrand->name }}</h2>
                <div class="pagination">
                    <button class="pagination__button prev"></button>
                    <div class="pagination__pages">
                        <a href="#" class="pagination__link">
                            <div class="pagination__line"></div>
                            <span class="pagination__number">01</span>
                        </a>
                        <a href="#" class="pagination__link active">
                            <div class="pagination__line"></div>
                            <span class="pagination__number">02</span>
                        </a>
                        <a href="#" class="pagination__link">
                            <div class="pagination__line"></div>
                            <span class="pagination__number">03</span>
                        </a>
                        <a href="#" class="pagination__link">
                            <div class="pagination__line"></div>
                            <span class="pagination__number">04</span>
                        </a>
                        <a href="#" class="pagination__link">
                            <div class="pagination__line"></div>
                            <span class="pagination__number">05</span>
                        </a>
                        <a href="#" class="pagination__link">
                            <div class="pagination__line"></div>
                            <span class="pagination__number">06</span>
                        </a>
                    </div>
                    <button class="pagination__button next"></button>
                </div>
            </div>
            <div class="category__body">
                @foreach($currentBrand->products as $product)
                    <div class="prod-card">
                        <a href="{{ route('product', ['brand' => $currentBrand->name, 'product' => $product->name]) }}" class="prod-card__link">
                            <img src="{{ $product->image }}" alt="image" class="prod-card__image">
                        </a>
                        <div class="prod-card__descript">
                            <span class="prod-card__name">{{ $product->name }}</span>
                            <span class="prod-card__price">{{ $product->price }}₽</span>
                        </div>
                        <button class="button basket-add" data-cart_id="{{ $cart_id }}" data-basket_add="{{ $product->id }}">В корзину</button>
                    </div>
                @endforeach
            </div>
            <div class="pagination">
                <button class="pagination__button prev"></button>
                <div class="pagination__pages">
                    <a href="#" class="pagination__link">
                        <div class="pagination__line"></div>
                        <span class="pagination__number">01</span>
                    </a>
                    <a href="#" class="pagination__link active">
                        <div class="pagination__line"></div>
                        <span class="pagination__number">02</span>
                    </a>
                    <a href="#" class="pagination__link">
                        <div class="pagination__line"></div>
                        <span class="pagination__number">03</span>
                    </a>
                    <a href="#" class="pagination__link">
                        <div class="pagination__line"></div>
                        <span class="pagination__number">04</span>
                    </a>
                    <a href="#" class="pagination__link">
                        <div class="pagination__line"></div>
                        <span class="pagination__number">05</span>
                    </a>
                    <a href="#" class="pagination__link">
                        <div class="pagination__line"></div>
                        <span class="pagination__number">06</span>
                    </a>
                </div>
                <button class="pagination__button next"></button>
            </div>
        </div>
    </section>

@endsection
