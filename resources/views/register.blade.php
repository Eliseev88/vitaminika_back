<section class="registration">
    <div class="container">
        <form class="registration__form" action="registration" method="post">
            <label for="registerEmail">Ваш email
                <span>Ваш email</span>
                <input type="email" id="registerEmail">
            </label>

            <label for="registerLogin">Ваш логин
                <span>Ваш логин</span>
                <input type="text" id="registerLogin">
            </label>

            <label for="registerName">Ваше имя
                <span>Ваше имя</span>
                <input type="text" id="registerName">
            </label>

            <label for="registerFamily">Ваша фамилия
                <span>Ваша фамилия</span>
                <input type="text" id="registerFamily">
            </label>

            <label for="registerAddress">Адрес доставки
                <span>Адрес доставки</span>
                <input type="text" id="registerAddress">
            </label>

            <label for="registerPhone">Ваш номер телефона
                <span>Ваш номер телефона</span>
                <input type="number" id="registerPhone">
            </label>

            <label for="registerPassword">Пароль
                <span>Пароль</span>
                <input type="password" id="registerPassword">
            </label>

            <label for="registerConfirmPassword">Повторите пароль
                <span>Повторите пароль</span>
                <input type="password" id="registerConfirmPassword">
            </label>

            <div class="registration__form-info">
                <p>
                    Нажимая кнопку зарегистрироваться, Вы соглашаетесь с принятой на сайте
                    <!-- ссылка на документ об обработке персональных данных-->
                    <a href="#">политикой обработки персональных данных</a>
                    и

                    <!-- ссылка на договор о правилах покупки товаров -->
                    <a href="#">правилами покупки товаров</a>
                </p>
                <button class="button popup-link" type="submit">Регистрация</button>
            </div>

        </form>
    </div>
</section>