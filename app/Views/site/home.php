<?php include dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'site' . DIRECTORY_SEPARATOR . 'navbar.php' ?>



<h1 class="text-center text-primary p-5">Pesquisar Cep</h1>
    <form action="home/create" method="POST">
        <div class="container col-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Digite o Cep</label>
                        <input class="form-control" type="text" minlength="8" maxlength="8" name="cep" id="cep" onblur="pesquisacep(this.valor)">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Rua:</label>
                        <input class="form-control" type="text" name="rua" id="rua" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Bairro:</label>
                        <input class="form-control" type="text" name="bairro" id="bairro" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Cidade</label>
                        <input class="form-control" type="text" name="cidade" id="cidade" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Estado:</label>
                        <input class="form-control" type="text" name="uf" id="uf" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success" value="Salvar" readonly>

                </div>
            </div>
        </div>
    </form>
