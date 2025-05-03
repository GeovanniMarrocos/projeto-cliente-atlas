<div class="container g-3">
    <div class="row">
        <div class=" col-md-12">
            <div class="card">
                <div class=" card-header">
                    <h4>Editar Usuário
                      <a href="home" class=" btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="action.php" method="GET">
                        <div class="mb-3">
                            <label>Nome</label>
                            <input class="form-control"type="text" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control"type="text" name="email" required>
                        </div>
                        <div class="mb-3">
                        <?php include_once("../public/message.php")?>
                            <label>Data de Nascimento</label>
                            <input class="form-control"type="date" name="data_nascimento" required>
                        </div>
                        <div class="mb-3">
                            <label>Senha</label>
                            <input class="form-control" type="password" name="senha" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit" name="createuser">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</div>
