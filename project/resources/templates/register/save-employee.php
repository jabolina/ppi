<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");
require_once (LIBRARY_PATH . "/own/data-management.php");

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $nome = $dataNasc = $cpf = $rg = $cep = $tipoLogradouro $logradouro = $nro = $complemento = $bairro = $cidade = $estado = "";
    $estadoCivil = $genero = $cargo = $especialidade = 1;

    try {
        $nome = parseData($_POST["nome"]);
        $cpf = parseData($_POST["cpf"]);
        $rg = parseData($_POST["rg"]);
        $cep = parseData($_POST["cep"]);

        $conn = databaseConnect();

        $sql = "INSERT INTO VJV_EMPLOYEES (ID, NOME, NASCIMENTO, ESTADO_CIVIL, GENERO, CARGO, ESPECIALIDADE, CPF, RG)
                VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);";

        $sql_endereco = "INSERT INTO VJV_EMPLOYEES_ADRESS (ID_EMPLOYEE, CEP, TIPO_LOGRADOURO, LOGRADOURO, NUMERO, COMPLEMENTO, BAIRRO, CIDADE, ESTADO)
                VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);";

        if (!$statement = $conn->prepare($sql)) {
            throw new Exception("Falha na prepação do MySQL: " . $conn->error);
        }

        if (!$statement->bind_param("ssss", $nome, $cpf, $rg, $cep)) {
            throw new Exception("Falha ao conectar variáveis do MySQL: " . $statement->error);
        }

        if (!$statement->execute()) {
            throw new Exception("Erro ao executar inserção no MySQL: " . $statement->error);
        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }

    if ($errorMessage == "") {
        echo "
            <div class='alert alert-success' role='alert'>
              Funcionário cadastrado com sucesso!
            </div>
        ";
    } else {
        echo "
            <div class='alert alert-danger' role='alert'>
              Erro ao salvar nova funcionário. $errorMessage.
            </div>
        ";
    }
}

