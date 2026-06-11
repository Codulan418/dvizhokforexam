<div class="container-lesson">
    <?php if ($lesson) { ?>
        <h2><a href="/page/<?= $lesson['page_id'] ?>"> <?= htmlspecialchars($lesson['title']) ?></a> ></h2> <h1>Содержание главы</h1>
        
        <div class="lesson-nav">
            <a href="#" class="nav-btn">&lt;</a>
            <span class="lesson-title"><?= htmlspecialchars($lesson['name']) ?></span>
            <a href="#" class="nav-btn">&gt;</a>
        </div>

        <div class="lesson-content">
            <?= $lesson['content'] ?>
        </div>
        
    <?php } ?>
</div>