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
                <span>Доставка:</span>
                <select name="delivery_type" id="select_delivery">
                        <option value="no" @if($order->delivery == 'no')selected @endif>Самовывоз</option>
                        @foreach($deliveryTypes as $deliveryType)
                        <option value="{{ $deliveryType->id }}"
                                @if($order->delivery == 'yes' && $order->delivery_type == $deliveryType->id)selected @endif>
                                {{ $deliveryType->name }}
                        </option>
                    @endforeach
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
            <div class="add-product">
                <div class="add-product__column">
                    <div class="add-product__title">Выберите товар</div>
                    <p><select id="select_product" name="add-product">
                            @foreach($products as $product)
                                @if($product->availability == 0)
                                    @continue
                                @endif
                                <option id="option_{{ $product->id }}" value="{{ $product->id }}">{{ $product->name }} - {{ $product->amount }}</option>
                            @endforeach
                        </select></p>
                </div>
                <div class="add-product__column">
                    <div class="add-product__title">Укажите количество</div>
                    <input class="add-product__count" type="number" min="1" value="1">
                </div>
                <div class="add-product__column">
                    <p><input class="add-product__button" type="submit" value="Добавить в заказ"></p>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

@push('js')
    <script>
        // DISPLAY DELIVERY ADDRESS & COMMENT INPUT
        $(document).ready(function () {
            $('#select_delivery').change(function () {
                if ($(this).val() == 'no') {
                    $('#delivery_info').css('display', 'none')
                } else {
                    $('#delivery_info').css('display', 'block')
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
                        $('#sum').text(data.sum + ' руб.');
                        $('#select_product').append(`
                            <option id="option_${data.product.id}" value="${data.product.id}">${data.product.name} - ${data.product.amount}</option>
                        `)
                    }
                })
            })
        })

        // CHANGE QUANTITY
        $(document).ready(function () {
            $('input[name="count"]').on("input", function() {
                let productCount = $(this).val();
                let productId = $(this).data('product_id');
                sendQuantityToBackEnd(productCount, productId)
            });
        })

        // ADD PRODUCT
        $(document).ready(function () {
            $('.add-product__button').on("click", function() {
                let productCount = $('.add-product__count').val();
                let productId = $('select[name=add-product]').val();
                $.ajax({
                    url: "{{ route('admin.orderAddProduct') }}",
                    method: "PUT",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        productId: productId,
                        orderId: {{ $order->id }},
                        productCount: productCount,
                    },
                    success: (data) => {
                        $('#sum').text(data.sum + ' руб.');
                        $('#order_products').append(`
                            <tr id="item_${data.product.id}">
                        <td>${data.count}</td>
                        <td>${data.product.name}</td>
                        <td>${data.product.code}</td>
                        <td>${data.product.amount}</td>
                        <td> <input type="number"
                                    name="count"
                                    value="${data.count}"
                                    style="width: 50px;"
                                    min="1"
                                    oninput="changeQuantity(this)"
                                    data-product_id="${data.product.id}"></td>

                        <td>
                            <button class="product-delete"
                                    data-item_id="${data.product.id}"
                                    data-product_id="${data.product.id}">Удалить</button>
                        </td>
                    </tr>
                        `)
                        $('#option_' + productId).remove();
                    }
                })
            });
        })

        function changeQuantity(product) {
            sendQuantityToBackEnd(product.value, product.dataset.product_id)
        }
        function sendQuantityToBackEnd(productCount, productId){
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
                    $('#sum').text(data + ' руб.');
                }
            })
        }
    </script>
@endpush
