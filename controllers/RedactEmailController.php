<?php
require_once __DIR__ . '/../core/Controller.php';


class RedactEmailController extends Controller
{   
    public function redact()
    {   
        global $pdo;

        $arrError = [];
        $success = '';

        if (!empty($_POST)) {

            if ($_POST['new_email'] == '') {
                $arrError[] = 'Введите новую почту';
            }

            if (empty($arrError)) {

                $id = $_SESSION['user_id'];
                $newEmail = $_POST['new_email'];

                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$newEmail]);
                $existingUser = $stmt->fetch();

                if ($existingUser) {
                    $arrError[] = 'Такая почта уже существует';
                } else { 

                    $stmt = $pdo->prepare("UPDATE users SET email = ? WHERE id = ?");

                    $result = $stmt->execute([
                        $newEmail,
                        $id
                    ]);

                    if ($result) {
                        $success = 'Почта успешно изменена';
                    } else {
                        $arrError[] = 'Ошибка при изменении почты';
                    }
                }
            }
        }
        $this->render('redactEmail', [
            'title' => 'Запись на сервис',
        ]);
    }
}