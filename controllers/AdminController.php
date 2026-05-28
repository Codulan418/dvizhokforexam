<?
require_once __DIR__ . '/../core/Controller.php';

class AdminController extends Controller
{
    public function admin()
    {   
        if (!isset($_SESSION['user']['role_id'])) { header('Location: /'); exit; }
        
        $role = $_SESSION['user']['role_id'];
        
        if ($role == 2) {
            $buttons = 
            [
                ['url' => '/admin/reviews', 'title' => 'Управление отзывами']
                ,['url' => '/admin/users', 'title' => 'Управление пользователями']
                ,['url' => '/admin/settings', 'title' => 'Настройки']
            ];
        } 
        elseif ($role == 3) {
            $buttons = [
                ['url' => '/admin/reviews', 'title' => 'Управление отзывами']
            ];
        } 
        else { header('Location: /'); exit; }
        
        $this->render('admin/admin', ['title' => 'Панель-Администрации','buttons' => $buttons]);
    }
}