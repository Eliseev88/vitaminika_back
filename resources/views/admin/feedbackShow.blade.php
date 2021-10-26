@extends('admin/main')

@section('title', 'Ответить клиенту')

@section('content')
<main>
    <div class="feedback">     
        <form class="feedback__form" method="POST" action="">
            @csrf
            <div>
                <span>№ обращения</span>
                <span>1234</span>
            </div>
            <div>
                <span>Фио клиента</span>
                <span>Иванов Иван</span>
            </div>
            <div>
                <span>Email клиета</span>
                <span>ivan@mail.ru</span>
            </div>

            <div>
                <span>Телефон клиета</span>
                <span>+7 999 999 99 99</span>
            </div>
            <div>
                <span>Сообщение</span>
                <span>Доброго времени суток.</span>
            </div>
            <div>
                <span>Приложение</span>
                <a href="#" target="blank">Ссылка на приложение</a>
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
        </form>


    </div>
</main>
@endsection