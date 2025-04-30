 <?php


session_start();
require_once("../vendor/autoload.php");
require_once("../config/database.php");


//Lógica e tratamento de erros do banco de dados
if (isset($_POST['createuser']))  
{
    $name = mysqli_real_escape_string($connection, trim($_POST['nome']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $birth_date = mysqli_real_escape_string($connection, trim($_POST['data_nascimento']));
    $password = isset($_POST['senha']) ? mysqli_real_escape_string($connection, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) :'';
    
    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$name', '$email', '$birth_date', '$password')";
 
    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0) 
    {

        $nameParts = explode(' ',$name);
        $firstName = $nameParts[0];    
        

        $_SESSION['mensagem'] = "Usuário: <strong> {$firstName}: </strong> criado com sucesso!";
        header("Location: index.php");
        exit;
    }
    else 
    {
        $_SESSION['mensagem'] = "Não foi possivél criar o usuário";
        header("Location: index.php");
        exit;
    }
}