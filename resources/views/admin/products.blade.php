@extends('admin/main')

@section('title', 'Каталог товаров')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">
            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card__header">
                    <h3>Товары</h3>
                    <a href="{{ route('admin.createProduct')}}">Добавить товар</a>
                </div>
                <div class="card__body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Наименование</td>
                                <td>Код</td>
                                <td>Форма выпуска</td>
                                <td>Количество</td>
                                <td>Цена</td>
                                <td>Наличие</td>
                                <td>Последнее обновление</td>
                                <td>действия</td>
                            </tr>
                        </thead>
                        <tbody>
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

                                <td>{{ $product->updated_at }}</td>

                                <td class="card__body-action">
                                    <a href="{{ route('admin.product', ['product' => $product]) }}">Ред.</a>
                                    <button class="product-delete"
                                        data-item_id="{{$product->id}}"
                                        data-product_id="{{$product->id}}"
                                    >Уд.</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links('vendor.pagination.default') }}
                </div>

            </div>
        </div>
    </div>
</main>

@push('js')
<script>
    // PRODUCT DELETE
    $(document).ready(function () {
            $('.card__body').on('click', '.product-delete', function (event) {
                event.preventDefault();
                let adminConfirm = confirm('Вы уверены, что хотите удалить позицию?');
                let productId = $(this).data('product_id');
                let itemId = $(this).data('item_id');
                if (adminConfirm) {
                    $.ajax({
                        url: "{{ route('admin.productDelete') }}",
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            productId: productId
                        },
                        success: (data) => {
                            $('#item_' + itemId).remove();
                        }
                    })
                }
            })
        })
</script>

@endpush
@endsection
