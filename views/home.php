    <div class="slider">
        <div class="slider-track">
        
        <?php foreach ($slider as $slides){ ?>
            <div class="slide">
                <img src="./assets/img/<?echo $slides['image'];?>" alt="" class='banner'>
                <div class="slide-content">
                    <p class='Large'><?echo $slides['title'];?></p>
                    <p class='medium'><?echo $slides['description'];?></p>
                    <button class='btn' onclick="'location.href='record.php'">Записаться</button>
                </div>
            </div>
            <?}?>
        </div>
        <button class="prev switch">˂</button>
        <button class="next switch">˃</button>
    </div>

    <?php foreach ($about as $item){ ?>
    <div class="allAdv border-top">
        <img src="./assets/img/<?echo $item['img'];?>" alt="" class='about-img'>
        <div class="wrapper">
            <div class="info-about">
                <p class='text-center'>Auto Motive</p>
                <p><?echo $item['text1'];?></p>
                <p><?echo $item['text2'];?></p>            
            </div>
            <div class="allAdv">
                <div class="block-adv">
                    <h3>12+</h3>
                    <p>Лет на рынке</p>
                </div>
                <div class="block-adv">
                    <h3>10 000+</h3>
                    <p>Довольных клиентов</p>
                </div>
                <div class="block-adv">
                    <h3>1</h3>
                    <p>День ремонт</p>
                </div>
            </div>
        </div>
    </div>
    <?}?>

    <p class='text-header weight'>&#128736;Популярное&#128736;</p>
    <div class="services-grid ">
        <?php foreach ($popular as $items){ ?>
        <div class="card-popular">
            <img src="./assets/img/<?echo $items['image'];?>" alt="" class='img-card'>
            <h3><?echo $items['name'];?></h3>
            <p><?echo $items['description'];?></p>
            <a href="/servicesdetail/<?php echo $items["id"]?>" class="service-link">Подробнее</a>
        </div>
        <?}?>
    </div>

    <p class='text-header weight'>&#9993;Отзывы&#9993;</p>
    <a href="/reviews" class='left-auto'>Все отзывы &#8594;</a>
    <div class="services-grid ">
    <?foreach ($review as $row){?>
        <div class="review-item">
            <div class="review-header">
                <div class="review-name-date">
                    <span class="review-name"><?= htmlspecialchars($row['login']) ?></span>
                    <span class="review-date"><?= date('d.m.Y', strtotime($row['created'])) ?></span>
                </div>
                <div class="review-stars">
                    <?for ($i = 1; $i <= 5; $i++){?>
                        <span class="<?= $i <= $row['rating'] ? 'star-full' : 'star-empty' ?>">★</span>
                    <?}?>
                </div>
            </div>
            <div class="review-text">
                <?= nl2br(htmlspecialchars($row['text'])) ?>
            </div>
        </div>
    <?}?>
    </div>


    <h3 class='text-header'>Запишитесь на диагностику</h3>
    <div class="text-center">
        <p class='text-center text-size-small'>Не знаете, что стучит под капотом?</p>
        <p class='text-center text-size-small'>Нужна профессиональная диагностика или плановое ТО?</p>
    </div>
    <div class="block-sign">
        <?if (!$submitted){?>
            <form action="/" method='POST' class='booking-form-new'>
                <p class='text-align'><?php if (!empty($message)) { echo $message[0]; } ?></p>
                <div class="two-columns">
                    <div class="forms-blocks">
                        <p>*ФИО</p>
                        <input type="text" class='input-decoration' name="name" value="<?= htmlspecialchars($default_name) ?>">
                        <p>*Телефон</p>
                        <input type="tel" class='input-decoration' name="phone">
                        <p>*Email</p>
                        <input type="email" class='input-decoration'  name="email" value="<?= htmlspecialchars($default_email) ?>">
                        <p>Марка авто</p>
                        <input type="text" class='input-decoration'  name="brand">
                        <p>Год выпуска</p>
                        <input type="text" class='input-decoration'  name="year">
                    </div>
                    <div class="forms-blocks">
                        <p>*Услуги</p>
                        <select name="service" class='input-decoration'>
                        <?php foreach ($services as $service){ ?>
                            <option value="<?echo $service['id'];?>"> <?echo $service['name'];?></option>
                            <?}?>
                        </select>
                        <p>*Желамая дата</p>
                        <input type="date" class='input-decoration'  name="date" min="<?= date('Y-m-d') ?>">
                        <p>*Время</p>
                        <input type="time" class='input-decoration'  name="time" min="09:00" max="18:00">
                        <p>Комментарий</p>
                        <textarea name="comments" id="" class='textarea-decoration'></textarea>
                        <input type="submit" class='btn'>
                    </div>
                </div>
            </form>
        <?}else {echo 'Заявка отправлена, не забудьте подтвердить её на Вашей почте';}?>
    </div>

        <div class="contacts-info">
            
            <h3 class='text-header'>Контактная информация</h3>
            <div class="contacts-top">
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
                <div class="map-container">
                    <iframe
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3A1234567890&amp;source=constructor"
                        width="800"
                        height="300"
                        frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
    