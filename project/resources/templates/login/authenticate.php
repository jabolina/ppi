<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");

function loginUser($email, $password, $mysqli) {
    $SQL = "
    SELECT ID, USER_EMAIL, USER_PASSWORD  
    FROM VJV_USERS
    WHERE USER_EMAIL = ?
    LIMIT 1
    ";

    $stmt = $mysqli->prepare($SQL);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($userId, $userEmail, $userPassword);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        if ($password == $userPassword) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_email'] = $userEmail;
            $_SESSION['user_password'] = $userPassword;

            echo "<script>window.location.href='/'</script>";
            return "Usuário autenticado com sucesso!";
        } else {
            return "Não foi possível se autenticar";
        }
    }

    return "Não foi possível se autenticar";
}

function checkLogin($mysqli) {
    if (!isset($_SESSION['user_id'], $_SESSION['user_email']))
        return false;

    $userId = $_SESSION['user_id'];
    $password = $_SESSION['user_password'];

    $SQL = "
        SELECT USER_PASSWORD
        FROM VJV_USERS
        WHERE ID = ?
        LIMIT 1
    ";

    try {
        $stmt = $mysqli->prepare($SQL);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($userPassword);
            $stmt->fetch();

            return $userPassword == $password;
        }
    } catch (Exception $e) {
        return false;
    }

}

function isLogged($mysqli) {
    if (!checkLogin($mysqli)) {
        $mysqli->close();
    }
}

