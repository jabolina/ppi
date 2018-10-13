<?php

require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");

class Contact {
    public $id;
    public $clientName;
    public $clientEmail;
    public $clientReason;
    public $clientMessage;
}

function chooseReason($reasonInteger) {
    $reasons = array(
        1=> "Reclamação",
        2=> "Sugestão",
        3=> "Elogio",
        4=> "Dúvida",
        5=> "Outro"
    );

    return $reasons[$reasonInteger];
}

function listContacts ($conn) {
    $contacts = [];

    $sql = "SELECT * FROM VJV_MESSAGES;";

    if (!$statement = $conn->prepare($sql)) {
        throw new Exception("Erro ao preparar SQL: " . $conn->error);
    }

    if (!$statement->execute()) {
        throw new Exception("Erro ao executar query: " . $statement->error);
    }

    if (!$statement->bind_result($id, $client_name, $client_email, $client_reason, $client_message)) {
        throw new Exception("Erro ao associar variáveis aos valores: " . $statement->error);
    }

    while ($statement->fetch()) {
        $contact = new Contact();

        $contact->id = $id;
        $contact->clientName = $client_name;
        $contact->clientEmail = $client_email;
        $contact->clientReason = chooseReason($client_reason);
        $contact->clientMessage = $client_message;

        $contacts[] = $contact;
    }

    return $contacts;
}

$contacts = "";
$errorMessage = "";

try {
    $conn = databaseConnect();
    $contacts = listContacts($conn);
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
?>

<div class="container-fluid">
    <div class="title-section">Listagem dos contatos recebidos</div>

    <div class="body-section">
        <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Motivo</th>
                <th>Mensagem</th>
            </tr>
            </thead>

            <tbody>

            <?php
            if ($contacts != "") {

                foreach ($contacts as $contact) {
                    echo "
                    <tr>
                        <td>$contact->clientName</td>
                        <td>$contact->clientEmail</td>
                        <td>$contact->clientReason</td>
                        <td>$contact->clientMessage</td>
                    </tr>
                    ";
                }
            } else if ($errorMessage != "") {
                echo "
                    <div class='alert alert-danger' role='alert'>
                      Erro ao listar contatos recebidos: $errorMessage.
                    </div>
                ";
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
