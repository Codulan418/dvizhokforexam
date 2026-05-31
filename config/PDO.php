<?
    $host = 'localhost';
    $dbname = '';
    $username = 'mysql';
    $password = 'mysql';

try {
    $connect = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}
    
