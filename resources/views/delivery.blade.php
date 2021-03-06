@extends('master')

@section('title', 'Контакты')


@section('content')
<x-breadcrumps brand="Доставка и оплата" />
<section class="delivery container">
    <div class="delivery__header">
        <h1>Условия доставки и оплаты</h1>
    </div>
    <div class="delivery__info">
        <h4>Способы доставки</h4>
        <div class="delivery__info-details">
            <div class="delivery__details-header">
                <p>Доставка курьером</p>
                <span>Бесплатно при условии</span>
            </div>
            <div class="delivery__details-text">
                <p>Бесплатно при стоимости заказа от 10000 руб.</p>
                <p>Курьерская доставка по Москве (в пределах МКАД): </p>
                <p>Стоимость доставки по Москве - 350 руб. Минимальная сумма заказа - 1000 руб. Доставка курьером по Москве осуществляется с 9:00 до 22:00 и только после подтверждения вашего заказа менеджером магазина. В течении часа, после оформления заказа, наш консультант свяжется с Вами для уточнения деталей. При оформлении заказа вы можете выбрать один из интервалов доставки: с 9.00-18.00 или с 17.00-22.00. </p>
                <p>Курьерская доставка за пределы МКАД: </p>
                <p>Стоимость доставки за пределы МКАД</p>
                <ul>
                    <li>до 3-х км - 400 руб. </li>
                    <li>до 10 км - 500 руб</li>
                    <li>до 17 км - 800 руб.</li>
                    <li>до 25 км - 950 руб. </li>
                </ul>
                <p>
                    Доставка курьером за пределы МКАД осуществляется с 9:00 до 17:00 и
                    только после подтверждения вашего заказа менеджером магазина.
                </p>
            </div>
        </div>
        <div class="delivery__info-details">
            <div class="delivery__details-header">
                <p>Доставка транспортной компанией</p>
            </div>
            <div class="delivery__details-text">
                <p>Доставка в другие города России осуществляется ПОЧТОЙ РОССИИ и ТРАНСПОРТНЫМИ КОМПАНИЯМИ. </p>
                <p>
                    Вы всегда можете выбрать ту транспортную, которая подходит именно Вам.
                    Ниже перечень основных транспортных компаний, с которыми мы работаем:
                    СДЭК, ПЭК, Деловые линии, Желдорэкспедиция, Энергия, Байкал, КИТ, Nord Wheel (выгодная доставка в труднодоступные регионы) по 100% предоплате.
                </p>
                <p> Минимальная сумма заказа - 1000 рублей. </p>
                <p>Стоимость доставки из Москвы в Ваш город определяется по тарифам транспортной компании и оплачивается отдельно, при получении заказа.</p>
                <p> Отправка заказа осуществляется в течении 2-3 дней после поступления оплаты. </p>
                <p>Трек номер для отслеживания посылки, отсылается на электронный адрес клиента.</p>
            </div>
        </div>
        <div class="delivery__info-details">
            <div class="delivery__details-header">
                <p>Почта России</p>
            </div>
            <div class="delivery__details-text">
                <p>Бесплатно при стоимости заказа от 10000 руб.</p>
                <p>
                    Доставка в другие города России осуществляется СДЕК и ПОЧТОЙ РОССИИ
                    Минимальная сумма заказа - 1000 рублей.
                </p>
                <p>
                    Стоимость доставки из Москвы в Ваш город определяется по тарифам ТК
                    (оплата за пересылку осуществляется при получении заказа)
                    или ПОЧТЫ РОССИИ (оплачивается перед отправлением) (наложенный платеж не предусмотрен).
                </p>
                <p>
                    Отправка заказа осуществляется в течении 1-2 дней после поступления оплаты.
                    Трек номер для отслеживания посылки, отсылается на электронный адрес клиента.
                </p>
            </div>
        </div>
        <div class="delivery__info-details">
            <div class="delivery__details-header">
                <p>Доставка самовывоз</p>
            </div>
            <div class="delivery__details-text">
                <p>
                    Выдача товара производится по адресу:
                    Москва, ул. Фридриха Энгельса, д.75, стр.21, офис 619, 6 этаж.
                    Интернет-магазин "Витаминика"
                    С 10 до 19 по будним дням
                </p>
            </div>
        </div>
    </div>
    <div class="delivery__info">
        <h4>Способы оплаты</h4>
        <div class="delivery__info-details">
            <ul>
                <li> Оплата картой курьеру</li>
                <li>Оплата по счету
                    <ul>
                        <li> Доступна для Юридических лиц</li>
                    </ul>
                </li>
                <li>Оплата наличными курьеру
                    <ul>
                        <li>Доступна только для Покупателей Москвы и МО</li>
                    </ul>
                </li>
                <li>Перевод на бизнес карту
                    <ul>
                        <li>Банк Точка</li>
                        <li>5140 1702 1364 4140</li>
                        <li>ИП Радченко Александр Викторович</li>
                    </ul>
                </li>
                <li>Оплата наложенным платежом</li>
                <li>Оплата в офисе при получении через терминал или наличными</li>
                <li>На сайте магазина</li>
            </ul>
        </div>
    </div>
    <div class="delivery__info">
        <h4>Регионы доставки: </h4>
        <div class="delivery__info-details">
            <p>Россия, все регионы</p>
        </div>
    </div>
</section>
@endsection