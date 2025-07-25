
<?php require_once("../models/getsqlviewuser.php");?>
<?php if($notUserViewMessage == true){
    return $notUserViewMessage;
}    
?>
<div class="container g-3">
    <div class="row">
        <div class=" col-md-12">
            <div class="card">
                <div class=" card-header">
                    <h4>Visualizar Usuários
                        <a href="home" class=" btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php include_once("../models/getsqlviewuser.php");?>
                    <div class="mb-3">
                        <label>Nome</label>
                        <p class=" form-control">
                            <?php echo  $userInfo['nome'];?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <p class=" form-control">
                            <?php echo $userInfo['email'];?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label>Data de Nascimento</label>
                        <p class=" form-control">
                            <?php echo date('d/m/Y', strtotime($userInfo['data_nascimento']));?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</div>