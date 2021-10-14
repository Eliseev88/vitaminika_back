@extends('admin/main')

@section('title', 'Заказы')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Заказы</h3>
                </div>
                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Номер заказа</td>
                                <td>Тип доставки</td>
                                <td>Статус заказа</td>
                                <td>Дата заказа</td>
                                <td>Дата обновления</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="/admin/order_1">12456</a></td>
                                <td>Самовывоз</td>
                                <td class="td-status">
                                    <span class="status purple"></span>
                                    Новый
                                </td>
                                <td>12.10.2021</br>12:00</td>
                                <td>12.10.2021<br>13:00</td>
                            </tr>
                            <tr>
                                <td><a href="/admin/order_1">12456</a></td>
                                <td>Доставка</td>
                                <td class="td-status">
                                    <span class="status purple"></span>
                                    новый
                                </td>
                                <td>12.10.2021</br>12:00</td>
                                <td>12.10.2021<br>13:00</td>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection