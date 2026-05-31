<?
require_once __DIR__ . '/../core/Controller.php';

// шаблон класса для логики страницы
class HomeController extends Controller
{
    public function index()
    {
        // ссылка на объект соеденения с бд, нужен для работы внутри класса
        global $connect;

        // $stmt3 = $connect->query('SELECT * FROM about');
        // $about = $stmt3->fetchAll(PDO::FETCH_ASSOC);


        $this->render('home', [
            'title' => 'Главная',
            // для добавление js-файла ОБЯЗАТЕЛЬНО пишите через ', ' (запятую с пробелом)
            'js' => 'slider.js, accordion.js',
            // 'about' => $about,
        ]);
    }
}