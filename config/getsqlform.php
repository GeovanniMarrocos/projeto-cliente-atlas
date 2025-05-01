<?php
$sql = 'SELECT * FROM crudphp.usuarios';
$users = mysqli_query($connection, $sql);

if(mysqli_num_rows($users) > 0):
    return $users;
else:
  $notUserMessage = '<div class=" alert alert-success alert-dismissible fade show" role="alert">
       <h5>Nenhum usuário encontrado</h5>
       <a href="create" class="btn btn-primary float-end"> Adicionar Usuários </a>
    </div>';
endif;

?>

