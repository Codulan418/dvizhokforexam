<?
require_once __DIR__ . '/../core/Controller.php';

class ServicesdetailController extends Controller
{   
    public function servicesdetail($id)
    {   
        global $pdo;
        
        $id = (int)$id;
        $stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute([$id]);
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->render('servicesdetail', ['title' => $service['name'], 'service' => $service]);
    }
}