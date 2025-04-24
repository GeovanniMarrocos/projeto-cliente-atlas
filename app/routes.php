<?php

$requestUri = $_SERVER['REQUEST_URI'];



try {
$path = parse_url($requestUri, PHP_URL_PATH);

if (!is_file($requestUri));
throw new Exception("Erro ao carregar a rota {$requestUri}");

if (empty($path) || $path === '/') {
    $path = '/index.php';
}

if (strpos($path, '../') !== false || strpos($path, '..\\') !== false) {
    throw new Exception("Tentativa de acesso a diretório não permitida");
}

} catch (Exception $e) {
   echo $e ->getMessage();
}