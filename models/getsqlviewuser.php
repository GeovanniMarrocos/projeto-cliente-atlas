<?php
require_once("../models/database.php");
$notUserViewMessage;

if(isset($_GET['id'])) 
{
    $userId = mysqli_real_escape_string($connection, $_GET['id']);
    $sql = "SELECT * FROM crudphp.usuarios WHERE id='$userId'";
    $query = mysqli_query($connection, $sql); 

    if(mysqli_num_rows($query) > 0)
    {
        $userInfo = mysqli_fetch_array($query);    
    }
    else
    {
       $notUserViewMessage = 
       '<div class=" alert alert-danger alert-dismissible fade show" role="alert">
       <h5>Nenhum usuário encontrado</h5> <a href="create" class="btn btn-danger float-end mb-3"> Adicionar Usuários </a>
       </div>';
        echo $notUserViewMessage;
    }
}

?>

