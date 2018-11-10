<?php
    require_once (realpath(dirname(__FILE__)) . "/../configuration.php");
    require_once (LIBRARY_PATH . '/own/renderTemplates.php');
    require_once (TEMPLATES_PATH . '/register/save-employee.php');
?>

<script type="text/javascript" src="js/register.js"></script>

<div class="generic-card" >


    <form action="index.php?template=register-root.php" method="post" class="style-forms">

        <?php
            renderLayoutWithoutContent("register/register-personal.php");
            renderLayoutWithoutContent("register/register-document.php");
            renderLayoutWithoutContent("register/register-address.php");
        ?>

        <input type="submit" class="btn btn-green" value="Enviar">
        <input type="reset" class="btn btn-orange" value="Cancelar">
    </form>
</div>