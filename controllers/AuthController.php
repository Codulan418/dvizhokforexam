<?php
require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller
{
    /*----------------------Регистрация------------------------*/
    
    public function showRegisterForm()
    {
        $this->render('register', ['title' => 'Регистрация']);
    }
    
    public function register()
    {
        global $pdo;
        
        $login = trim($_POST['login'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $repeat_password = $_POST['repeat_password'] ?? '';
        
        $_SESSION['old_login'] = $login;
        $_SESSION['old_email'] = $email;
        
        // Проверка пустых полей
        if (empty($login)) {
            $_SESSION['error'] = 'Заполните поле "Логин"';
            header('Location: /register');
            exit;
        }
        if (empty($email)) {
            $_SESSION['error'] = 'Заполните поле "Email"';
            header('Location: /register');
            exit;
        }
        if (empty($password)) {
            $_SESSION['error'] = 'Заполните поле "Пароль"';
            header('Location: /register');
            exit;
        }
        if (empty($repeat_password)) {
            $_SESSION['error'] = 'Заполните поле "Повторите пароль"';
            header('Location: /register');
            exit;
        }
        
        // Проверка уникальности логина, email и правильности формата email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Неверный формат email';
            header('Location: /register');
            exit;
        }
        
        $stmt = $pdo->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
        $stmt->execute([$login, $email]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = 'Пользователь с таким логином или email уже существует';
            header('Location: /register');
            exit;
        }
        
        // Проверка пароля (совпадение, длина, сложность)
        if ($password !== $repeat_password) {
            $_SESSION['error'] = 'Пароли не совпадают';
            header('Location: /register');
            exit;
        }
        
        if (strlen($password) < 6) {
            $_SESSION['error'] = 'Пароль должен быть минимум 6 символов';
            header('Location: /register');
            exit;
        }
        
        if (strlen($password) > 50) {
            $_SESSION['error'] = 'Пароль не должен быть длиннее 50 символов';
            header('Location: /register');
            exit;
        }
        
        if (!preg_match('/[0-9]/', $password)) {
            $_SESSION['error'] = 'Пароль должен содержать хотя бы одну цифру';
            header('Location: /register');
            exit;
        }
        
        if (!preg_match('/[A-Z]/', $password)) {
            $_SESSION['error'] = 'Пароль должен содержать хотя бы одну заглавную букву';
            header('Location: /register');
            exit;
        }
        
        if (!preg_match('/[a-z]/', $password)) {
            $_SESSION['error'] = 'Пароль должен содержать хотя бы одну строчную букву';
            header('Location: /register');
            exit;
        }
        
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $_SESSION['error'] = 'Пароль должен содержать хотя бы один спецсимвол';
            header('Location: /register');
            exit;
        }
        
        // Сохранение пользователя в БД
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (login, email, password_hash, role_id, created_at) VALUES (?, ?, ?, 1, NOW())");
        
        if (!$stmt->execute([$login, $email, $hash])) {
            $_SESSION['error'] = 'Ошибка при сохранении пользователя';
            header('Location: /register');
            exit;
        }
        
        $userId = $pdo->lastInsertId();
        
        // Создание сессии пользователя
        $_SESSION['user_id'] = $userId;
        $_SESSION['user'] = [
            'id' => $userId,
            'username' => $login
        ];
        session_regenerate_id(true);
        
        // Алгоритм работы
        unset($_SESSION['old_login']);
        unset($_SESSION['old_email']);
        
        header('Location: /');
        exit;
    }
    



    
    /*----------------------Авторизация------------------------*/
    
    public function showLoginForm()
    {
        $this->render('login', ['title' => 'Авторизация']);
    }
    
    public function login()
    {
        global $pdo;
        
        $login = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';
        
        $_SESSION['old_login'] = $login;
        
        // Проверка пустых полей
        if (empty($login)) {
            $_SESSION['error'] = 'Заполните поле "Логин или Email"';
            header('Location: /login');
            exit;
        }
        
        if (empty($password)) {
            $_SESSION['error'] = 'Заполните поле "Пароль"';
            header('Location: /login');
            exit;
        }
        
        // Поиск пользователя в БД
        $stmt = $pdo->prepare("SELECT id, login, email, password_hash, role_id FROM users WHERE login = ? OR email = ?");
        $stmt->execute([$login, $login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            $_SESSION['error'] = 'Пользователь с таким логином или email не найден';
            header('Location: /login');
            exit;
        }
        
        // Проверка пароля
        if (!password_verify($password, $user['password_hash'])) {
            $_SESSION['error'] = 'Неверный пароль';
            header('Location: /login');
            exit;
        }
        
        // Создание сессии пользователя
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['login'],
            'role_id' => $user['role_id']
        ];
        session_regenerate_id(true);
        
        // Алгоритм работы
        unset($_SESSION['old_login']);
        
        header('Location: /');
        exit;
    }
    




    /*----------------------Выход------------------------*/
    
    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        
        header('Location: /');
        exit;
    }
}