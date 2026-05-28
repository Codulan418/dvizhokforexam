<?php
require_once __DIR__ . '/../core/Controller.php';

class AccountController extends Controller
{
    public function account()
    {
        global $pdo;

        if (isset($_POST['upload'])) {
            if (!empty($_FILES['uploadfile']['name'])) {
                $file = $_FILES['uploadfile'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (!in_array($ext, $allowed)) {
                    $_SESSION['upload_error'] = "Неверный формат";
                    header('Location: /account');
                    exit();
                }

                if ($file['error'] === 0) {
                    $userId = $_SESSION['user_id'];
                    
                    // ИСПРАВЛЕННЫЙ ПУТЬ - используем DOCUMENT_ROOT
                    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/profiles_photo/';
                    
                    // Создаём папку если нет
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    
                    // Получаем старое фото
                    $stmt = $pdo->prepare("SELECT img FROM users WHERE id = ?");
                    $stmt->execute([$userId]);
                    $user = $stmt->fetch();
                    
                    // Удаляем старое фото
                    if ($user && !empty($user['img'])) {
                        $oldFile = $uploadDir . $user['img'];
                        if (file_exists($oldFile)) {
                            unlink($oldFile);
                        }
                    }
                    
                    // Генерируем уникальное имя файла
                    $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $file['name']);
                    $targetPath = $uploadDir . $filename;
                    
                    // Сохраняем файл
                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        // Обновляем БД
                        $stmt = $pdo->prepare("UPDATE users SET img = ? WHERE id = ?");
                        $stmt->execute([$filename, $userId]);
                        
                        // Обновляем сессию
                        $_SESSION['user']['img'] = $filename;
                        
                        // Успех - редирект
                        header('Location: /account?success=1');
                        exit();
                    } else {
                        $_SESSION['upload_error'] = "Ошибка сохранения файла";
                    }
                }
            }
            
            header('Location: /account');
            exit();
        }
        
        // Проверяем, существует ли файл в БД
        $login = $_SESSION['user']['username'];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();
        
        $this->render('account', [
            'title' => 'Личный кабинет',
            'user' => $user
        ]);
    }
}