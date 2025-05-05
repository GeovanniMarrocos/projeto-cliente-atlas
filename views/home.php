<?php require_once("../models/getsqlform.php");?>
    <div class="container mt-4">
    <?php include_once("../public/message.php")?>
        <div class="row">
            <div class=" col-md-12">
                <div class=" card">
                    <div class="card-header">
                        <h4>Lista de Usuários
                            <a href="create" class="btn btn-primary float-end"> Adicionar Usuários </a>
                        </h4>
                        <div class="card-body">
                            <table class=" table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Data de Nascimento</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user):?>
                                    <tr>
                                        <td><?=$user['id']?></td>
                                        <td><?=$user['nome']?></td>
                                        <td><?=$user['email']?></td>
                                        <td><?=date('d/m/Y', strtotime($user['data_nascimento']))?></td>
                                        <td>
                                            <a class=" btn btn-secondary btn-sm" href="viewuser?id=<?=$user['id']?>">Visualizar</a>
                                            <a class=" btn btn-success btn-sm" href="edituser?id=<?=$user['id']?>">Editar</a>
                                            <form action="" method="post" class=" d-inline">
                                                <button class=" btn btn-danger btn-sm" type="submit" name="delete_usuario" value="1">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php if($notUserMessage == true):?>
                                    <?php return $notUserMessage?>
                                    <?php endif;?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 