<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . "/own/database-connection.php");
require_once (LIBRARY_PATH . "/own/data-management.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function listSpecialties ($conn) {
        $specialties = [];

        $sql = "
          SELECT EMPLOYEE_SPECIALTY FROM VJV_EMPLOYEES WHERE
           
          "
    }
}
