<div class="container-doc">
    <?php foreach ($docs as $doc) { ?>
        <a href="/docs/detail/<?= $doc['id'] ?>" class="card-doc">
            <span><?= htmlspecialchars($doc['number']) ?></span>
            <p><?= htmlspecialchars($doc['name']) ?></p>
            <p>Статус: </p><span class="status-doc"><?= htmlspecialchars($doc['status']) ?></span>
        </a>
    <?php } ?>
</div>