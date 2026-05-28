<?php
require_once __DIR__ . '/../core/Controller.php';

class AdminUsersController extends Controller
{
    //Проверка нужной роли
    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
            header('Location: /');
            exit;
        }
    }
    

    //Таблица пользователей
    public function users()
    {
        $this->checkAdmin();
        global $pdo;
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        $totalStmt = $pdo->query("SELECT COUNT(*) FROM users");
        $total = $totalStmt->fetchColumn();
        $totalPages = ceil($total / $limit);
        
        $stmt = $pdo->prepare("SELECT id, login, email, role_id, created_at FROM users ORDER BY id DESC LIMIT $limit OFFSET $offset");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->render('admin/users', ['title' => 'Управление пользователями', 'users' => $users, 'page' => $page, 'totalPages' => $totalPages]);
    }
    
    //Открытие формы редактирования пользователя 
    public function edit($id)
    {
        $this->checkAdmin();
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT id, login, email, role_id FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->render('admin/user_edit', ['title' => 'Редактирование пользователя', 'user' => $user]);
    }
    
    //Обновление информации после редактирования
    public function update($id)
    {
        $this->checkAdmin();
        global $pdo;
        
        $login = trim($_POST['login'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $role_id = (int)($_POST['role_id'] ?? 1);
        $password = $_POST['password'] ?? '';
        
        if (empty($login) || empty($email)) {
            $_SESSION['error'] = 'Заполните все поля';
            header('Location: /admin/users/edit/' . $id);
            exit;
        }
        
        if (!empty($password)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET login = ?, email = ?, role_id = ?, password_hash = ? WHERE id = ?");
            $stmt->execute([$login, $email, $role_id, $hash, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET login = ?, email = ?, role_id = ? WHERE id = ?");
            $stmt->execute([$login, $email, $role_id, $id]);
        }
        
        $_SESSION['success'] = 'Пользователь обновлён';
        header('Location: /admin/users');
        exit;
    }
    
    //Удаление пользователя
    public function delete($id)
    {
        $this->checkAdmin();
        global $pdo;
        
        if ($id == $_SESSION['user']['id']) {
            $_SESSION['error'] = 'Нельзя удалить свой аккаунт';
            header('Location: /admin/users');
            exit;
        }
        
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        
        $_SESSION['success'] = 'Пользователь удалён';
        header('Location: /admin/users');
        exit;
    }
}