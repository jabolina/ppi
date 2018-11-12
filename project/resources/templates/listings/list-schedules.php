<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");

class Schedule {
    public $id;
    public $doctorName;
    public $specialty;
    public $date;
    public $time;
    public $patientName;
    public $patientPhone;
}

function findDoctorName ($id) {


    $sql = "
        SELECT EMPLOYEE_NAME FROM VJV_EMPLOYEES WHERE ID = ?;
    ";

    try {
        $conn = databaseConnect();
        if (!$stmt = $conn->prepare($sql)) {
            throw new Exception("Erro ao preparar SQL: " . $conn->error);
        }

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($userName);
            $stmt->fetch();
            $stmt->close();

            return $userName;
        }
    } catch (Exception $e) {
        throw new Exception("Erro ao encontrar nome do médico: " . $conn->error);
    }
}

function listSchedulesAndPatients ($conn) {
    $schedules = [];

    $sql = "SELECT 
        sched.ID, 
        ID_DOCTOR, 
        DOCTOR_SPECIALTY, 
        SCHEDULE_DATE, 
        SCHEDULE_TIME, 
        PATIENT_NAME, 
        PATIENT_PHONE 
        FROM VJV_SCHEDULES sched, VJV_PATIENTS pttn 
        WHERE sched.ID = pttn.ID_SCHEDULE;
    ";

    if (!$statement = $conn->prepare($sql)) {
        throw new Exception("Erro ao preparar SQL: " . $conn->error);
    }

    if (!$statement->execute()) {
        throw new Exception("Erro ao executar query: " . $statement->error);
    }

    if (!$statement->bind_result($id, $doctorId, $specialty, $date, $time, $patientName, $patientPhone)) {
        throw new Exception("Erro ao associar variáveis aos valores: " . $statement->error);
    }

    try {
        while ($statement->fetch()) {
            $schedule = new Schedule();

            $schedule->id = $id;
            $schedule->doctorName = findDoctorName($doctorId);
            $schedule->specialty = $specialty;
            $schedule->date = $date;
            $schedule->time = $time;
            $schedule->patientName = $patientName;
            $schedule->patientPhone = $patientPhone;

            $schedules[] = $schedule;
        }

        return $schedules;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }

}

$schedules = "";
$errorMessage = "";

try {
    $conn = databaseConnect();
    $schedules = listSchedulesAndPatients($conn);
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
} finally {
    $conn->close();
}

?>

<div class="container-fluid">
    <div class="title-section">Listagem dos agendamentos</div>

    <div class="body-section">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Médico</th>
                <th>Especialidade</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Paciente</th>
                <th>Telefone do paciente</th>
            </tr>
            </thead>

            <tbody>

            <?php
            if ($schedules != "") {
                foreach ($schedules as $schedule) {
                    echo "
                    <tr>
                        <td>$schedule->doctorName</td>
                        <td>$schedule->specialty</td>
                        <td>$schedule->date</td>
                        <td>$schedule->time</td>
                        <td>$schedule->patientName</td>
                        <td>$schedule->patientPhone</td>                    
                    </tr>
                    ";
                }
            } else if ($errorMessage != "") {
                echo "
                    <div class='alert alert-danger' role='alert'>
                      Erro ao listar agendamentos: $errorMessage.
                    </div>
                ";
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
