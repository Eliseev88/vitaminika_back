@extends('admin/main')

@section('title', 'Обратная связь')

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
                    <h3>Обратная связь</h3>
                </div>
                <div class="card__body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Номер заказа</td>
                                <td>Статус заказа</td>
                                <td>Дата заказа</td>
                                <td>Дата обновления</td>
                                <td>Действия</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <a href="{{ route('admin.feedbackShow' )}}">Номер заказа</a></td>
                                <td class="td-status">
                                    <span class="status purple"></span>
                                     Статус заказа
                                </td>
                                <td>Дата заказа</td>
                                <td>Дата обновления</td>
                                <td>Действия</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection