<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");
require_once (LIBRARY_PATH . "/own/data-management.php");

$errorMessage = "";

function insertEmployee ($conn) {
    $nome = parseData($_POST["nome"]);
    $dataNasc = parseData($_POST['birthday']);
    $genero = parseData($_POST['drone']);

    $cargo = parseData($_POST['role']);

    $estadoCivil = "";
    if (!empty($_POST['civil'])) {
        foreach ($_POST['civil'] as $r) {
            $estadoCivil = $estadoCivil . parseData($r);
        }
    }

    $cpf = parseData($_POST["cpf"]);
    $rg = parseData($_POST["rg"]);

    $especialidade = "";
    if (!empty($_POST['specialty'])) {
        $especialidade = parseData($_POST['specialty']);
    }

    if ($nome == "" || $dataNasc == "" || $genero == "" || $cargo == "" || $cpf == "" || $rg == "") {
        throw new Exception("Um ou mais campos necessários estão vazios");
    }

    $sql = "
          INSERT INTO VJV_EMPLOYEES (
                ID, EMPLOYEE_NAME, EMPLOYEE_BIRTHDAY, ESTADO_CIVIL, EMPLOYEE_SEX, 
                EMPLOYEE_ROLE, EMPLOYEE_SPECIALTY, EMPLOYEE_CPF, EMPLOYEE_RG)
          VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);
        ";

    if (!$statement = $conn->prepare($sql)) {
        throw new Exception("Falha na prepação do MySQL: " . $conn->error);
    }

    if (!$statement->bind_param("ssssssss", $nome, $dataNasc, $estadoCivil, $genero, $cargo,
        $especialidade, $cpf, $rg)) {
        throw new Exception("Falha ao conectar variáveis do MySQL: " . $statement->error);
    }

    if (!$statement->execute()) {
        throw new Exception("Erro ao executar inserção no MySQL: " . $statement->error);
    }

    $statement->close();
}

function findEmployee ($mysqli, $cpf) {
    $sql = "
        SELECT ID FROM VJV_EMPLOYEES WHERE EMPLOYEE_CPF = ?
    ";

    try {
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $cpf);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($userId);
            $stmt->fetch();
            $stmt->close();

            return $userId;
        }
    } catch (Exception $e) {
        return "";
    }
}

function insertAddress ($conn) {
    $cpf = parseData($_POST["cpf"]);
    $cep = parseData($_POST["cep"]);
    $logradouro = parseData($_POST['streetName']);
    $nro = parseData($_POST['numberHouse']);
    $complemento = parseData($_POST['complement']);
    $bairro = parseData($_POST['neighborhood']);
    $cidade = parseData($_POST['cidade']);
    $estado = parseData($_POST['state']);

    $tipoLogradouro = "";
    if (!empty($_POST['streetType'])) {
        foreach ($_POST['streetType'] as $st)
        $tipoLogradouro = parseData($st);
    }

    if ($cep == "" || $logradouro == "" || $nro == "" || $bairro == "" || $cidade == "" || $estado == "") {
        throw new Exception("Um ou mais campos de endereço obrigatórios estão vazios");
    }

    $userId = findEmployee($conn, $cpf);

    $sql = "
            INSERT INTO VJV_EMPLOYEES_ADDRESS (
              ID, ID_EMPLOYEE, CEP, STREET_TYPE, STREET, NUMBER, COMPLEMENT, NEIGH, CITY, PROVINCE)
            VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?);
        ";

    if ($userId == "") {
        throw new Exception("Nao foi possível cadastrar o endereço do funcionário");
    }

    if (!$statement = $conn->prepare($sql)) {
        throw new Exception("(ENDEREÇO) Falha na prepação do MySQL: " . $conn->error);
    }

    if (!$statement->bind_param("isisissss", $userId, $cep, $tipoLogradouro, $logradouro, $nro, $complemento,
        $bairro, $cidade, $estado)) {

        throw new Exception("(ENDEREÇO) Falha ao conectar variáveis do MySQL: " . $statement->error);
    }

    if (!$statement->execute()) {
        throw new Exception("(ENDEREÇO) Erro ao executar inserção no MySQL: " . $statement->error);
    }

    $statement->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    try {
        $conn = databaseConnect();
        $conn->begin_transaction();
        insertEmployee($conn);
        insertAddress($conn);

        $conn->commit();

    } catch (Exception $e) {
        $conn->rollback();
        $errorMessage = $e->getMessage();
    } finally {
        $conn->close();
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
              Erro ao salvar novo funcionário. $errorMessage.
            </div>
        ";
    }
}

