@extends('admin/main')

@section('title', 'Добавить новый товар')

@section('content')
<main>
    <div class="product">
        <div class="product__header">
            Код товара
        </div>
        <div class="order__errors">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div style="color: red;">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <form class="product__form" enctype="multipart/form-data" method="POST" action="{{ route('admin.productCreate') }}">
            @csrf
            <label>
                <span>Наименование товара*:</span>
                <textarea name="name">{{ old('name') }}</textarea>
            </label>
            <label>
                <span>Бренд*</span>
                <select name="brand_id" id="select_brand">
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </label>
            <label>
                <span>Код товара*:</span>
                <input value="{{ old('code') }}" type="text" name="code">
            </label>

            <label>
                <span>Описание товара</span>
                <textarea type="text" name="description">{{ old('description') }}</textarea>
            </label>
            <label>
                <span>Состав</span>
                <textarea type="text" name="details">{{ old('details') }}</textarea>
            </label>
            <label>
                <span>Дозировка</span>
                <input value="{{ old('using') }}" type="text" name="using">
            </label>
            <label>
                <span>Назначение: </span>
                <textarea type="text" name="function">{{ old('function') }}</textarea>
            </label>
            <label>
                <span>Форма выпуска: </span>
                <textarea type="text" name="form">{{ old('form') }}</textarea>
            </label>

            <label>
                <span>Количество в упаковке:</span>
                <input value="{{ old('amount') }}" type="text" name="amount">
            </label>

            <label>
                <span>Изображение товара:</span>
                <input type="file" name="image">
            </label>
            <label>
                <span>В наличие*:</span>
                <select type="text" name="availability">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </label>
            <label>
                <span>Цена за упаковку*:</span>
                <input value="{{ old('price') }}" type="number" name="price">
            </label>

            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection
