<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Нет названия') ?></title>
    
    <!--CSS-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/doc.css">

    <!--JS-->
    <script src="/assets/js/script.js" defer></script>
    <script src="/assets/js/doc.js" defer></script>

    <?if (!empty($js)){?>
    <script src="/assets/js/<?= htmlspecialchars($js) ?>" defer></script>
    <?}?>
    
</head>
<body>
    
    <!---------------------------------------------------Шапка--------------------------------------------------->
    <header>
        <nav>
            <div class="logo">
                <a href="/">
                    <img src="/assets/img/logo.png" alt="" class="logo-img">
                </a>
            </div>

            <!------------------------Меню с сыллками------------------------>
            <?$current_uri = rtrim($_SERVER['REQUEST_URI'],'/')?>

            <ul class="menu">
                <li>
                    <a href="/about" class="<?= ($current_uri == '/about') ? 'active' : '' ?>">О сервисе</a>
                </li>
                <li>
                    <a href="/services" class="<?= ($current_uri == '/services') ? 'active' : '' ?>">Услуги</a>
                </li>
                <li>
                    <a href="/record" class="<?= ($current_uri == '/record') ? 'active' : '' ?>">Запись на обслуживание</a>
                </li>
                <li>
                    <a href="/reviews" class="<?= ($current_uri == '/reviews') ? 'active' : '' ?>">Отзывы</a>
                </li>
                <li>
                    <a href="/contacts" class="<?= ($current_uri == '/contacts') ? 'active' : '' ?>">Контакты</a>
                </li>
                <?if (isset($_SESSION['user']['role_id']) && ($_SESSION['user']['role_id'] == 2 || $_SESSION['user']['role_id'] == 3)){?>
                <li>
                    <a href="/admin" class="<?= ($current_uri == '/admin') ? 'active' : '' ?>">
                        Админ-панель
                    </a>
                </li>
                <?}?>
            </ul>

            <!------------------------Кнопки регестрации и смена на личный кабинет------------------------>
            <div class="auth-group">
                <?php if (!isset($_SESSION['user_id'])){?>
                    <div class="auth-guest">
                        <a href="/login" class="btn"><span>Вход</span></a>
                        <a href="/register" class="btn"><span>Регистрация</span></a>
                    </div>
                <?}else{?>
                    <div class="auth-user">
                        <details class="user-dropdown">
                            <summary class="btn user-profile">
                                <span><? echo $_SESSION['user']['username'] ?></span>
                                <div class="avatar"></div>
                            </summary>
                            <div class="dropdown-content">
                                <a href="/account">Личный кабинет</a>
                                <a href="/logout">Выход</a>
                            </div>
                        </details>
                    </div>
                <?}?>
            </div>

        </nav>
    </header>

    
    <!---------------------------------------------------Основа--------------------------------------------------->
    <main class="auth-container">
            <?= $content ?>
    </main>
    <!---------------------------------------------Прилеплиный телефон--------------------------------------------->
    <a href="tel:+79000000000" class="fixed-call">
        <span><img src="/assets/img/phone.png" alt="" class="phone-img"></span>
    </a>

    <!---------------------------------------------------Подвал--------------------------------------------------->
    <footer>
        <div class="footer-container">
            
            <div class="footer-section footer-logo">
                <a href="/">
                    <img src="/assets/img/logo.png" alt="" class="footer-logo-img">
                </a>
                <p>Профессиональное обслуживание вашего автомобиля с гарантией качества</p>
            </div>

            
            <div class="footer-section">
                <h4>Навигация</h4>
                <ul class="footer-nav">
                    <li><a href="/about">О сервисе</a></li>
                    <li><a href="/services">Услуги</a></li>
                    <li><a href="/booking">Запись на обслуживание</a></li>
                    <li><a href="/reviews">Отзывы</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </div>

            
            <div class="footer-section">
                <h4>Мы в сети</h4>
                <div class="social-links">
                    <a href="#"><img src="/assets/img/vk.png" alt=""></a>
                    <a href="#"><img src="/assets/img/telegram.png" alt=""></a>
                    <a href="#"><img src="/assets/img/whatsapp.png" alt=""></a>
                </div>
            </div>

            
            <div class="footer-section">
                <h4>Информация</h4>
                <p>ИНН: 1234567890</p>
                <p>ОГРН: 1023456789012</p>
                <a href="#">Политика конфиденциальности</a>
            </div>
            <div class="footer-section">
                <h4>Контакты</h4>
                <p><a href="tel:+79000000000">+7 (900) 000-00-00</a></p>
                <p><a href="mailto:info@autoservice.ru">info@autoservice.ru</a></p>
                <p>г. Ижевск, ул. Какая-то, д. 1</p>
            </div>
        </div>

        
        <div class="footer-bottom">
            <div class="dev-info">
                <span>Разработали:</span>
                <ul>
                    <li>Кириенков Максим</li>
                    <li>Фатахова Сюмбель</li>
                    <li>Андреева Алина</li>
                </ul>
            </div>
            <p>&copy; 2026 Автосервис</p>
        </div>
    </footer>

</body>
</html>