@extends('admin/main')

@section('title', 'Добавить бренд')

@section('content')
<main>
    <div class="brand">     
        <form class="brand__form" method="POST" action="">
            @csrf
            <label for="">
                <span>Название бренда:</span>
                <textarea></textarea>
            </label>
            <label for="">
                <span>Слоган:</span>
                <input type="number" value="">
            </label>
            <label for="">
                <span>Описание</span>
                <textarea></textarea>
            </label>
            <label>
                <span>Логотип бренда:</span>
                <input type="file" value="">
            </label>
            <label>
                <span>Презентация бренда:</span>
                <input type="file" value="">
            </label>
            <label>
                <span>Страна</span>
                <input type="text" value="">
            </label>
            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection