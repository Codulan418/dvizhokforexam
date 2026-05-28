<?
require_once __DIR__ . '/../core/Controller.php';
class ContactsController extends Controller
{
    public function contacts()
    {
        $this->render('contacts',['title'=>'Контакты']);
    }

    public function add()
    {
        global $pdo;

        $login = $_SESSION['user']["username"]??'Гость';
        $email = $_POST['email']??'0';
        $topic = $_POST['topic'];
        $text = $_POST['text'];

        //Проверка формы
        function examination($login, $email, $topic, $text) {
            if ($login === 'Гость') {
                return "register";
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "Укажите корректный email";
            }
            if (mb_strlen($topic) < 10) {
                return "Тема должна быть не менее 10 символов";
            }
            if (mb_strlen($text) < 10) {
                return "Сообщение должно быть не менее 10 символов";
            }
            return null;
        }

        $error = examination($login,$email,$topic,$text);

        if ($error === "register") {
            $_SESSION['review_error'] = "Авторизуйтесь, чтобы оставить отзыв";
            header('Location: /register');
            exit;
        }
        if ($error !== null) {
            $_SESSION['review_error'] = $error;

            $_SESSION['old_email'] = $email;
            $_SESSION['old_topic'] = $topic;
            $_SESSION['old_text']  = $text;
            header('Location: /contacts');
            exit;
        }
        else {
            $sql = "INSERT INTO messages (login, email, message, created) VALUES (:login, :email, :message, NOW())";
            $prepare = $pdo->prepare($sql);
            $prepare->execute([
                        'login'   => $login,
                        'email'   => $email,
                        'message' => $text 
                    ]);
            
            $_SESSION['review_success'] = "Спасибо за ваше сообщение, мы ответим как можно быстрее";

            header('Location: /contacts');
            exit;
        }

    }
}