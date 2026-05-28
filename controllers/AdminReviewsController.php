<?
require_once __DIR__ . '/../core/Controller.php';

class AdminReviewsController extends Controller
{
   private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || ($_SESSION['user']['role_id'] != 2 && $_SESSION['user']['role_id'] != 3)) {
            header('Location: /');
            exit;
        }
    }
    

    public function adminReviews()
    {
        $this->checkAdmin();
        
        global $pdo;
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        $totalStmt = $pdo->query("SELECT COUNT(*) FROM reviews WHERE is_approved IN (0, 1)");
        $total = $totalStmt->fetchColumn();
        $totalPages = ceil($total / $limit);
        
        $stmt = $pdo->prepare("SELECT * FROM reviews WHERE is_approved IN (0, 1) ORDER BY created DESC LIMIT $limit OFFSET $offset");
        $stmt->execute();
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->render('admin/reviews_edit', [
            'title' => 'Управление отзывами',
            'reviews' => $reviews,
            'page' => $page,
            'totalPages' => $totalPages
        ]);
    }
    
    public function approve($id)
    {
        $this->checkAdmin();
        
        global $pdo;
        
        $stmt = $pdo->prepare("UPDATE reviews SET is_approved = 1 WHERE id = ? AND is_approved = 0");
        $stmt->execute([$id]);
        
        $_SESSION['success'] = 'Отзыв одобрен';
        header('Location: /admin/reviews');
        exit;
    }
    
    public function delete($id)
    {
        $this->checkAdmin();
        
        global $pdo;
        
        $stmt = $pdo->prepare("UPDATE reviews SET is_approved = 3 WHERE id = ?");
        $stmt->execute([$id]);
        
        $_SESSION['success'] = 'Отзыв удалён';
        header('Location: /admin/reviews');
        exit;
    }
}