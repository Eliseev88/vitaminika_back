@extends('admin/main')

@section('title', 'Каталог товаров')

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
                                <td>ID</td>
                                <td>Наименование</td>
                                <td>Код</td>
                                <td>Форма выпуска</td>
                                <td>Количество</td>
                                <td>Последнее обновление</td>
                                <td>действия</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><a href="{{ route('admin.product', ['product' => $product]) }}">{{ $product->id }}</a></td>
                                <td>{{ $product->name }}</td>                                
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->form }}</td>
                                <td>{{ $product->amount }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
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