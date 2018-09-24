<?php
    require_once (realpath(dirname(__FILE__)) . "/../configuration.php");
    require_once (LIBRARY_PATH . '/own/renderTemplates.php');

    if (isset($_GET['page'])) {
        renderLayoutWithContent($_GET['page']);
    }

?>

<nav id="header" class="navbar navbar-expand-lg fixed-top background-slate">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?template=home.php">
            <img width="100px" height="100%" src="img/layout/logo_alt.PNG" alt="VJV Medical Center">
        </a>

        <div class="nav-item dropdown hide-until">
            <a class="nav-link dropdown" href="#"
               id="hiddenMenu" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">

                Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="hiddenMenu">
                <a href="index.php?template=home.php" class="dropdown-item">
                    <i class="fas fa-home"></i>
                    Home
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-file-signature"></i>
                    Agendamento
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-camera"></i>
                    Galeria
                </a>

                <a href="index.php?template=contact.php" class="dropdown-item">
                    <i class="fas fa-comments"></i>
                    Fale conosco
                </a>

                <hr>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-plus"></i>
                    Cadastro
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-list-ul"></i>
                    Listagem:
                </a>
                <hr>
                <a href="#" class="dropdown-item">
                    <a class="dropdown-item" href="#">Funcionários</a>
                    <a class="dropdown-item" href="#">Agendamentos</a>
                    <a class="dropdown-item" href="#">Contatos</a>
                </a>
                <hr>
            </div>
        </div>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                Login
            </li>
        </ul>

    </div>
</nav>
