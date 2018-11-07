<?php
require_once (realpath(dirname(__FILE__)) . "/../configuration.php");
require_once (LIBRARY_PATH . '/own/database-connection.php');
require_once (TEMPLATES_PATH . '/login/authenticate.php');

$conn = null;

try {
    $conn = databaseConnect();
} catch (Exception $e) {}

?>

<div id="sidebar" class="sidebar background-white">
    <ul class="list-unstyled components">
        <li class="active">
            <a href="index.php?template=home.php">
                <i class="fas fa-home"></i>
                Home
            </a>
        </li>

        <li>
            <a href="index.php?template=scheduling.php">
                <i class="fas fa-file-signature"></i>
                Agendamento
            </a>
        </li>

        <li>
            <a href="index.php?template=gallery.php">
                <i class="fas fa-camera"></i>
                Galeria
            </a>
        </li>

        <li>
            <a href="index.php?template=contact/contact.php">
                <i class="fas fa-comments"></i>
                Fale conosco
            </a>
        </li>
    </ul>

    <?php
    try {
        if ($conn != null && checkLogin($conn)) {
            echo '<ul class="list-unstyled components">' .
        '<li>' .
            '<a href="index.php?template=register-root.php">'.
                '<i class="fas fa-user-plus"></i>'.
                ' Cadastro' .
            '</a>'.
        '</li>'.
        '<li>' .
            '<a href="#listings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">' .
                '<i class="fas fa-list-ul"></i>' .
                ' Listagem' .
            '</a>' .
            '<ul class="collapse list-unstyled" id="listings">' .
                '<li>' .
                    '<a href="index.php?template=listings/list-employees.php">Funcionários</a>' .
                '</li>'.
                '<li>' .
                    '<a href="index.php?template=listings/list-schedules.php">Agendamentos</a>' .
                '</li>' .
                '<li>' .
                    '<a href="index.php?template=listings/list-contacts.php">Contatos</a>' .
                '</li>' .
            '</ul>' .
        '</li>' .
    '</ul>';
        }
    } catch (Exception $e) {}
    ?>
</div>
