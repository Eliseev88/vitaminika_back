@extends('admin/main')

@section('title', 'Каталог брендов')

@section('content')
<main>
    <div class="recent-grid">
        <div class="projects">

            <div class="card">
                <div class="card__header">
                    <h3>Бренды</h3>
                    <a href="{{ route('admin.createBrand')}}">Добавить товар</a>
                </div>
                <div class="card__body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Название</td>
                                <td>Страна</td>
                                <td>Обновление</td>
                                <td>Действия</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($brands as $brand)
                            <tr>
                                <td><a href="{{ route('admin.brand', ['brand' => $brand]) }}"> {{ $brand->name }}</a></td>
                                <td>{{ $brand->country }}</td>
                                <td>{{ $brand->updated_at }}</td>

                                <td class="card__body-action">
                                    <a href="{{ route('admin.brand', ['brand' => $brand]) }}">Ред.</a>
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