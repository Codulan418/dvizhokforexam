<?
require_once __DIR__ . '/../core/Controller.php';

class ServicesController extends Controller
{   
    public function services()
    {   
        global $pdo;
        
        // Фильтрация
        $category = isset($_GET['category']) ? $_GET['category'] : [];
        $price_min = isset($_GET['price_min']) ? $_GET['price_min'] : '';
        $price_max = isset($_GET['price_max']) ? $_GET['price_max'] : '';
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        
        $sql = "SELECT * FROM services WHERE 1=1";
        $params = [];
        
        if (!empty($category)) {
            $placeholders = [];
            foreach($category as $i => $c) {
                $placeholder = ":category_$i";
                $placeholders[] = $placeholder;
                $params[$placeholder] = $c;
            }
            $sql .= " AND type IN (" . implode(', ', $placeholders) . ")";
        }
        
        if (!empty($price_min) && !empty($price_max)) {
            $sql .= " AND price BETWEEN :min_price AND :max_price";
            $params[':min_price'] = $price_min;
            $params[':max_price'] = $price_max;
        }
        
        if (!empty($search)) {
            $sql .= " AND name LIKE :search";
            $params[':search'] = "%$search%";
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->render('services', [
            'title' => 'Список услуг',
            'services' => $services,
            'category' => $category,
            'price_min' => $price_min,  
            'price_max' => $price_max,  
            'search' => $search  
        ]);
    }
}