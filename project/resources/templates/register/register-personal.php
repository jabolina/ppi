<div class="title-section">Dados pessoais</div>
<div class="body-section">

    <div class="row form-group">
        <label for="nome" class="col-md-2 col-form-label">Nome:</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
    </div>

    <div class="row form-group">
        <label for="birthday" class="col-md-2 col-form-label">Nascimento:</label>
        <div class="col-md-9">
            <input type="date" onchange="verifyBirthday(this.value);" class="form-control" id="birthday" name="birthday">
        </div>
    </div>

    <div class="row form-group">
        <label class="col-md-2 col-form-label" for="civil">Estado civil:</label>
        <div class="col-md-9 register-select">
            <select class="form-control" id="civil" name="civil[]">
                <option class=" form-control" name="civil[]" value="1">Solteiro(a)</option>
                <option class=" form-control" name="civil[]" value="2">Casado(a)</option>
                <option class=" form-control" name="civil[]" value="3">Divorciado(a)</option>
                <option class=" form-control" name="civil[]" value="4">Viúvo(a)</option>
                <option class=" form-control" name="civil[]" value="5">Separado(a)</option>
            </select>
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-md-2 pt-0">Sexo:</legend>
            <div class="col-md-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="man" name="drone" value="1" />
                    <label for="man">Homem</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" id="woman" name="drone" value="2" />
                    <label for="woman">Mulher</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" id="otherSex" name="drone" value="3" checked />
                    <label for="otherSex">Outro</label>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">Cargo:</label>
        <div class="col-md-9">
            <div class="form-check">
                <input class="form-check-input" name="role[]" type="checkbox" id="medic" onchange="displaySpecialty(this);">
                <label class="form-check-label" for="medic">
                    Médico(a)
                </label>

                <br>
                <input class="form-check-input" name="role[]" type="checkbox" id="nurse">
                <label class="form-check-label" for="nurse">
                    Enfermeiro(a)
                </label>

                <br>
                <input class="form-check-input" name="role[]" type="checkbox" id="secretary">
                <label class="form-check-label" for="secretary">
                    Secretário(a)
                </label>

                <br>
                <input class="form-check-input" name="role[]" type="checkbox" id="otherJob">
                <label class="form-check-label" for="otherJob">
                    Outro
                </label>
            </div>
        </div>
    </div>

    <div id="doctorSpecialty" class="row form-group" style="display: none;">
        <label for="area" class="col-md-2 col-form-label">Especialidade:</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="area" name="specialty">
        </div>
    </div>
</div>
