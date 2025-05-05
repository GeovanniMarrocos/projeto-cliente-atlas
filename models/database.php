<?php
define('HOST', '127.0.0.1');
define('USUARIO','root');
define('SENHA', '12345');
define('DB','crudphp');

$connection = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Não foi possivél conectar com o banco de dados");

