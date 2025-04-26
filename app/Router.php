<?php

class Router {
    private $routes = [
        '' => 'home',
        '/' => 'home',
        '/home' => 'home',
        '/create' => 'create',
        // outras rotas
    ];

    public function getCurrentRoute() {
        

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Remove a barra final se existir
        $uri = rtrim($uri, '/');
        
        return $this->routes[$uri] ?? '404';
    }

    public function dispatch() {
        $route = $this->getCurrentRoute();
        
        switch ($route) {
            case 'home':
                require_once '../templates/navbar.php';
                require_once '../views/home.php';
                break;
            case 'create':
                require_once '../templates/navbar.php';
                require_once '../views/createuser.php';
                break;
            case '404':
                // Define o código de status HTTP como 404
                http_response_code(404);
                require_once '../templates/navbar.php';
                require_once '../views/error404.php';
                break;
            default:
                // Caso inesperado (não deveria acontecer com a verificação acima)
                http_response_code(404);
                require_once '../templates/navbar.php';
                require_once '../views/error404.php';
        }
    }
}


