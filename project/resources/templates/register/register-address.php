<div class="title-section">Endereço</div>
<div class="body-section">

    <div class="row form-group">
        <label for="cep" class="col-md-2 col-form-label">CEP:</label>
        <div class="col-md-9">
            <input type="text" maxlength="8" class="form-control" id="cep" name="cep">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-2">Tipo:</div>
        <div class="col-md-9">
            <div class="form-check">
                <input class="form-check-input" name="streetType[]" type="checkbox" id="street">
                <label class="form-check-label" for="street">Rua</label>

                <br>
                <input class="form-check-input" name="streetType[]" type="checkbox" id="avenue">
                <label class="form-check-label" for="avenue">Avenida</label>

                <br>
                <input class="form-check-input" name="streetType[]" type="checkbox" id="praca">
                <label class="form-check-label" for="praca">Praça</label>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <label for="streetName" class="col-md-2 col-form-label">Logradouro:</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="streetName" name="streetName">
        </div>
    </div>

    <div class="row form-group">
        <label for="numberHouse" class="col-md-2 col-form-label">Número:</label>
        <div class="col-md-9">
            <input type="number" class="form-control" id="numberHouse" name="numberHouse">
        </div>
    </div>

    <div class="row form-group">
        <label for="complement" class="col-md-2 col-form-label">Complemento:</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="complement" name="complement">
        </div>
    </div>

    <div class="row form-group">
        <label for="neighborhood" class="col-md-2 col-form-label">Bairro:</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="neighborhood" name="neighborhood">
        </div>
    </div>

    <div class="row form-group">
        <label for="cidade" class="col-md-2 col-form-label">Cidade:</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="cidade" name="cidade">
        </div>
    </div>

    <div class="row form-group">
        <label for="state" class="col-md-2 col-form-label">Estado:</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="state" name="state">
        </div>
    </div>
</div>