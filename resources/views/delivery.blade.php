@extends('master')

@section('title', 'Контакты')


@section('content')
    <x-breadcrumps brand="Доставка и оплата" />


    <section class="delivery container">
        <div class="delivery__wrapper">
            <div class="delivery__column">
                <img src="/img/delivery/1.jpg" alt="delivery">
            </div>
            <div class="delivery__column">
                <div class="delivery__row-title">Доставка по г. Москва</div>
                <div class="delivery__row-price">Стоимость доставки - 300 рублей по г. Москва вне зависимости от стоимости заказа. Бесплатной доставки нет. Доставка осуществляется в течение 2-х дней после согласования с менеджером.</div>
                <div class="delivery__row">
                    <div class="delivery__icon"><i class="far fa-clock"></i></div>
                    <div class="delivery__icon"><i class="far fa-money-bill-alt"></i></div>
                    <div class="delivery__icon"><i class="fas fa-exclamation-triangle"></i></div>
                </div>
                <div class="delivery__row">
                    <div class="delivery__text">Ваш товар будет доставлен в выбранный Вами промежуток времени: 10-18, 17-22, 10-22.</div>
                    <div class="delivery__text">При доставке по Москве оплата заказа осуществляется наличными курьеру при получении товара.</div>
                    <div class="delivery__text">Если при доставке Вы отказываетесь от заказа, то необходимо заплатить курьеру 300 рублей за выезд.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="delivery container">
        <div class="delivery__wrapper">
            <div class="delivery__column">
                <img src="/img/delivery/pickup.png" alt="pickup">
            </div>
            <div class="delivery__column">
                <div class="delivery__row-title">Самовывоз</div>
                <div class="delivery__row-price">После размещения и подтверждения заказа на самовывоз, товар будет зарезервирован за Вами в течение 48 часов, затем будет автоматически отменен.</div>
                <div class="delivery__row">
                    <div class="delivery__text fixed">Пункт Самовывоза находится по адресу: г. Москва, ул. Фридриха Энгельса, 75, стр. 21, 6 этаж, офис 619</div>
                </div>
            </div>
        </div>
    </section>

    <section class="delivery container">
            <div class="delivery__wrapper">
                <div class="delivery__column">
                    <img src="/img/delivery/4.jpg" alt="pickup">
                </div>
                <div class="delivery__column">
                    <div class="delivery__row-title">Оплата</div>
                    <div class="delivery__row-price">Оплата производится по факту получения товара наличными или банковским переводом.</div>
                    <div class="delivery__row wrap">
                        <div class="delivery__text fixed">В случае, если Вы по какой-либо причине отказываетесь от доставленного товара, стоимость доставки должна быть оплачена в полном объеме (п.3 ст.497 ГК РФ).</div>
                        <div class="delivery__text fixed margin">Простой курьера свыше 20-ти минут, оплачивается дополнительно.</div>
                    </div>
                </div>
            </div>
    </section>
@endsection
