@extends('admin/main')

@section('title', 'Добавить бренд')

@section('content')
<main>
    <div class="brand">
        <div class="brand__header">
            Название бренда
        </div>
        <form class="brand__form" method="POST" action="">
            @csrf
            <label for="">
                <span>Название бренда:</span>
                <textarea>{{ $brand->name }}</textarea>
            </label>
            <label for="">
                <span>Слоган:</span>
                <textarea>{{ $brand->title }}</textarea>
            </label>
            <label for="">
                <span>Описание</span>
                <textarea>{{ $brand->description }}</textarea>
            </label>
            <label>
                <span>Логотип бренда:</span>
                <input type="file" value="{{ $brand->image }}">
            </label>
            <label>
                <span>Презентация бренда:</span>
                <input type="file" value="{{ $brand->presentation }}">
            </label>
            <label>
                <span>Страна</span>
                <input type="text" value="{{ $brand->country }}">
            </label>
            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection