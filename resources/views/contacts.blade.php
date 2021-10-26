@extends('master')

@section('title', 'Контакты')


@section('content')
    <x-breadcrumps brand="Контакты" />

    <div class="order__errors container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="error">{{ $error }}</div>
            @endforeach
        @endif
    </div>
    @if (session('success'))
        <div class="order__complete container" style="color: #2d995b;">
            Ваш отзыв успешно отправлен. Спасибо за обратную связь!
        </div>
    @endif
        <section class="address">
            <div class="container">
                <div class="address__title">
                    Мы на карте
                </div>

                <div class="address__map">
                    <div class="map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad496605a8b39fd0f139d8cece2a1c5eafc8dba0b864038dee0286afbd2fb8ff0&amp;width=100%&amp;height=450&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>

                    <div class="map__info">
                        <div class="map__info-details">
                            <div class="details__icons">
                                <img src="img/contacts/watch.svg" alt="watch-icon">
                            </div>

                            <div class="info__text">
                            <b> Наш адрес: </b><br>
                                Россия, г. Москва, Ул. Фридриха Энгельса, 75, стр. 21, 6 этаж, офис 619
                            </div>
                        </div>
                        <div class="map__info-details">
                            <div class="details__icons">
                                <img src="img/contacts/watch.svg" alt="watch-icon">
                            </div>

                            <div class="info__text">
                               <b> Время работы офиса:</b> <br>
                                пн-пт с 10:00 до 17:00
                            </div>
                        </div>
                        <div class="map__info-details">
                            <div class="details__icons">
                                <img src="img/contacts/watch.svg" alt="watch-icon">
                            </div>

                            <div class="info__text">
                            <b> Актуальные номера телефонов:</b> <br>
                            +7-985-047-00-44, <br>
                            +7-919-997-99-37, <br>
                            +7-905-709-85-22
                            </div>
                        </div>
                        <div class="map__info-details">
                            <div class="details__icons">
                                <img src="img/contacts/watch.svg" alt="watch-icon">
                            </div>

                            <div class="info__text">
                               <b> Время приемов заказов по телефону: </b><br>
                                пн-пт с 8:00 до 20:00 <br>
                                сб-вск с 10:00 до 20:00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback">
        <div class="container">

            <div class="feedback__title">
                Ваши предложения и пожелания
            </div>

            <form id="feedback" class="feedback__form" method="POST" enctype="multipart/form-data" action="{{ route('review') }}">
                @csrf
                <label for="feedback-name">Ваше имя:
                    <input required name="name" id="feedback-name" type="text"  placeholder="Василий" value="{{ old('name') }}">
                </label>
                <label for="feedback-name">Ваша фамилия:
                    <input name="surname" id="feedback-name" type="text" placeholder="Иванов" value="{{ old('surname') }}">
                </label>
                <label for="feedback-email">Ваш E-mail:
                    <input required name="email" id="feedback-email" type="email" placeholder="mymail@mail.ru" value="{{ old('email') }}">
                </label>
                <label for="feedback-phone">Телефон:
                    <input name="phone" id="feedback-phone" type="text" placeholder="8-999-999-00-00" value="{{ old('phone') }}">
                </label>
                <label for="feedback-message">Сообщение:
                    <textarea required name="comment" rows="7" maxlength="1000" id="feedback-message"
                              type="text"  placeholder="Ваше сообщение" value="{{ old('comment') }}"></textarea>
                </label>
                <label class="file-upload" for="feedback-file">Документ:
                    <input name="file" id="feedback-file" type="file">
                </label>
                <label class='checkbox' for="feedback-checkbox">
                    <input required name="checkbox" id="feedback-checkbox" type="checkbox"> Согласен на обработку персональных данных
                </label>


                <p>Нажимая на кнопку "Отправить соощение", Вы даете согласие на обработку персональных данных.</p>

                <button  class="button popup-link" type="submit">Отправить</button>
            </form>




        </div>
    </section>
@endsection

