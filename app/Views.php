<?php

class Views {
    private $viewFile;
    private $data = [];

    public function __construct($viewFile, $data = []) {
        $this->viewFile = "views/{$viewFile}.php";
        $this->data = $data;
    }

    public function render() {
        // Extrai as variáveis para o escopo local
        extract($this->data);
        
        // Inclui os templates e a view
        require_once 'templates/header.php';
        
        if (file_exists($this->viewFile)) {
            require_once $this->viewFile;
        } else {
            require_once 'views/404.php';
        }
        
        require_once 'templates/footer.php';
    }


}
