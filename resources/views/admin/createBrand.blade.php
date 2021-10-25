@extends('admin/main')

@section('title', 'Добавить бренд')

@section('content')
<main>
    <div class="brand">     
        <form class="brand__form"  enctype="multipart/form-data" method="POST" action="{{ route('admin.brand.create') }}">
            @csrf
            <label for="">
                <span>Название бренда:</span>
                <textarea name="name"></textarea>
            </label>
            <label for="">
                <span>Слоган:</span>
                <textarea name="title"></textarea>
            </label>
            <label for="">
                <span>Описание</span>
                <textarea name="description"></textarea>
            </label>
            <label>
                <span>Логотип бренда:</span>
                <input type="file" name="image" >
            </label>
            <label>
                <span>Презентация бренда:</span>
                <input name="presentation" type="file">
            </label>
            <label>
                <span>Страна</span>
                <input name="country" type="text">
            </label>
            <button type="submit">Подтвердить</button>
        </form>
    </div>
</main>
@endsection