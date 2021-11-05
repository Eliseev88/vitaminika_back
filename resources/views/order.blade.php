@extends('master')

@section('title', 'Оформление заказа')

@section('content')
    <x-breadcrumps brand="Оформление заказа" />
        <div class="popup__body container">
            <div class="popup__content">
                <div class="order__title">
                    @if (session('success'))
                        Заказ оформлен
                    @else
                        Оформление заказа
                    @endif
                </div>
                @if (session('success'))
                    <div class="order__complete">
                        Ваш заказ №{{ session('orderId') }} на сумму {{ session('sum') }} рублей оформлен.
                        Информация по вашему заказу выслана на {{ session('email') }}
                        Наши менеджеры свяжутся с вами в ближайшее время.
                    </div>
                @elseif($quantity < 1)
                    <div class="cart__empty">Вы не добавили ни одного товара</div>
                @else
                    <form action="{{ route('order.add') }}" method="POST" class="order">
                        @csrf
                        <div class="order__block">
                            <div class="order__column">
                                <div class="order__info">Ваше имя</div>
                                <input type="text" class="order__input" placeholder="Андрей" name="name" value="{{ old('name') }}" required>
                                <div class="order__info">Ваша фамилия</div>
                                <input type="text" class="order__input" placeholder="Иванов" name="surname" value="{{ old('surname') }}" required>
                            </div>
                            <div class="order__column">
                                <div class="order__info">Ваш телефон</div>
                                <input type="text" class="order__input" placeholder="+ 38(099) 947 1852" name="phone" value="{{ old('phone') }}" required>
                                <div class="order__info">Ваш e-mail</div>
                                <input type="email" class="order__input" placeholder="marikstru@gmail.com" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form__wrapper">
                            <div class='form__input-box'>
                                <input type="radio" id="radio1" name="delivery" value="no" checked>
                                <label class="form__label" for="radio1">Самовывоз</label>
                            </div>
                            <div class='form__input-box'>
                                <input type="radio" id="radio2" name="delivery" value="yes">
                                <label class="form__label" for="radio2">Доставка</label>
                            </div>
                            <div>
                                <select id="delivery_type" name="delivery_type" class="form__address form__address--select">
                                    @foreach($deliveryTypes as $deliveryType)
                                    <option data-price="{{ $deliveryType->price }}" value="{{ $deliveryType->id }}">{{ $deliveryType->name }}</option>
                                    @endforeach
                                </select>
                                <textarea name="address" class="form__address" rows="1" placeholder="Укажите адресс доставки">{{ old('address') }}</textarea>
                                <p id="delivery_price"></p>
                            </div>
                        </div>
                        <div class="error" id="min-sum"></div>
                        <div class="order__footer">
                            <div class="order__errors">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <div class="error">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                            <button class="button" type="submit">Оформить</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
@endsection

@push('js')
    <!-- Order -->
    <script>
        $(document).ready(function () {
            $('.form__input-box').click(function () {
                let delivery = $('input[name=delivery]:checked').val();
                if (delivery == 'yes' && {{ $sum }} >= 1000) {
                    $('.form__address').css({
                        'display' : 'block',
                    });
                    checkDeliveryPrice()
                } else if (delivery == 'yes' && {{ $sum }} < 1000) {
                    $('input[name="delivery"][value="no"]').prop('checked', true);
                    $('#min-sum').text('Минимальная сумма доставки - 1000 руб.')
                } else {
                    $('#min-sum').text('')
                    $('.form__address').css({
                        'display': 'none'
                    });
                    $('#delivery_price').text('')
                }
            })
        })

        $(document).ready(function () {
            $('#delivery_type').change(function () {
                checkDeliveryPrice()
            })
        })

        function checkDeliveryPrice() {
            let deliveryPrice = $('#delivery_type').find(':selected').data('price');
            if (deliveryPrice == 0) {
                document.getElementById('delivery_price').textContent =
                    `Стоимость доставки будет рассчитана отдельно`;
            } else {
                document.getElementById('delivery_price').textContent =
                    `${deliveryPrice} руб. за доставку будет включено в заказ`;
            }
        }
    </script>
@endpush
