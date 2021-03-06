<?php
    session_start();
    
    if($_SESSION["emailUsuario"] && $_SESSION["loginString"]){
        $requestResponse = true;
    } else {
        $requestResponse = false;
    }

    if(! $requestResponse){

        echo <<<HTML
        <h1>Não autorizado</h1>
        HTML;
    
        exit();
    }
?>

<!-- cadastramento de funcionario page -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php
        session_start();
        if($_SESSION["usuarioMedico"]){
            echo <<<HTML
            <link rel="stylesheet" href="../css/headerAndBodyrestritamed.css">
            HTML;
        }else{
            echo <<<HTML
            <link rel="stylesheet" href="../css/headerAndBodyrestrita.css">
            HTML;
        }

    ?>
    <link rel="icon" href="../../../images/logo.png">
    <script src="js/script.js"></script>

    <title>Cadastrar funcionario</title>
</head>

<body>
    <header>

        <a href="../sessao_restrita.php" class="logo_and_name">
            <img src="../../../images/logo.png" alt="logo clinica" class="logo_image">
            <p class="clinic_name">Orale Clínica</p>
        </a>
        <div class="nav_buttons">
            <a href="cadastramento_funcionario.php">Novo Funcionário</a>
            <a href="../cadastramento_paciente/cadastramento_paciente.php">Novo Paciente</a>
            <a href="../listagem_funcionarios/listagem_funcionarios.php">Listar Funcionários</a>
            <a href="../listagem_pacientes/listagem_pacientes.php">Listar Pacientes</a>
            <a href="../listagem_enderecos/listagem_enderecos.php">Listar Endereços</a>
            <a href="../listagem_agendamentos/listagem_agendamentos.php">Listar todos Agendamentos</a>
            <?php
                if($_SESSION["usuarioMedico"]){
                    session_start();
                    echo <<<HTML
                    <a href="../listagem_agendamentos_medico/listagem_agendamentos_medico.php">Listar meus Agendamentos</a>
                    HTML;
                }
            ?>
            <a href="#" id="logout" >Sair</a>
        </div>

    </header>


    <main>
        <h3>Cadastro de funcionario</h3>
        <form action="php/cadastra-funcionario.php" method="POST" class="row g-3">
            <!-- nome, sexo, email, telefone, CEP, logradouro, cidade, estado, data de início do contrato de trabalho, salário e senha. -->
            <div class="col-sm-9">
                <label for="nomeFuncionario" class="form-label">Nome do funcionario</label>
                <input type="input" name="nomeFuncionario" class="form-control" id="nomeFuncionario">
            </div>
            <div class="col-sm-3">
                <label for="sexoFuncionario" class="form-label">Sexo do funcionario</label>
                <select type="select" name="sexoFuncionario" class="form-select" id="sexoFuncionario">
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="col-sm-6">
                <label for="telefone" class="form-label">Telefone do funcionario</label>
                <input type="input" name="telefone" class="form-control" id="telefone">
            </div>
            <div class="col-sm-6">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" name="cep" class="form-control" id="cep">
            </div>
            <div class="col-sm-6">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" id="logradouro">
            </div>
            <div class="col-sm-6">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="cidade">
            </div>
            <div class="col-sm-6">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" id="estado">
            </div>
            <div class="col-sm-4">
                <label for="DataInicioContrato" class="form-label">Data de início do contrato de trabalho</label>
                <input type="date" name="DataInicioContrato" class="form-control" id="DataInicioContrato">
            </div>
            <div class="col-sm-4">
                <label for="salario" class="form-label">Salario</label>
                <input type="number" name="salario" class="form-control" id="salario">
            </div>
            <div class="col-sm-4">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha">
            </div>
            <div class="col-sm-12">
                <input class="form-check-input" type="checkbox" name= "medicocheck" value="" id="medicocheck">
                <label class="form-check-label" for="medicocheck">
                    Funcionario médico
                </label>  
            </div>
            <div class = "divmedcheck" id="divmedcheck">
                <div class="col-sm-6">
                    <label for="especialidade" class="form-label">Especialidade</label>
                    <input type="text" name="especialidade" class="form-control" id="especialidade">
                </div>
                <div class="col-sm-6">
                    <label for="crm" class="form-label">CRM</label>
                    <input type="text" name="crm" class="form-control" id="crm">
                </div>
            </div>

            <div class="col-sm-12 d-grid">
                <button class="btn btn-primary btn-block">Cadastrar</button>
            </div>
        </form>
    </main>
</body>

</html>
