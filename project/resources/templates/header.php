<?php
    require_once (realpath(dirname(__FILE__)) . "/../configuration.php");
    require_once (LIBRARY_PATH . '/own/renderTemplates.php');

    if (isset($_GET['page'])) {
        renderLayoutWithContent($_GET['page']);
    }

?>

<nav id="header" class="navbar navbar-expand-lg fixed-top background-lazuli">
    <div class="container-fluid">
        <a class="navbar-brand" href="?page=home.php">
            <img src="<?php echo IMAGES_PATH . '/layout/transparent-logo.png' ?>" alt="VJV Medical Center">
        </a>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    Login
                </li>
            </ul>
        </div>
    </div>
</nav>
