<div class="contacts-page">
    <div class="container">
        
        <div class="contacts-titles">
            <h2>Контакты</h2>
            <h2>Написать нам</h2>
        </div>

        <div class="contacts-top">
            <!---------------------------------------------------Контакты--------------------------------------------------->
            <div class="contacts">
                <div class="contact-item">
                    <div class="contact-label">Адрес:</div>
                    <div>г. Ижевск, ул. Какая-то, д. 1</div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">Телефон:</div>
                    <div><a href="tel:+79000000000">+7 (900) 000-00-00</a></div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">Email:</div>
                    <div><a href="mailto:info@autoservice.ru">info@autoservice.ru</a></div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">Режим работы:</div>
                    <div>Пн-Пт: 9:00 - 20:00<br>Сб-Вс: 10:00 - 18:00</div>
                </div>
            </div>

            <!---------------------------------------------------Форма--------------------------------------------------->
            <div class="contacts">
                <? if (isset($_SESSION['review_error'])){ ?>
                    <div class="auth-error">
                        <?php 
                        echo htmlspecialchars($_SESSION['review_error']);
                        unset($_SESSION['review_error']);
                        ?>
                    </div>
                <?}?>
                
                <? if (isset($_SESSION['review_success'])){ ?>
                    <div class="auth-success">
                        <?php 
                        echo htmlspecialchars($_SESSION['review_success']);
                        unset($_SESSION['review_success']);
                        ?>
                    </div>
                <?}?>

                <form class="form" method="POST" action="/contacts">
                    <input type="text" name="name" placeholder="Имя" value="<?= htmlspecialchars($_SESSION['user']['username'])?? ''?>">
                    <input type="email" name="email" placeholder="Ваш Email" value="<?= htmlspecialchars($_SESSION['old_email'] ?? ''); ?>" required>
                    <input type="text" name="topic" maxlength="40" placeholder="Тема сообщения" value="<?= htmlspecialchars($_SESSION['old_topic'] ?? ''); ?>">
                    <textarea rows="5" name="text" maxlength="150" placeholder="Сообщение" required><?= htmlspecialchars($_SESSION['old_text'] ?? ''); ?></textarea>
                    <button type="submit" class="btn">Отправить</button>
                </form>

            </div>
        </div>
        <? 
            unset($_SESSION['old_email']);
            unset($_SESSION['old_topic']);
            unset($_SESSION['old_text']);
        ?>
        <!---------------------------------------------------Карта--------------------------------------------------->
        <div class="contacts-bottom">
            <h2>Как нас найти</h2>
            <div class="map-container">
                <iframe 
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A1234567890&amp;source=constructor" 
                    width="100%" 
                    height="400" 
                    frameborder="0">
                </iframe>
            </div>
        </div>

    </div>
</div>

