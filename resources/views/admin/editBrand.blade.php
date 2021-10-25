@extends('admin/main')

@section('title', 'Добавить бренд')

@section('content')
<main>
    <div class="brand">
        <div class="brand__header">
            Название бренда
        </div>
        <form class="brand__form" enctype="multipart/form-data" method="POST" action="{{ route('admin.brand.update', ['brand' => $brand]) }}">
            @csrf
            <label for="">
                <span>Название бренда:</span>
                <textarea name="name">{{ $brand->name }}</textarea>
            </label>
            <label for="">
                <span>Слоган:</span>
                <textarea name="title">{{ $brand->title }}</textarea>
            </label>
            <label for="">
                <span>Описание</span>
                <textarea name="description">{{ $brand->description }}</textarea>
            </label>
            <label>
                <span>Логотип бренда:</span>
                <input type="file" name="image" value="{{ $brand->image }}">
            </label>
            <label>
                <span>Презентация бренда:</span>
                <input type="file" name="presentation" value="{{ $brand->presentation }}">
            </label>
            <label>
                <span>Страна</span>
                <input name="country" type="text" value="{{ $brand->country }}">
            </label>
            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection