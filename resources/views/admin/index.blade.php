@extends('admin/main')

@section('title', 'Главная')

@section('content')


        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{ $usersCount }}</h1>
                        <span>Обратная связь</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $newOrders }}</h1>
                        <span>Новых заказов</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $inProgressOrders }}</h1>
                        <span>Заказа в обработке</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>{{ $completedOrders }}</h1>
                        <span>Завершенных заказов</span>
                    </div>
                    <div>
                        <span class="lab la-shopping-bag"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card__header">
                            <h3>Последние заказы</h3>
                            <a href="{{ route('admin.orders') }}">
                                 Смотреть все
                                <span class="las la-arrow-right"></span>
                            </a>
                        </div>
                        <div class="card__body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Номер заказа</td>
                                        <td>Дата заказа</td>
                                        <td>Статус заказа</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($lastOrders as $order)
                                    <tr>
                                        <td><a href="{{ route('admin.order', ['order' => $order]) }}">{{ $order->id }}</a></td>
                                        <td>{{ $order->created_at }}</td>
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
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New customers</h3>
                            <button>
                                See all
                                <span class="las la-arrow-right"></span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="./img/pileje/logo.png" alt="" width="30px" height="30px">
                                    <div>
                                        <h4>Lewies S Cunningham</h4>
                                        <small>Ceo excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                -->
            </div>


        </main>

@endsection
