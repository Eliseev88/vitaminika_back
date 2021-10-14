@extends('admin/main')

@section('title', 'Подробности заказа')

@section('content')
<main>
    <div class="order">
        <div class="order-header">
            Подробности заказа №123456
        </div>

        <form class="order-body" method="GET">
            <div>Номер заказа: 123456</div>
            <div>
                <span>Фио: </span>
                <span>Василий Васильевич Васильев</span>
            </div>
            <div>
                <span>Телефон: </span>
                <span>+7 999 999 99 99</span></div>
            <div>
                <span>Почта: </span> 
                <span>vadya@mail.ru</span></div>
            <div>
                <span>Сумма заказа: </span> 
                <span>100 000</span></div>
            <label for="">
                <span>Тип доставки:</span>
                <select name="" id="">
                    <option value="">Самовывоз</option>
                    <option value="">На дом</option>
                </select>
            </label>
            <label for="">
                <span>Адрес доставки:</span>
                <textarea type="text"></textarea>
            </label>
            <label for="">
                <span>Комментарий доставки:</span>
                <textarea type="text"></textarea>
            </label>
            <label for="order-status">
                <span>Статус заказа:</span>
                <select name="order-status" id="order-status">
                    <option value="">Новый</option>
                    <option value="">В обработке</option>
                    <option value="">Ожидает</option>
                    <option value="">Завершен</option>
                    <option value="">Отменен</option>
                </select>
            </label>
            <div>
                <span>Дата создания заказа:</span>
                <span>10.10.2021 9:30</span>
            </div>
            <div>
                <span>Дата обновления:</span>
                <span>10.10.2021 9:30</span>
            </div>

            <button>Подтвердить</button>
        </form>

        <div class="order-product">
            <table width="100%">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Наименование</td>
                        <td>Code</td>
                        <td>Форма выпуска</td>
                        <td>Количество</td>
                        <td>Действия</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="/admin/order_1">12456</a>
                        </td>
                        <td>"Парад Зверят. АцидофиКидс, жевательные таблетки (зверята) с ягодным вкусом" ("Animal Parade® AcidophiKidz Chewable – Berry Flavor")</td>
                        <td>29969</td>
                        <td>Жевательные пастилки</td>
                        <td>90 таблеток</td>
                        <td>
                            <button>Удалить</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="/admin/order_1">12456</a>
                        </td>
                        <td>"Парад Зверят. АцидофиКидс, жевательные таблетки (зверята) с ягодным вкусом" ("Animal Parade® AcidophiKidz Chewable – Berry Flavor")</td>
                        <td>29969</td>
                        <td>Жевательные пастилки</td>
                        <td>90 таблеток</td>
                        <td>
                            <button>Удалить</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</main>
@endsection