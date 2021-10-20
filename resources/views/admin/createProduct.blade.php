@extends('admin/main')

@section('title', 'Добавить новый товар')

@section('content')
<main>
    <div class="product">
        <div class="product__header">
            Код товара
        </div>
        <form class="product__form" method="POST" action="">
            @csrf
            <label for="">
                <span>Наименование товара:</span>
                <textarea></textarea>
            </label>
            <label for="">
                <span>Код товара:</span>
                <input type="number" value="">
            </label>

            <label for="">
                <span>Описание товара</span>
                <textarea></textarea>
            </label>
            <label for="">
                <span>Состав</span>
                <textarea></textarea>
            </label>
            <label for="">
                <span>Форма выпуска: </span>
                <textarea></textarea>
            </label>

            <label>
                <span>Количество в упаковке:</span>
                <input type="text" value="">
            </label>
            <label>
                <span>В наличие:</span>
                <select type="text" value="">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </label>
            <label>
                <span>Изображение товара:</span>
                <input type="file" value="">
            </label>
            <label>
                <span>Цена за упаковку:</span>
                <input type="number" value="">
            </label>

            <div>
                <span>Дата обновления:</span>
                <span></span>
            </div>

            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection