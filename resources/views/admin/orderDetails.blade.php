@extends('admin/main')

@section('title', 'Подробности заказа')

@section('content')
<main>
    <div class="order">
        <div class="order-header">
            Подробности заказа {{ $order->id }}
        </div>

        <form class="order-body" method="POST" action="{{ route('admin.orderUpdate', ['order' => $order]) }}">
            @csrf
            <div>Номер заказа: {{ $order->id }}</div>
            <div>
                <span>Фио: </span>
                <span>{{ $order->name }} {{ $order->surname }}</span>
            </div>
            <div>
                <span>Телефон: </span>
                <span>{{ $order->phone }}</span></div>
            <div>
                <span>Почта: </span>
                <span>{{ $order->email }}</span></div>
            <div>
                <span>Сумма заказа: </span>
                <span id="sum">{{ $order->sum }} руб.</span></div>
            <label for="">
                <span>Тип доставки:</span>
                <select name="delivery" id="select_delivery">
                    @if($order->delivery == 'yes')
                        <option value="no">Самовывоз</option>
                        <option value="yes" selected>На дом</option>
                    @else
                        <option value="no" selected>Самовывоз</option>
                        <option value="yes">На дом</option>
                    @endif
                </select>
            </label>
            <div id="delivery_info" style="@if ($order->delivery == 'no') display: none; @else display: block; @endif">
                <label for="">
                    <span>Адрес доставки:</span>
                    <textarea name="address">{{ $order->address }}</textarea>
                </label>
                <label for="">
                    <span>Комментарий доставки:</span>
                    <textarea name="comment">{{ $order->comment }}</textarea>
                </label>
            </div>
            <label for="order-status">
                <span>Статус заказа:</span>
                <select name="status" id="order-status">
                        <option value="0" @if($order->status == 0) selected @endif>Новый</option>
                        <option value="1" @if($order->status == 1) selected @endif>В обработке</option>
                        <option value="2" @if($order->status == 2) selected @endif>Завершен</option>
                        <option value="3" @if($order->status == 3) selected @endif>Отменен</option>
                </select>
            </label>
            <div>
                <span>Дата создания заказа:</span>
                <span>{{ $order->created_at }}</span>
            </div>
            <div>
                <span>Дата обновления:</span>
                <span>{{ $order->updated_at }}</span>
            </div>

            <button type="submit">Подтвердить</button>
        </form>

        <div class="order-product">
            <table width="100%">
                <thead>
                    <tr>
                        <td>№</td>
                        <td>Наименование</td>
                        <td>Артикул</td>
                        <td>Количество</td>
                        <td>Единица (шт.)</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody id="order_products">
                    @foreach($order->products as $key => $product)
                    <tr id="item_{{ $product->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->amount }}</td>
                        <td> <input type="number"
                                    name="count"
                                    value="{{ $product->pivot->count }}"
                                    style="width: 50px;"
                                    min="1"
                                    data-product_id="{{ $product->id }}"></td>

                        <td>
                            <button class="product-delete"
                                    data-item_id="{{ $product->id }}"
                                    data-product_id="{{ $product->id }}">Удалить</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</main>
@endsection

@push('js')
    <script>
        // DISPLAY DELIVERY ADDRESS & COMMENT INPUT
        $(document).ready(function () {
            $('#select_delivery').click(function () {
                if ($(this).val() == 'yes') {
                    $('#delivery_info').css('display', 'block')
                } else {
                    $('#delivery_info').css('display', 'none')
                }
            })
        })

        // DELETE PRODUCT ITEM
        $(document).ready(function () {
            $('.order-product').on('click', '.product-delete', function (event) {
                event.preventDefault();
                let productId = $(this).data('product_id');
                let itemId = $(this).data('item_id');
                $.ajax({
                    url: "{{ route('admin.orderDelete') }}",
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        orderId: {{ $order->id }},
                    },
                    success: (data) => {
                        $('#item_' + itemId).remove();
                        $('#sum').text(data);
                    }
                })
            })
        })

        // CHANGE QUANTITY
        $(document).ready(function () {
            $('input[name="count"]').on("input", function() {
                let productCount = $(this).val();
                let productId = $(this).data('product_id');
                $.ajax({
                    url: "{{ route('admin.orderUpdateProduct') }}",
                    method: "PATCH",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        orderId: {{ $order->id }},
                        productCount: productCount,
                    },
                    success: (data) => {
                        console.log(data)
                        $('#sum').text(data);
                    }
                })
            });
        })
    </script>
@endpush
