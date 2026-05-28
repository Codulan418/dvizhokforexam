<?php
require_once __DIR__ . '/../core/Controller.php';


class RecordController extends Controller
{   
    public function record()
    {   
        global $pdo;

        $default_name = '';
        $default_email = '';

        if (isset($_GET['service_id'])) {
            $selected = (int)$_GET['service_id'];
        }

        if (isset($_SESSION['user_id'])) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch();
            
            $default_name = $user['login'];
            $default_email = $user['email'];
        }


        $message = [];
        $submitted = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['service']) || empty($_POST['date']) || empty($_POST['time'])) {
                $message[] = "Заполните все обязательные поля с '*'!";
            }

            $phone = $_POST['phone'];
            if (!preg_match('/^(\+7|8)\d{10}$/', $phone)) {
                $message[] = "Номер телефона должен начинаться на 8 или +7 и содержать 11 цифр!";
            }


            if (empty($message)) {
                $sql = "INSERT INTO record (user_id, name, email, comment, phone, car_brand, car_year, service_id, appointment_date, appointment_time) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([
                    $user_id,
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['comments'] ?? '',
                    $_POST['phone'],
                    $_POST['brand'] ?? null,
                    $_POST['year'] ?? null,
                    $_POST['service'],
                    $_POST['date'],
                    $_POST['time']
                ]);
                
                if (!$result) {
                    echo "Ошибка SQL: " . print_r($pdo->errorInfo(), true);
                } else {
                    $submitted = true;
                }
            }
        }

        $stmt = $pdo->query('SELECT id, name FROM services');
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->render('record', [
            'title' => 'Запись на сервис',
            'services' => $services,
            'message' => $message,
            'submitted' => $submitted,
            'default_name' => $default_name,
            'default_email' => $default_email,
            'selected' => $selected
        ]);
    }
}