<?php
require_once __DIR__ . '/../core/Controller.php';

class DocController extends Controller {

    // Метод для списка документов
    public function index() {
        // Подключаем БД
        require __DIR__ . '/../config/database.php';
        
        // Получаем все документы
        $stmt = $pdo->query("SELECT * FROM doc");
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->render('doc', [
            'title' => 'Список документации',
            'docs'  => $docs
        ]);
    }

    // Метод для детальной страницы
    public function detail($id) {
        // Подключаем БД
        require __DIR__ . '/../config/database.php';
        
        // Получаем задачу (с параметром через prepare)
        $stmt = $pdo->prepare("SELECT * FROM doc WHERE id = ?");
        $stmt->execute([$id]);
        $doc = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Получаем детали (вкладки)
        $stmt = $pdo->prepare("SELECT * FROM doc_detail WHERE doc_id = ?");
        $stmt->execute([$id]);
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->render('detail_doc', [
            'title'   => 'Детали документации',
            'doc'     => $doc,
            'details' => $details
        ]);
    }
}