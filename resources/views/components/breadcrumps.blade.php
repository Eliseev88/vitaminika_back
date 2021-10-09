<!-- BREADCRUMBS -->
<section class="breadcrumps">
    <div class="container">
        <ul class="breadcrumps__list">
            <li class="breadcrumps__element">
                <a href="{{ route('index') }}" class="breadcrumps__link">Главная</a>
            </li>
            @if(!empty($product))
                <li class="breadcrumps__element">
                    <a href="{{ route('brand', ['brand' => $brand]) }}" style="text-decoration: none; color:#372821;">{{ $brand }}</a>
                </li>
                <li class="breadcrumps__element">
                    {{ $product }}
                </li>
            @else
                <li class="breadcrumps__element">
                    {{ $brand }}
                </li>
            @endif
        </ul>
    </div>
</section>
