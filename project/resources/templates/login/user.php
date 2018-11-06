<?php

class user {
    public $id;
    public $clientEmail;
    public $clientPassword;
}

$clients = [];

function listClients ($conn) {
    $contacts = [];

    $sql = "SELECT * FROM VJV_USERS;";

    if (!$statement = $conn->prepare($sql)) {
        throw new Exception("Erro ao preparar SQL: " . $conn->error);
    }

    if (!$statement->execute()) {
        throw new Exception("Erro ao executar query: " . $statement->error);
    }

    if (!$statement->bind_result($id, $email, $password)) {
        throw new Exception("Erro ao associar variáveis aos valores: " . $statement->error);
    }

    while ($statement->fetch()) {
        $contact = new Client();

        $contact->id = $id;
        $contact->clientEmail = $email;
        $contact->clientPassword = $password;

        $contacts[] = $contact;
    }

    return $contacts;
}
