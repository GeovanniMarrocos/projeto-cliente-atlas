<?php
$notUserMessage;
$sql = 'SELECT * FROM crudphp.usuarios';
$users = mysqli_query($connection, $sql);


if(mysqli_num_rows($users) > 0){
    return $users;
}
    







?>

