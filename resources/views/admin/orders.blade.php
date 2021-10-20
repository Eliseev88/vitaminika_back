@extends('admin/main')

@section('title', 'Заказы')

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
                    <h3>Заказы</h3>
                    <a href="">Добавить товар</a>
                </div>
                <div class="card__body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Номер заказа</td>
                                <td>Тип доставки</td>
                                <td>Статус заказа</td>
                                <td>Дата заказа</td>
                                <td>Дата обновления</td>
                                <td>Действия</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="{{ route('admin.order', ['order' => $order]) }}">{{ $order->id }}</a></td>
                                <td>
                                    @if ($order->delivery == 'yes') Доставка
                                    @else Самовывоз
                                    @endif
                                </td>
                                <td class="td-status">
                                    @if($order->status == 0)
                                        <span class="status purple"></span>
                                        новый
                                    @elseif($order->status == 2)
                                        <span class="status orange"></span>
                                        завершен
                                    @elseif($order->status == 1)
                                        <span class="status pink"></span>
                                        в процессе
                                    @else
                                        <span class="status orange"></span>
                                        отменен
                                    @endif
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                
                                <td class="card__body-action">
                                    <a href="{{ route('admin.order', ['order' => $order]) }}">Ред.</a>
                                    <!--<button>Уд.</button>-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
