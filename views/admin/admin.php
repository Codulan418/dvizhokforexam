<div class="admin_buttons">
    <?foreach ($buttons as $button){?>
        <a class="admin_button" href="<?= htmlspecialchars($button['url']) ?>">
            <?= htmlspecialchars($button['title']) ?>
        </a>
    <?}?>
</div>