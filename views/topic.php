<div class="container-topic">
    <?php if (!empty($topics)) { ?>
        <h2><a href="/library">Библиотека</a> ></h2> <h1><?= htmlspecialchars($topics[0]['title']) ?></h1>

        <div class="topic-cards">
            <?php foreach ($topics as $topic) { ?>
                <!-- Цикл повторяет только саму карточку -->
                <div class="topic-card">
                    <a href="/page/<?= $topic['id'] ?>">
                        <img src="/<?= htmlspecialchars($topic['image']) ?>" alt="book">
                        <div class="card-info">
                            <p><span class="gray">Название:</span> <span class="white"><?= htmlspecialchars($topic['name']) ?></span></p>
                            <p><span class="gray">Автор:</span> <span class="white"><?= htmlspecialchars($topic['author']) ?></span></p>
                            <p><span class="gray">Год издания:</span> <span class="white"><?= htmlspecialchars($topic['year']) ?></span></p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        
    <?php } ?>
</div>