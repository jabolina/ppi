<div class="scheduling">
    <form class="scheduling-form">

        <div class="title-section">Dados da consulta</div>
        <div class="body-section">
            <div class="form-group">
                <label for="spec-select">Especialidade:</label>
                <select class="form-control" name="spec" id="spec-select">
                    <option value="0">selecione</option>
                    <option value="0">Alergia e Imunologia</option>
                    <option value="1">Cardiologia</option>
                    <option value="2">Clínica Médica</option>
                    <option value="3">Endocrinologia</option>
                    <option value="4">Urologia</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dr-select">Médico:</label>
                <select class="form-control" name="dr" id="dr-select">
                    <option value="0">selecione</option>
                    <option value="0">Edson Pereira Lopes</option>
                    <option value="1">Heleno Melo De Araujo</option>
                    <option value="2">Pdero Santos</option>
                    <option value="3">Aluísio Costa Da Silva</option>
                    <option value="4">Ivoneide Maria Cavalcanti</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data-input">Data:</label>
                <input class="form-control" type="date" name="data" id="data-input">
            </div>

            <div class="form-group">
                <label for="hour-select">Horário</label>
                <select class="form-control" name="hour" id="hour-select">
                    <option value="0">selecione</option>
                    <option value="0">8:00</option>
                    <option value="0">9:00</option>
                    <option value="0">10:00</option>
                    <option value="0">11:00</option>
                    <option value="0">12:00</option>
                    <option value="0">13:00</option>
                    <option value="0">14:00</option>
                    <option value="0">15:00</option>
                    <option value="0">16:00</option>
                    <option value="0">17:00</option>
                </select>
            </div>
        </div>
  
        <div class="title-section">Dados de contato</div>
        <div class="body-section">
            <div class="form-group">
                <label for="pacient-name">Nome:</label>
                <input type="text" name="pacient-name" id="pacient-name" placeholder="">
            </div>

            <div class="form-group">
                <label for="pacient-phone">Telefone:</label>
                <input type="text" id="pacient-phone" name="pacient-phone" placeholder="(XX) XXXXX-XXXX" maxlength="11">
            </div>

            <div class="form-group">
                <label for="pacient-mail">Email:</label>
                <input type="email" id="pacient-mail" name="pacient-mail" placeholder="">
            </div>

            <input type="submit" class="btn btn-green" value="Agendar">
            <input type="reset" class="btn btn-orange" value="Cancelar">
        </div>
    </form>
</div>