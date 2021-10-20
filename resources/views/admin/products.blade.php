@extends('admin/main')

@section('title', 'Каталог товаров')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">

            <div class="card">
                <div class="card__header">
                    <h3>Заказы</h3>
                    <a href="">Добавить товар</a>
                </div>
                <div class="card__body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Наименование</td>
                                <td>Код</td>
                                <td>Форма выпуска</td>
                                <td>Количество</td>
                                <td>Цена</td>
                                <td>Наличие</td>
                                <td>Последнее обновление</td>
                                <td>действия</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><a href="{{ route('admin.product', ['product' => $product]) }}"> {{ $product->name }}</a></td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->form }}</td>
                                <td>{{ $product->amount }}</td>
                                <td>{{ $product->price }}</td>

                                <td>
                                    @if($product->availability == 1)
                                        да
                                    @else
                                        нет
                                    @endif
                                </td>

                                <td>{{ $product->updated_at }}</td>

                                <td class="card__body-action">
                                    <a href="{{ route('admin.product', ['product' => $product]) }}">Ред.</a>
                                    <button>Уд.</button>
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