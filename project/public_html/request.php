<?php
require_once(realpath(dirname(__FILE__)) . "/../resources/configuration.php");
require_once(LIBRARY_PATH . "/own/renderTemplates.php");

if (isset($_GET['template'])) {
    renderLayoutWithoutContent($_GET['template']);
} else if (isset($_POST['template'])) {
    renderLayoutWithoutContent($_GET['template']);
}
