<?
require_once __DIR__ . '/../core/Controller.php';

class AboutController extends Controller
{
    public function about()
    {
        global $connect;

        // mysqli
        $result = mysqli_query($connect, "SELECT * FROM about");
        $service = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // PDO
        $stmt = $connect->prepare("SELECT * FROM staff");
        $stmt->execute();
        $workes = $stmt->fetchAll();

        $stmt = $connect->prepare("SELECT * FROM advantages");
        $stmt->execute();
        $advantages = $stmt->fetchAll();

        $this->render('about', [
            // название страницы отображаемое в браузере
            'title' => 'о нас',
            // передаём данные выборки из бд
            'service'=>$service,
            'workes'=>$workes,
            'advantages'=>$advantages
        ]);
    }
}