<?php
$requestUri = $_SERVER['REQUEST_URI'];

try {
    // Extrai o caminho da URL (ignorando query strings)
    $path = parse_url($requestUri, PHP_URL_PATH);
    
    // Rota padrão se for a raiz
    if (empty($path) || $path === '/') {
        $path = '/index.php';
    }
    
    // Segurança: Previne directory traversal
    if (strpos($path, '../') !== false || strpos($path, '..\\') !== false) {
        throw new Exception("Tentativa de acesso não autorizada");
    }
    
    // Caminho completo no sistema de arquivos
    $fullPath = $_SERVER['DOCUMENT_ROOT'] . $path;
    
    // Verifica se o arquivo existe e é um arquivo (não diretório)
    if (!file_exists($fullPath) || !is_file($fullPath)) {
        throw new Exception("Página não encontrada: {$path}");
    }
    
    // Verifica extensões permitidas (segurança)
    $allowedExtensions = ['php', 'html', 'htm'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    if (!in_array(strtolower($extension), $allowedExtensions)) {
        throw new Exception("Tipo de arquivo não permitido");
    }
    
    // Se tudo estiver OK, inclui o arquivo
    include $fullPath;
    
} catch (Exception $e) {
    http_response_code(404);
    echo "Erro: " . $e->getMessage();
    // Idealmente, registrar o erro em um log aqui
}