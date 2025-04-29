 <?php
session_start();
require_once("../config/database.php");

if (isset($_POST['createuser']))  {
    $nome = mysqli_real_escape_string($connection, trim($_POST['nome']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($connection, trim($_POST['data_nascimento']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($connection, trim($_POST['nome'])) :'';
    
    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";
    
    mysqli_query($connection, $sql);

}

if (isset($_POST["update"])) {



}
