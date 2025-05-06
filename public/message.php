<?php 
    if(isset($_SESSION['mensagem'])):
?>
<div class=" alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['mensagem'] ?>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
</div>
<?php 
    unset($_SESSION['mensagem']);
    endif;
?>
<?php 
    
?>