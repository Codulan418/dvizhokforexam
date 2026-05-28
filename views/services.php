<div class='two-columns width-100'>
    <div class="sidebar">
        <form method="GET">
            <input type="text" placeholder='Поиск' name="search" class='search-decoration' value="<?echo htmlspecialchars(isset($search) ? $search : '')?>">
            <input type="submit" value='&#128269;'>
        </form>
        <form method="GET">
            <p class='text-size-small weight'>Цена:</p>
            <input type="text" placeholder='от' name='price_min' class="pagination-choice" value="<?echo htmlspecialchars(isset($price_min) ? $price_min : '')?>">
            <input type="text" placeholder='до' name='price_max' class="pagination-choice" value="<?echo htmlspecialchars(isset($price_max) ? $price_max : '')?>">
            <div class='design-pagination'>
                <p class='text-size-small weight'>Категории:</p>
                <div>
                    <input type="checkbox" name="category[]" value="Профилактика" id='prevention' <?echo (in_array('Профилактика', (array)($category ?? []))) ? 'checked' : '' ?>>
                    <label for="prevention" class='backlight border-r'>Профилактика</label>
                </div>
                <div>
                    <input type="checkbox" name="category[]" value="Ремонт" id='repair' <?= (in_array('Ремонт', (array)($category ?? []))) ? 'checked' : '' ?>>
                    <label for="repair" class='backlight border-r'>Ремонт</label>
                </div>
                <div>
                    <input type="checkbox" name="category[]" value="Доп.услуги" id='additional' <?= (in_array('Доп.услуги', (array)($category ?? []))) ? 'checked' : '' ?>>
                    <label for="additional" class='backlight border-r'>Доп.услуги</label>
                </div>
            </div>
            <input type="submit" class='btn' value="Применить">
        </form>
    </div>

    <div class="content">
        <? if (!empty($services)) { ?>
            <? foreach ($services as $row) { ?>
                <div class="card">
                    <img src="/assets/img/<?= htmlspecialchars($row['image']) ?>" alt="" class='img-card'>
                    <div>
                        <p class='text-align'><?= htmlspecialchars($row['name']) ?></p>
                        <p class='text-align'>Цена: <?= htmlspecialchars($row['price']) ?></p>
                    </div>
                    <a href="/servicesdetail/<?= $row['id'] ?>" class='btn'>Подробнее</a>
                </div>
            <? } ?>
        <?}else {?>
            <p>Услуг не найдено</p>
        <? } ?>
    </div>
</div>