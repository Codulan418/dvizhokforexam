<div class='center-form'>
<?if (!$submitted){?>
    <form action="" method='POST' class='signUp'>
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
                    <option value="<?echo $service['id'];?>" <?= (isset($selected) && $selected == $service['id']) ? 'selected' : '' ?>> <?echo $service['name'];?> </option>
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