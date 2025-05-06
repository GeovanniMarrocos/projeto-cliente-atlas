 <?php


session_start();
require_once("../vendor/autoload.php");
require_once("../models/database.php");


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
        

        $_SESSION['mensagem'] = "Usuário: <strong> {$firstName} </strong> criado com sucesso!";
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

//Lógica para editar dados dentro do banco de dados
if (isset($_POST['update']))  
{
    $userId = mysqli_real_escape_string($connection, ($_POST['id']));
    

    $name = mysqli_real_escape_string($connection, trim($_POST['nome']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $birth_date = mysqli_real_escape_string($connection, trim($_POST['data_nascimento']));
    $password = isset($_POST['senha']) ? mysqli_real_escape_string($connection, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) :'';
    
    $sql = "UPDATE usuarios SET nome = '$name', email = '$email', data_nascimento = '$birth_date'";

    if(empty($password))
    {
        $sql .= ", senha='" . password_hash($password, PASSWORD_DEFAULT) . "'";
    }
 
    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0) 
    {

        $nameParts = explode(' ',$name);
        $firstName = $nameParts[0];    
        

        $_SESSION['mensagem'] = "Usuário: <strong> {$firstName} </strong> Atualizado com sucesso!";
        header("Location: index.php");
        exit;
    }
    else 
    {
        $_SESSION['mensagem'] = "Não foi possivél atualizar os dados do usuário";
        header("Location: index.php");
        exit;
    }
}

//Lógica para exclusão de dados no banco;
if(isset($_POST['delete_user']))
{
    $userId = mysqli_real_escape_string($connection, $_POST['delete_user']);
    
    $sql = "DELETE FROM usuarios WHERE id = '$userId'";

    mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection) > 0)
    {
       $_SESSION['mensagem'] = "Usuário foi excluído com sucesso"; 
       header("Location: index.php");
    }
    else
    {
        $_SESSION['mensagem'] = "Usuário não foi deletado";
        header("Location: index.php"); 
    }
}
