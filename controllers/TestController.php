<?php
require_once __DIR__ . '/../core/Controller.php';
class TestController extends Controller {
    public function demo() { echo "Динамический метод DEMO работает из папки controllers!"; }
}