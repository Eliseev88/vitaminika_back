@extends('admin/main')

@section('title', 'Подробности заказа')

@section('content')
<main>
    <div class="product">
        <div class="product__header">
            Код товара {{ $product->code }}
        </div>
        <form class="product__form" method="POST" action="">
            @csrf
            <label for="">
                <span>Наименование товара:</span>
                <textarea>{{ $product->name }}</textarea>
            </label>
            <label for="">
                <span>Код товара:</span>
                <input type="number" value="{{ $product->code }}">
            </label>

            <label for="">
                <span>Описание товара</span>
                <textarea>{{ $product->details }}</textarea>
            </label>
            <label for="">
                <span>Детали? </span>
                <textarea>{{ $product->description }}</textarea>
            </label>
            <label for="">
                <span>Форма выпуска: </span>
                <textarea> {{ $product->form }} </textarea>
            </label>

            <label>
                <span>Количество в упаковке:</span>
                <input type="text" value="{{$product->amount}}">
            </label>
            <label>
                <span>Цена за упаковку:</span>
                <input type="number" value="{{ $product->price }}">
            </label>
            <label>
                <span>В наличие:</span>
                <select type="text" value="{{$product->availability}}">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </label>

            <div>
                <span>Дата обновления:</span>
                <span>{{$product->updated_at}}</span>
            </div>
            <div>
                <span>Дата добавления:</span>
                <span>{{$product->created_at}}</span>
            </div>

            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection