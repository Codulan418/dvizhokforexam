<div class="container-page">
    <?php if (!empty($pages)) { ?>
        <h2><a href="/topic/<?= $topic['library_id'] ?>"><?= htmlspecialchars($topic['title']) ?></a> ></h2> <h1><?= htmlspecialchars($pages[0]['title']) ?></h1>
        <div class="lessons-grid">
            <?php foreach ($pages as $p) { ?>
                <a href="/lesson/<?= $p['id'] ?>" class="lesson-card">
                    <span class="lesson-number"><?= $p['num'] ?></span>
                    <span class="lesson-name"><?= htmlspecialchars($p['lesson_name']) ?></span>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
</div>