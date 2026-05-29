<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Нет названия') ?></title>
    
    <!--CSS-->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!--JS общий для всех страниц-->
    <script src="/assets/js/script.js" defer></script>

    <!-- js -->
    <?if (!empty($js)){
        $jsArr = explode(", ", $js);
        foreach($jsArr as $jsItem){?>
        <script src="/assets/js/<?= htmlspecialchars($jsItem) ?>" defer></script>
    <?}
    }?>
    
</head>
<body>
    
    <!---------------------------------------------------Шапка--------------------------------------------------->
    <header>
    <!-- прописываем здесь хедер -->
        <div class="mini-header">
            <a href="/">Главная</a>
            <a href="/about">О нас</a>
        </div>
    </header>

    
    <!---------------------------------------------------Основа--------------------------------------------------->
    <main>
        <!-- сюда подключится представление изз папки view -->
        <?= $content ?>
    </main>


    <!---------------------------------------------------Подвал--------------------------------------------------->
    <footer>
    <!-- тут разместить подвал -->
    </footer>
</body>
</html>
