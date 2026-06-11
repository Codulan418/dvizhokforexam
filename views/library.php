<div class="container-library">
    <h1>Учебные материалы по веб-разработке</h1>
    <section class="library-cards">

        <?php foreach ($libraries as $library) { ?>
            <div class="library-card">
                <a href="/topic/<?= $library['id'] ?>">
                    <img src="<?= htmlspecialchars($library['image']) ?>" class="library-img">
                    <h2><?= htmlspecialchars($library['name']) ?></h2>
                    <p><?= htmlspecialchars($library['description']) ?></p>
                </a>
            </div>
        <?php } ?> 

    </section>
</div>