@extends('admin/main')

@section('title', 'Подробности заказа')

@section('content')
<main>
    <div class="product">
        <div class="product__header">
            Код товара {{ $product->code }}
        </div>
        <div class="order__errors">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div style="color: red;">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <form class="product__form" enctype="multipart/form-data" method="POST" action="{{ route('admin.productUpdate', ['product' => $product]) }}">
            @csrf
            <label for="">
                <span>Наименование товара:</span>
                <textarea name="name">{{ $product->name }}</textarea>
            </label>
            <label>
                <span>Бренд*</span>
                <select name="brand_id" id="select_brand">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                            @if($brand->id == $product->brand_id) selected @endif>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label for="">
                <span>Код товара:</span>
                <input type="text" name="code" value="{{ $product->code }}">
            </label>

            <label for="">
                <span>Описание товара</span>
                <textarea name="details">{{ $product->details }}</textarea>
            </label>
            <label for="">
                <span>Состав</span>
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
