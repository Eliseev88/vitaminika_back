@extends('admin/main')

@section('title', 'Подробности заказа')

@section('content')
<main>
    <div class="product">
        <div class="product__header">
            Код товара {{ $product->code }}
        </div>
        <form class="product__form" enctype="multipart/form-data" method="POST" action="{{ route('admin.productUpdate', ['product' => $product]) }}">
            @csrf
            <label for="">
                <span>Наименование товара:</span>
                <textarea name="name">{{ $product->name }}</textarea>
            </label>
            <label for="">
                <span>Код товара:</span>
                <input type="number" name="code" value="{{ $product->code }}">
            </label>

            <label for="">
                <span>Описание товара</span>
                <textarea name="details">{{ $product->details }}</textarea>
            </label>
            <label for="">
                <span>Детали? </span>
                <textarea name="description">{{ $product->description }}</textarea>
            </label>
            <label for="">
                <span>Форма выпуска: </span>
                <textarea name="form"> {{ $product->form }} </textarea>
            </label>
            <label>
                <span>Изображение товара:</span>
                <input type="file" name="image">
            </label>
            <label>
                <span>Количество в упаковке:</span>
                <input type="text" name="amount" value="{{$product->amount}}">
            </label>
            <label>
                <span>Цена за упаковку:</span>
                <input type="number" name="price" value="{{ $product->price }}">
            </label>
            <label>
                <span>В наличие:</span>
                <select type="text"  name="availability"  value="{{$product->availability}}">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </label>
            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection