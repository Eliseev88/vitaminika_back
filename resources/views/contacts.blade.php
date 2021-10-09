@extends('master')

@section('title', 'Контакты')


@section('content')
        <section class="contacts">
            <div class="container">
                <div class="contacts__info">
                    <p>
                        Специально для мужчин, страдающих от излишней жирности кожного покрова головы, а также ее чрезмерной
                        чувствительности, сопровождающейся зудом и раздражениями косметологи известного итальянского бренда
                        профессиональной косметики Barba Italiana создали средство, которое поможет избавится от этих
                        неприятностей — воду морскую очищающую янтарную для кожи головы Barba Italiana Muran 02.
                    </p>
                    <p>
                        Она обладает приятным освежающим ароматом, без труда наносится на кожу и быстро впитывается. Обогащенная
                        экстрактом фукуса пузырчатого, гидрогенизированным касторовым маслом и другими активными компонентами
                        прекрасно очищает и подсушивает эпидермис, способствует нормализации функций сальных желез, а также оказывае
                        противовоспалительное, дезинфицирующие и успокаивающее действия, устраняя ощущение дискомфорта.
                    
                    </p>
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

        <section class="address">
            <div class="container">
                <div class="address__title">
                    Мы на карте
                </div>

                <div class="address__map">
                    <div class="map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A1bde0fb23ee186984830662cf9b9a7bd5060b861e0af0d1e9170d839b05ccc41&amp;width=740&amp;height=342&amp;lang=ru_RU&amp;scroll=true"></script>
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
@endsection

