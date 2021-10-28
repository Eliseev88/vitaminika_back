@foreach($products as $product)
    <tr id="item_{{$product->id}}">
        <td><a href="{{ route('admin.product', ['product' => $product]) }}"> {{ $product->name }}</a></td>
        <td>{{ $product->code }}</td>
        <td>{{ $product->form }}</td>
        <td>{{ $product->amount }}</td>
        <td>{{ $product->price }}</td>

        <td>
            @if($product->availability == 1)
                да
            @else
                нет
            @endif
        </td>

        <td>{{ $product->brand->name }}</td>

        <td class="card__body-action">
            <a href="{{ route('admin.product', ['product' => $product]) }}">Ред.</a>
            <button class="product-delete"
                    data-item_id="{{$product->id}}"
                    data-product_id="{{$product->id}}"
            >Уд.</button>
        </td>
    </tr>
@endforeach

<tr>
    <td colspan="8">
        {{ $products->links('vendor.pagination.default') }}
    </td>
</tr>
