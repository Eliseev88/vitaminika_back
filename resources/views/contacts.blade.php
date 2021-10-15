@extends('master')

@section('title', 'Контакты')


@section('content')
    <x-breadcrumps brand="Контакты" />
        <section class="contacts">
            <div class="container">
                <div class="contacts__info">
                </div>
            </div>
        </section>

        <section class="address">
            <div class="container">
                <div class="address__title">
                    Мы на карте
                </div>

                <div class="address__map">
                    <div class="map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aed87b71df77436a36f6787081f19128ca224bf7861a638e33e376616f477dc0a&amp;width=740&amp;height=342&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>
                    <div class="map__info">
                        <div class="map__info-details">
                            <div class="details__icons">
                                <img src="img/contacts/watch.svg" alt="watch-icon">
                            </div>

                            <div class="info__text">Какая-то уточняющая информация</div>
                        </div>
                        <div class="map__info-details">
                            <div class="details__icons">
                                <img src="img/contacts/watch.svg" alt="watch-icon">
                            </div>

                            <div class="info__text">Какая-то уточняющая информация</div>
                        </div>
                        <div class="map__info-details">
                            <div class="details__icons">
                                <img src="img/contacts/watch.svg" alt="watch-icon">
                            </div>

                            <div class="info__text">Какая-то> Какая-то> Какая-то> Какая-то>Какая-то Какая-то> Какая-то> Какая-то> Какая-то>Какая-то Какая-то> Какая-то> Какая-то> Какая-то>Какая-то</div>
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

            <form id="feedback" class="feedback__form" action="">
                <label for="feedback-name">Ваше имя:
                    <input id="feedback-name" type="text">
                </label>
                <label for="feedback-email">Ваш E-mail:
                    <input id="feedback-email" type="email">
                </label>
                <label for="feedback-phone">Телефон:
                    <input id="feedback-phone" type="number">
                </label>
                <label for="feedback-message">Сообщение:
                    <textarea rows="7" maxlength="1000" id="feedback-message" type="text"></textarea>
                </label>
                <label class="file-upload" for="feedback-file">Документ:
                    <input id="feedback-file" type="file">
                </label>
                <label class='checkbox' for="feedback-checkbox">
                    <input id="feedback-checkbox" type="checkbox"> Согласен на обработку персональных данных
                </label>


                <p>Нажимая на кнопку "Отправить сооьщение", Вы даете согласие на обработку персональных данных.</p>

                <button  class="button popup-link" type="submit">Отправить</button>
            </form>




        </div>
    </section>
@endsection

