<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
?>

<div class="generic-card scheduling-card">
    <?php
        require_once (TEMPLATES_PATH . '/schedule/save-schedule.php');
    ?>

    <div class="scheduling">
        <div id="schedule-status-alert" class="alert alert-danger" role="alert" style="display: none;"></div>
        <form class="style-forms" action="index.php?template=schedule/scheduling.php" method="post">

            <div class="title-section">Dados da consulta</div>
            <div class="scheduling-form">
                <div class="form-group">
                    <label for="spec-select">Especialidade</label>
                    <select class="form-control" name="spec[]" id="spec-select" onchange="listDoctors(this.value)">
                        <option value="0" name="spec[]">selecione</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dr-select">Médico</label>
                    <select class="form-control" name="dr[]" id="dr-select">
                        <option value="-1" name="dr[]">selecione</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="data-input">Data</label>
                    <input class="form-control" type="date" name="data" id="data-input" onchange="verifyDate(this.value)">
                </div>

                <div class="form-group">
                    <label for="hour-select">Horário</label>
                    <select class="form-control" name="hour[]" id="hour-select">
                        <option name="hour[]" value="0">selecione</option>
                        <option name="hour[]" value="08:00">8:00</option>
                        <option name="hour[]" value="09:00">9:00</option>
                        <option name="hour[]" value="10:00">10:00</option>
                        <option name="hour[]" value="11:00">11:00</option>
                        <option name="hour[]" value="12:00">12:00</option>
                        <option name="hour[]" value="13:00">13:00</option>
                        <option name="hour[]" value="14:00">14:00</option>
                        <option name="hour[]" value="15:00">15:00</option>
                        <option name="hour[]" value="16:00">16:00</option>
                        <option name="hour[]" value="17:00">17:00</option>
                    </select>
                </div>
            </div>

            <div class="title-section">Dados de contato</div>
            <div class="scheduling-form">
                <div class="form-group">
                    <label for="patient-name">Nome</label>
                    <input type="text" class="form-control" name="patient-name" id="patient-name" placeholder="">
                </div>

                <div class="form-group">
                    <label for="patient-phone">Telefone</label>
                    <input type="text" class="form-control" id="patient-phone" name="patient-phone" maxlength="11">
                </div>

                <div class="form-group">
                    <label for="patient-mail">Email</label>
                    <input type="email" class="form-control" id="patient-mail" name="patient-mail" placeholder="">
                </div>
            </div>

            <input type="submit" class="btn btn-green" id="schedule-submit-btn" value="Agendar">
            <input type="reset" class="btn btn-orange" value="Cancelar">
        </form>
    </div>
</div>

<script type="application/javascript" src="js/schedule.js"></script>