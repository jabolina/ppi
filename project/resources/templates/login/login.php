<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (LIBRARY_PATH . '/own/database-connection.php');
require_once (LIBRARY_PATH . '/own/data-management.php');
require_once ("authenticate.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = parseData($_POST["emailLogin"]);
    $userPassword = parseData($_POST["passLogin"]);

    $message = "";

    try {
        $conn = databaseConnect();
        $message = loginUser($userEmail, $userPassword, $conn);
    } catch (Exception $e) {
        $message = $e.$message;
    }

    if ($message != "") {
        echo "<script>displayLoginStatus($message)</script>";
    }
}
?>

<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <img class="img-fluid mx-auto d-block" src="img/layout/logo-white.JPG" height="105.6px" width="233.1px">

                <button type="button" style="margin-left: 0;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="login-status-alert" class="alert alert-danger" role="alert" style="display: none;"></div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="emailLogin">Email</label>
                        <input type="email" class="form-control" id="emailLogin" name="emailLogin">
                    </div>

                    <div class="form-group">
                        <label for="passLogin">Senha</label>
                        <input type="password" class="form-control" id="passLogin" name="passLogin">
                    </div>

                    <input type="submit"  class="btn btn-green btn-block" value="Login">
                    <input type="reset" class="btn btn-orange btn-block" data-dismiss="modal" value="Fechar">
                </form>
            </div>
        </div>

    </div>
</div>