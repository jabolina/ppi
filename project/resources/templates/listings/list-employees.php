<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");

class Employee {
    public $id;
    public $employeeName;
    public $employeeSex;
    public $employeeRole;
    public $employeeRG;
    public $employeeStreet;
    public $employeeNeighborhood;
    public $employeeCity;
}

function chooseSex($sex) {
    $sexs = array(
        1=>"Homem",
        2=> "Mulher",
        3=> "Outro"
    );

    return $sexs[$sex];
}

function listEmployees ($conn) {
    $employees = [];

    $sql = "
        SELECT ID, 
        EMPLOYEE_NAME, 
        EMPLOYEE_SEX, 
        EMPLOYEE_RG, 
        EMPLOYEE_STREET, 
        EMPLOYEE_NEIGH,
        EMPLOYEE_CITY FROM VJV_EMPLOYEES;
    ";

    if (!$statement = $conn->prepare($sql)) {
        throw new Exception("Erro ao preparar SQL: " . $conn->error);
    }

    if (!$statement->execute()) {
        throw new Exception("Erro ao executar query: " . $statement->error);
    }

    if (!$statement->bind_result($employeeId, $employeeName, $employeeSex, $employeeRole,
        $employeeRG, $employeeStreet, $employeeNeigh, $employeeCity)) {

        throw new Exception("Erro ao associar variáveis aos valores: " . $statement->error);
    }

    while ($statement->fetch()) {
        $employee = new Employee();

        $employee->id = $employeeId;
        $employee->employeeName = $employeeName;
        $employee->employeeSex = chooseSex($employeeSex);
        $employee->employeeRole = $employeeRole;
        $employee->employeeRG = $employeeRG;
        $employee->employeeStreet = $employeeStreet;
        $employee->employeeNeighborhood = $employeeNeigh;
        $employee->employeeCity = $employeeCity;

        $employees[] = $employee;
    }

    return $employees;
}

$employees = "";
$errorMsg = "";

try {
    $conn = databaseConnect();
    $employees = listEmployees($conn);
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
}
?>

<div class="container-fluid">
    <div class="title-section">Listagem dos funcionários</div>

    <div class="body-section">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Cargo</th>
                <th>RG</th>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Cidade</th>
            </tr>
            </thead>

            <tbody>
            <?php
            if ($employees != "") {
                foreach ($employees as $employee) {
                    echo "
                    <tr>
                        <td>$employee->employeeName</td>
                        <td>$employee->employeeSex</td>
                        <td>$employee->employeeRole</td>
                        <td>$employee->employeeRG</td>
                        <td>$employee->employeeStreet</td>
                        <td>$employee->employeeNeighborhood</td>
                        <td>$employee->employeeCity</td>
                    </tr>
                    ";
                }
            } else if ($errorMsg != "") {
                echo "
                    <div class='alert alert-danger' role='alert'>
                      Erro ao listar funcionários: $errorMessage.
                    </div>
                ";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
