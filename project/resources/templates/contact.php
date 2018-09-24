<div class="container-fluid">
    <div class="title-section">Envie sua mensagem</div>
    <div class="body-section">

        <form>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="motive">Motivo</label>
                <select class="form-control" id="motive">
                    <option value="1">Reclamação</option>
                    <option value="2">Sugestão</option>
                    <option value="3">Elogio</option>
                    <option value="4">Dúvida</option>
                    <option value="5">Outro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Mensagem</label>
                <textarea name="message"></textarea>
            </div>

            <input type="submit" class="btn btn-green" value="Enviar">
            <input type="reset" class="btn btn-orange" value="Cancelar">

        </form>
    </div>
</div>