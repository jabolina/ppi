<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");
require_once (LIBRARY_PATH . "/own/data-management.php");

class Doctor {
    public $id;
    public $name;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    function listSpecialties ($conn) {
        $doctors = [];
        $spec = $_GET["spec"];

        $sql = "
          SELECT ID, EMPLOYEE_NAME FROM VJV_EMPLOYEES WHERE
          EMPLOYEE_ROLE = 'Medico' AND EMPLOYEE_SPECIALTY = '$spec'
          ";

        if (!$result = $conn->query($sql)) {
            throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $doc = new Doctor();
            $doc->id = $row["ID"];
            $doc->name = $row["EMPLOYEE_NAME"];

            $doctors[] = $doc;
        }

        echo json_encode($doctors, JSON_UNESCAPED_UNICODE);
    }

    try {
        $conn = databaseConnect();
        listSpecialties($conn);
    } catch (Exception $e) {
        http_response_code(500);
        $errorMessage = $e->getMessage();
    }
}

