<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");
require_once (LIBRARY_PATH . "/own/data-management.php");

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")  {
    $name = $email = $reason = $message = "";

    try {
        $name = parseData($_POST["name"]);
        $email = parseData($_POST["email"]);
        $reason = parseData($_POST["reason"]);
        $message = parseData($_POST["message"]);

        $conn = databaseConnect();

        $sql = "INSERT INTO VJV_MESSAGES (ID, CLIENT_NAME, CLIENT_EMAIL, CLIENT_REASON, CLIENT_MESSAGE)
                VALUES (null, ?, ?, ?, ?);";

        if (!$statement = $conn->prepare($sql)) {
            throw new Exception("Falha na prepação do MySQL: " . $conn->error);
        }

        if (!$statement->bind_param("ssss", $name, $email, $reason, $message)) {
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
              Mensagem salva com sucesso. Obrigado, $name!
            </div>
        ";
    } else {
        echo "
            <div class='alert alert-danger' role='alert'>
              Erro ao salvar nova mensagem. $errorMessage.
            </div>
        ";
    }
}

