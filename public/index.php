<?php
require_once("../config/database.php");
require_once("../vendor/autoload.php");
require_once("../app/Router.php");
require_once("../app/Views.php");

// Instancie o Router 
$router = new Router(); 
// Obter a rota atual (você precisa implementar isso no seu Router)
$route = $router->getCurrentRoute();

// Definir o arquivo de view baseado na rota
$viewFile = match($route) {
    '' => '../views/home.php',
    '/' => '../views/home.php',
    'home' => '../views/home.php',
    'create' => '../views/createuser.php',
    '404' => '../views/error404.php',
    default => '../views/error404.php'
};


// Renderizar a página
require_once '../templates/navbar.php';

if (file_exists($viewFile)) {
    require_once $viewFile;
} else {
    require_once '../views/error404.php';
}
