<?
require_once __DIR__ . '/../core/Controller.php';

class HomeController extends Controller
{
    public function index()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT id, name FROM services');
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $pdo->query('SELECT * FROM slider');
        $slider = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $stmt3 = $pdo->query('SELECT * FROM about');
        $about = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        $stmt4 = $pdo->query('SELECT * FROM services WHERE popular = 1');
        $popular = $stmt4->fetchAll(PDO::FETCH_ASSOC);

        $stmt5 = $pdo->query('SELECT * FROM reviews');
        $review = $stmt5->fetchAll(PDO::FETCH_ASSOC);

        $this->render('home', [
            'title' => 'Главная',
            'services' => $services,
            'js' => 'slider.js',
            'slider' => $slider,
            'about' => $about,
            'popular' => $popular,
            'review' => $review
        ]);
    }
}