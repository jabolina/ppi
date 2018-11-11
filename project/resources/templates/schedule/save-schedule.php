<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");
require_once (LIBRARY_PATH . "/own/data-management.php");

$errorMessage = "";

function insertSchedule ($conn) {
    $specialty = "0";
    if (!empty($_POST["spec"])) {
        foreach ($_POST["spec"] as $sp) {
            $specialty = parseData($sp);
        }
    }

    $doctorId = -1;
    if (!empty($_POST["dr"])) {
        foreach ($_POST["dr"] as $dr) {
            $doctorId = parseData($dr);
        }
    }

    $time = "0";
    if (!empty($_POST["hour"])) {
        foreach ($_POST["hour"] as $hr) {
            $time = parseData($hr);
        }
    }

    $date = $_POST["data"];
    $patientName = parseData($_POST["patient-name"]);
    $patientPhone = parseData($_POST["patient-phone"]);
    $patientEmail = parseData($_POST["patient-mail"]);

    if ($specialty == "0" || $doctorId == -1 || $time == "0" || $date == ""
        || $patientName == "" || $patientPhone == "" || $patientEmail == "") {

        throw new Exception("Um ou mais campos obrigatórios foram deixados em branco");
    }

    $sql = "
            INSERT INTO VJV_SCHEDULES (
            ID, 
            ID_DOCTOR, 
            DOCTOR_SPECIALTY, 
            SCHEDULE_DATE, 
            SCHEDULE_TIME, 
            PATIENT_NAME, 
            PATIENT_EMAIL, 
            PATIENT_PHONE) VALUES
            (null, ?, ?, ?, ?, ?, ?, ?); 
        ";

    if (!$statement = $conn->prepare($sql)) {
        throw new Exception("Falha na prepação do MySQL: " . $conn->error);
    }

    if (!$statement->bind_param("issssss", $doctorId, $specialty, $date, $time,
        $patientName, $patientEmail, $patientPhone)) {

        throw new Exception("Falha ao conectar variáveis do MySQL: " . $statement->error);
    }

    if (!$statement->execute()) {
        throw new Exception("Erro ao executar inserção no MySQL: " . $statement->error);
    }

    $statement->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = databaseConnect();
        insertSchedule($conn);
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    } finally {
        $conn->close();
    }

    if ($errorMessage == "") {
        echo "
            <div class='alert alert-success' role='alert'>
              Agendamento realizado com sucesso!
            </div>
        ";
    } else {
        echo "
            <div class='alert alert-danger' role='alert'>
              Erro ao realizar novo agendamento. $errorMessage.
            </div>
        ";
    }
}
