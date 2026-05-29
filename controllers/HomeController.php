<?
require_once __DIR__ . '/../core/Controller.php';

class HomeController extends Controller
{
    public function index()
    {
        global $connect;
        $stmt3 = $connect->query('SELECT * FROM about');
        $about = $stmt3->fetchAll(PDO::FETCH_ASSOC);


        $this->render('home', [
            'title' => 'Главная',
            // для добавление js-файла ОБЯЗАТЕЛЬНО пишите ', ' (запятую с пробелом)
            'js' => 'slider.js, script.js',
            'about' => $about,
        ]);
    }
}