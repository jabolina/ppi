

<div class="scheduling">
    <div>
        <div class="title-section">agende sua consulta</div>

        <form class="scheduling-form">

            <h5>dados da consulta</h5>
            <div></div>

            <label for="spec">especialidade:</label>
            <select name="spec" id="spec-select">
                <option value="0">selecione</option>
                <option value="0">Alergia e Imunologia</option>
                <option value="1">Cardiologia</option>
                <option value="2">Clínica Médica</option>
                <option value="3">Endocrinologia</option>
                <option value="4">Urologia</option>
            </select>

            <label for="dr">médico:</label>
            <select name="dr" id="dr-select">
                <option value="0">selecione</option>
                <option value="0">Edson Pereira Lopes</option>
                <option value="1">Heleno Melo De Araujo</option>
                <option value="2">Pdero Santos</option>
                <option value="3">Aluísio Costa Da Silva</option>
                <option value="4">Ivoneide Maria Cavalcanti</option>
            </select>

            <label for="data">data:</label>
            <input type="date" name="data" id="data-input">

            <label for="hour">horário</label>
            <select name="hour" id="hour-select">
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

            <hr>
            <hr>

            <h5>dados de contato</h5>
            <div></div>

            <label for="pacient-name">nome:</label>
            <input type="text" name="pacient-name" placeholder="seu nome...">

            <label for="pacient-phone">telefone:</label>
            <input type="text" name="pacient-phone" placeholder="seu telefone..." maxlength="11">

            <label for="pacient-mail">email:</label>
            <input type="email" name="pacient-mail" placeholder="seu e-mail...">

            <hr>
            <hr>

            <button class="btn btn-green">agendar</button>
            <button class="btn btn-orange">cancelar</button>
        </form>
    </div>
</div>