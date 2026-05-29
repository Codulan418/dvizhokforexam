<div class="container-detail">
    <!-- Левое меню (вкладки) -->
    <div class="right-column">
        <h4>ДОКУМЕНТАЦИЯ</h4>
        <?php foreach ($details as $index => $tab): ?>
            <button class="card-detail-doc <?= $index === 0 ? 'active' : '' ?>" 
                    type="button" data-tab="<?= htmlspecialchars($tab['tab_key']) ?>">
                <span><?= htmlspecialchars($tab['tab_icon']) ?></span>
                <p class="big"><?= htmlspecialchars($tab['tab_title']) ?></p>
                <p class="small"><?= htmlspecialchars($tab['tab_subtitle']) ?></p>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Контент вкладок -->
    <div class="left-column">
        <?php foreach ($details as $index => $tab): ?>
            <div id="<?= htmlspecialchars($tab['tab_key']) ?>" class="tab-content">
                <!-- Теги технологий -->
                <div class="tech-tags">
                    <?php $tags = explode(',', $tab['tags']);
                    foreach ($tags as $tag): ?>
                        <span><?= htmlspecialchars(trim($tag)) ?></span>
                    <?php endforeach; ?>
                </div>

                <!-- Блок контента -->
                <div class="web-app">
                        <p class="orange"><?= htmlspecialchars($tab['block_label']) ?></p>
                        <h4><?= htmlspecialchars($tab['block_title']) ?></h4>
                        <p><?= htmlspecialchars($tab['block_content']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
