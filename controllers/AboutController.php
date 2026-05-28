<?
require_once __DIR__ . '/../core/Controller.php';

class AboutController extends Controller
{
    public function about()
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM about");
        $stmt->execute();
        $service = $stmt->fetchAll();

        $stmt = $pdo->prepare("SELECT * FROM staff");
        $stmt->execute();
        $workes = $stmt->fetchAll();

        $stmt = $pdo->prepare("SELECT * FROM advantages");
        $stmt->execute();
        $advantages = $stmt->fetchAll();

        $this->render('about', ['title' => 'о нас','service'=>$service,'workes'=>$workes,'advantages'=>$advantages]);
    }
}