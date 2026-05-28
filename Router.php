<?php
class Router
{
    private $routes = [];
    public function add(array $routesList): void
    {
        foreach ($routesList as $route) {
            $this->routes[] = [
                'method'  => $route[0],
                'path'    => $route[1],
                'handler' => $route[2]
            ];
        }
    }
    
    public function dispatch(): void
    {
        spl_autoload_register(function ($className) {
            $file = __DIR__ . '/controllers/' . $className . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
        });
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        
        foreach ($this->routes as $route) {
            $routePath = rtrim($route['path'], '/');
            
            $pattern = '#^' . preg_replace('/\{([a-z]+)\}/', '([^/]+)', $routePath) . '$#';
            
            if ($route['method'] === $method && preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                [$controllerName, $action] = explode('@', $route['handler']);
                $controller = new $controllerName();
                $controller->$action(...$matches);
                return;
            }
        }
        
        http_response_code(404);
        require_once __DIR__ . '/views/404.php';
        exit;
    }
}