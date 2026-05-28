<?
require_once __DIR__ . '/../core/Controller.php';

class ReviewsController extends Controller
{
    public function reviews()
    {
        global $pdo;
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 4;
        $offset = ($page - 1) * $limit;
        
        $totalStmt = $pdo->query("SELECT COUNT(*) FROM reviews WHERE is_approved = 1");
        $total = $totalStmt->fetchColumn();
        $totalPages = ceil($total / $limit);
        
        $sql = "SELECT * FROM reviews WHERE is_approved = 1 ORDER BY created DESC LIMIT $limit OFFSET $offset";
        $result = $pdo->query($sql);
        $reviews = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $this->render('reviews', ['title' => 'Отзывы', 'reviews' => $reviews, 'page' => $page, 'totalPages' => $totalPages]);
    }
    
    public function add()
    {
        global $pdo;
        
        $rating = $_POST['rating']?? 0;
        $reviews_textarea = trim($_POST['reviews_textarea']?? '');
        $login = trim($_POST['name']?? '');

        function examination($rating, $reviews_textarea, $login){
            if(empty($login)){
                return "Напишите имя";
            }
            else if($rating == 0){
                return "Поставьте звезды";
            }
            else if(strlen($reviews_textarea) < 10){
                return "Хотя бы 10 символов";
            }
            else{
                return null;
            }
        }

        $error = examination($rating, $reviews_textarea, $login);

        if ($error !== null) {
            $_SESSION['review_error'] = $error;
            $_SESSION['old_rating'] = $rating;
            $_SESSION['old_text'] = $reviews_textarea;
            header('Location: /reviews');
            exit;
        }
        else {
            $sql = "INSERT INTO reviews (login, text, rating, is_approved, created) VALUES (:login, :text, :rating, FALSE, NOW())";
            $prepare = $pdo->prepare($sql);
            $prepare->execute([
                'login' => $login,
                'text' => $reviews_textarea,
                'rating' => $rating
            ]);
            
            $_SESSION['review_success'] = "Спасибо за отзыв!";
            header('Location: /reviews');
            exit;
        }
    }
}