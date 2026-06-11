<?
require_once __DIR__ . '/../core/Controller.php';

class AboutController extends Controller
{
    public function about()
    {
        global $connect;

        $stmt = $connect->prepare("SELECT * FROM about");
        $stmt->execute();
        $service = $stmt->fetchAll();

        $this->render('about', [
            'title' => 'о нас',
        ]);
    }
}