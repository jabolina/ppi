<?php

require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");

define("HOST", config["db"]["host"]);
define("USER", config["db"]["username"]);
define("PASSWORD", config["db"]["password"]);
define("DATABASE", config["db"]["name"]);

function databaseConnect () {
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);

    if ($conn->connect_error) {
        throw new Exception("Error while connecting to MySQL: " . $conn->connect_error);
    } else {
        return $conn;
    }
}
