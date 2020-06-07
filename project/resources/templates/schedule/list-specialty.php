<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");
require_once (LIBRARY_PATH . "/own/data-management.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    function listSpecialties ($conn) {
        $specialties = [];

        $sql = "
          SELECT EMPLOYEE_SPECIALTY FROM VJV_EMPLOYEES WHERE
          EMPLOYEE_ROLE = 'Medico'
          ";

        if (!$statement = $conn->prepare($sql)) {
            throw new Exception("Erro ao preparar SQL: " . $conn->error);
        }

        if (!$statement->execute()) {
            throw new Exception("Erro ao executar query: " . $statement->error);
        }

        if (!$statement->bind_result($specialty)) {
            throw new Exception("Erro ao associar variáveis aos valores: " . $statement->error);
        }

        while ($statement->fetch()) {
            $specialties[] = $specialty;
        }

        echo json_encode($specialties, JSON_UNESCAPED_UNICODE);
    }

    try {
        $conn = databaseConnect();
        listSpecialties($conn);
    } catch (Exception $e) {
        http_response_code(500);
        $errorMessage = $e->getMessage();
    }
}

