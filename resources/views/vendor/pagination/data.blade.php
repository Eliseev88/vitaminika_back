<div class="category__inner">
    <h2 class="title">{{ $currentBrand->name }}</h2>
    {{ $products->links('vendor.pagination.custom') }}
</div>
<div class="category__body">
    @foreach($products as $product)
        <div class="prod-card">
            <a href="{{ route('product', ['brand' => $currentBrand, 'product' => $product]) }}" class="prod-card__link">
                <img src="{{ $product->image }}" alt="image" class="prod-card__image">
            </a>
            <div class="prod-card__descript">
                <span class="prod-card__name">{{ $product->name }}</span>
                <span class="prod-card__price">{{ $product->price }}₽</span>
            </div>
            <button onclick="addToBasket(this)"
                    class="button basket-add"
                    data-cart_id="{{ $cart_id }}"
                    data-basket_add="{{ $product->id }}">В корзину</button>
        </div>
    @endforeach
</div>
{{ $products->links('vendor.pagination.custom') }}
