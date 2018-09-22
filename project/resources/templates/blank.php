<?php
require_once (realpath(dirname(__FILE__)) . "/../configuration.php");
require_once (LIBRARY_PATH . '/own/renderTemplates.php');

if (isset($_GET['page'])) {
    print_r($_GET['page']);
    renderLayoutWithContent($_GET['page']);
}
