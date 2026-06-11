<?php
require_once __DIR__ . '/../core/Controller.php';

class LibraryController extends Controller {
    
    // 1. Все категории (Библиотека)
    public function index() {
        global $connect;
        $libraries = $connect->query("SELECT * FROM library")->fetchAll(PDO::FETCH_ASSOC);
        $this->render('library', ['libraries' => $libraries]);
    }

    // 2. Темы конкретной категории (напр. темы для HTML)
    public function topic($id) {
        global $connect;
        // Ищем темы, где library_id совпадает с ID категории
        $stmt = $connect->prepare("SELECT * FROM topic WHERE library_id = ?");
        $stmt->execute([$id]);
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->render('topic', ['topics' => $topics]);
    }

    // 3. Страница учебника (список уроков)
    public function page($id) {
        global $connect;

        // 1. Достаем информацию о самой ТЕМЕ (чтобы получить заголовок "Учебники по...")
        $stmtTopic = $connect->prepare("SELECT * FROM topic WHERE id = ?");
        $stmtTopic->execute([$id]);
        $topicInfo = $stmtTopic->fetch(PDO::FETCH_ASSOC);

        // 2. Достаем список уроков для этой темы (как и было)
        $stmtPages = $connect->prepare("SELECT * FROM page WHERE topic_id = ?");
        $stmtPages->execute([$id]);
        $pages = $stmtPages->fetchAll(PDO::FETCH_ASSOC);

        // 3. Передаем в render и уроки ($pages), и инфо о теме ($topicInfo)
        $this->render('page', [
            'pages' => $pages,
            'topic' => $topicInfo 
        ]);
    }

    // 4. Текст конкретного урока
    public function lesson($id) {
        global $connect;

        // Выбираем данные из таблицы lesson по переданному ID
        $stmt = $connect->prepare("SELECT * FROM lesson WHERE page_id = ?");
        $stmt->execute([$id]);
        $lessonData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Передаем данные в представление
        $this->render('lesson', [
            'lesson' => $lessonData
        ]);
    }
}