@extends('master')

@section('title', $currentBrand->name)

@section('content')

    <x-breadcrumps brand="{{ $currentBrand->name }}" />
    <!-- CATEGORY -->
    <section class="category">
        <div class="container">
            <div class="category__wrapper">
                <div class="category__image">
                    <img src="/storage/{{ $currentBrand->image }}" alt="vitamins">
                </div>
                <div class="category__content">
                    <h1 class="category__slogan">{{ $currentBrand->title }}</h1>
                    <div class="category__box">
                        <p class="category__descript">{{ $currentBrand->description }}</p>
                        <a href="/storage/{{ $currentBrand->presentation }}" class="category__presentation" target="_blank"><i class="far fa-file-alt"></i>Скачать презентацию</a>
                    </div>
                </div>
            </div>
            <div id="pagination">
                <div class="category__inner">
                    <h2 class="title">{{ $currentBrand->name }}</h2>
                    {{ $products->links('vendor.pagination.custom') }}
                </div>
                <div class="category__body">
                    @foreach($products as $product)
                        <div class="prod-card">
                            <a href="{{ route('product', ['brand' => $currentBrand, 'product' => $product]) }}" class="prod-card__link">
                                <img src="/storage/{{ $product->image }}" alt="image" class="prod-card__image">
                            </a>
                            <div class="prod-card__descript">
                                <span class="prod-card__name">{{ $product->name }}</span>
                                <span class="prod-card__price">{{ $product->price }}₽</span>
                            </div>
                            <button class="button basket-add"
                                    data-basket_add="{{ $product->id }}">В корзину</button>
                        </div>
                    @endforeach
                </div>
                {{ $products->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script>
        // PAGINATION
        $(document).ready(function(){
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"/pagination/fetch_data?page="+page,
                    method: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        brandId: {{ $currentBrand->id }},
                    },
                    success:function(data)
                    {
                        $('#pagination').html(data);
                    }
                });
            }
        });

        // ADD TO BASKET
        function addToBasket(product) {
            // animation
            product.classList.add('active')
            setTimeout(function() {
                product.classList.remove('active')
            } , 800)

            // Add to basket
            let totalQuantity = parseInt($('.quantity__box').text());
            if (totalQuantity != 0) $('.quantity__box').css('visibility', 'visible');
                let productId = product.getAttribute('data-basket_add')
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
        }
    </script>
@endpush
