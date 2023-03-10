<form method="POST" action="actions/salvar.php">
    <div class="row mb-3">
        <!-- Campo Nome -->
        <div class="col-md-4">
            <label for="nome">Nome:</label>
               <input type="text" required class="form-control" id="nome" name="nome">
        </div>
         <!-- Campo Telefone -->
        <div class="col-md-2">
            <label for="telefone">Telefone:</label>
            <input type="tel" required class="form-control" id="telefone" name="telefone">
        </div>
         <!-- Campo Email -->
        <div class="col-md-6">
            <label for="email">Email:</label>
            <input type="email" required class="form-control" id="email" name="email">
        </div>
    </div>

    <div class="row-mb-3">

        <div class="col-md-6">
            <!-- -->
            <p class="form-label">Capital onde pretende trabalhar: </p>

            <?php
            $capitalDAO = new CapitalDAO;
            foreach ($capitalDAO->buscarTodos() as $capital) {
                $descricao = utf8_encode($capital['descricao']);

                echo "
                <div class=\"form-check mb-2"\>
                <input class=\"form-check-input\" type=\"radio\" name=\"capital_id\"
                id=\"radioCapital-{$capital['id']}\" value=\"{$capital['id']}\">
                <label class=\"form-check-label\" for=\"radioCapital-{$capital['id']}\">
                    {$descricao}
                </label>
                </div>
                ";
            }
            ?>
        </div>

        <div class="col-md-6">

            <div class="mb-2">
                <label for="cargo">
                    Cargo Pretendido:
                </label>

                <select name="cargo_id" class="form-control" id="cargo">
                    <?php
                        $cargoDao = new CargoDAO;
                        foreach($cargoDao->buscarTodos() as $cargo) {
                            $descricao = utf8_encode($cargo['descricao']);
                            echo "<option value=\"{$cargo['id']}\"> {$descricao} </option>";
                        }
                    ?>
                </select>
            </div>

            <div class="mb-2">
                <label for="tempoExperiencia">Tempo de Experi??ncia:</label>
                <select name="tempo_experiencia_id" class="form_control" id="tempoExperiencia">
                    <?php
                        $tempoExperienciaDAO = new TempoDeExperienciaDAO;
                        foreach($tempoExperienciaDao->buscarTodos() as $tempo) {
                            $descricao = utf8_encode($tempo['descricao']);
                            echo "<option value=\"{$tempo['id']}\"> {$descricao} </option>";
                        }
                        ?>
                </select>
            </div>

            <div class="mb-2">
                <label for="areaAtuacao">Area de Atua????o:</label>
                <select name="area_atuacao_id" class="form_control" id="areaAtuacao">
                    <?php
                        $areaDAO = new AreaDeAtuacaoDAO;
                        foreach($areaDao->buscarTodos() as $area) {
                            $descricao = utf8_encode($area['descricao']);
                            echo "<option value=\"{$area['id']}\"> {$descricao} </option>";
                        }
                        ?>
                </select>
            </div>   
        </div>
    </div>

    <div class="col-12">
        <!-- Campo Comentario -->
        <div class="form-group">
            <label for="comentario">Coment??rios</label>
            <textarea class="for-control" name="comentario" id="comentario" rows="3"></textarea>
        </div>
    </div>

    <div class="row justify-content-end mb-4">
        <div class="col-3">
           <!-- Bot??o de Envio de Dados -->
           <button type="submit" class="btn btn-primary float-right"> 
                Salvar
           </button>
        </div>
    </div>
</form>