<?php
require_once (realpath(dirname(__FILE__)) . "/../../configuration.php");
require_once (TEMPLATES_PATH . "/contact/save-contact.php");
?>

<div class="generic-card contact-card">
    <div class="title-section">Envie sua mensagem</div>
    <div class="body-section">

        <form action="index.php?template=contact/contact.php" method="post">

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" placeholder="Nos diga seu nome!" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" placeholder="Retornaremos seu contato neste email :)" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="reason">Motivo</label>
                <select class="form-control" name="reason" id="reason">
                    <option value="1">Reclamação</option>
                    <option value="2">Sugestão</option>
                    <option value="3">Elogio</option>
                    <option value="4">Dúvida</option>
                    <option value="5">Outro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Mensagem</label>
                <textarea name="message" placeholder="O que você gostaria de nos dizer?" id="message"></textarea>
            </div>

            <input type="submit" class="btn btn-green" value="Enviar">
            <input type="reset" class="btn btn-orange" value="Limpar">

        </form>
    </div>
</div>