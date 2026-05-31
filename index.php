<?php
session_start();

// раскоммениторуйте то подключение, что хотите использовать (mysqli.php или PDO.php из папки config)
// require_once __DIR__ . '/config/PDO.php';
// require_once __DIR__ . '/config/mysqli.php';

// служебная часть
require_once 'Router.php';
$listRoute = require_once __DIR__ . '/config/route.php';
$router = new Router();
$router->add($listRoute);
$router->dispatch();