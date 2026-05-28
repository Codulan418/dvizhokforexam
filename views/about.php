
<div class="onasblock">
    <?php foreach($service as $nas) { ?>
    <div class="onas">
        <div class="onas-text">
            <p><?= htmlspecialchars($nas['text1']) ?></p>
            <p><?= htmlspecialchars($nas['text2']) ?></p>
            <p><?= htmlspecialchars($nas['text3']) ?></p>
        </div>

        <img src="/assets/img/<?= $nas['img'] ?>" alt="">

    </div>
    <?php } ?>
</div>

<div class="staffblock">
    <h2>Персонал</h2>
    <div class="staff">
        <?php foreach($workes as $human) { ?>
        <div class="person">
            <img src="/assets/img/<?= $human['img'] ?>">
            <h4><?= htmlspecialchars($human['name']) ?></h4>
            <p><?= htmlspecialchars($human['speciality']) ?></p>
            <p><?= htmlspecialchars($human['experience']) ?></p>
        </div>
        <?php } ?>
    </div>
</div>

<div class="advantagesblock">
    <h2>Преимущества</h2>
    <div class="advantages">
        <?php foreach($advantages as $advantage) { ?>
        <div class="adv">
            <img src="/assets/img/<?= $advantage['img'] ?>">
            <div class="adv-text">
                <h4><?= htmlspecialchars($advantage['name']) ?></h4>
                <p><?= htmlspecialchars($advantage['text']) ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

