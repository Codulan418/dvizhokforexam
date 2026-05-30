<?php
session_start();

// прописывайте то подключение, что хотите использовать (mysqli.php, PDO.php)
require_once __DIR__ . '/config/PDO.php';

// служебная часть
require_once 'Router.php';
$listRoute = require_once __DIR__ . '/config/route.php';
$router = new Router();
$router->add($listRoute);
$router->dispatch();