@extends('admin/main')

@section('title', 'Ответить клиенту')

@section('content')
<main>
    <div class="feedback">
        <div class="feedback__form">
            <div>
                <span>№ обращения</span>
                <span>{{ $review->id }}</span>
            </div>
            <div>
                <span>Фио отправителя</span>
                <span>{{ $review->name }} {{ $review->surname }}</span>
            </div>
            <div>
                <span>Email отправителя</span>
                <span>{{ $review->email }}</span>
            </div>

            <div>
                <span>Телефон отправителя</span>
                <span>{{ $review->phone }}</span>
            </div>
            <div>
                <span>Сообщение</span>
                <span>{{ $review->comment }}</span>
            </div>
            <div>
                <span>Приложение</span>
                @if(!empty($review->file))
                <a href="/storage/{{ $review->file }}" target="_blank">Открыть прикрепленный файл</a>
                @endif
            </div>
<!--
            <label for="feedback-status">
                <span>Статус:</span>
                <select name="status" id="order-status">
                        <option value="0">Новый</option>
                        <option value="1">В обработке</option>
                        <option value="2">Завершен</option>
                        <option value="3">Отменен</option>
                </select>
            </label>
            <label for="">
                <span>Заголовок письма:</span>
                <textarea name="title"></textarea>
            </label>
            <label for="">
                <span>Ответа на обращение: </span>
                <textarea name="message"></textarea>
            </label>
            <button type="submit">Ответить</button> -->

            <div><a class="btn-link" href="{{route('admin.feedbacks')}}">Назад</a></div>
        </div>


    </div>
</main>
@endsection
