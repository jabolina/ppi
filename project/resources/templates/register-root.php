<?php
    require_once (realpath(dirname(__FILE__)) . "/../configuration.php");
    require_once (LIBRARY_PATH . '/own/renderTemplates.php');
?>

<script type="text/javascript" src="js/register.js"></script>

<div class="container-fluid">


    <form>

        <?php
            renderLayoutWithoutContent("register/register-personal.php");
            renderLayoutWithoutContent("register/register-document.php");
            renderLayoutWithoutContent("register/register-address.php");
        ?>


        <input type="submit" class="btn btn-green" value="Enviar">
        <input type="reset" class="btn btn-orange" value="Cancelar">
    </form>
</div>