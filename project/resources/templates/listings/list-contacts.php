<?php
$fakeData=array(
    "Nome"=> array("Jose Augusto Bolina", "Vinicius Gonzaga", "Vinicius Scavoni"),
    "Email"=> array("joseaugusto.bolina@hotmail.com", "vinicius.gonzaga@hotmail.com", "vinicius.scavoni@hotmail.com"),
    "Motivo"=> array("reclamacao", "sugestao", "elogio"),
    "Mensagem"=> array("Credo que delicia", "Devia ter mais comida", "O banheiro é limpo")
);
?>

<div class="container-fluid">
    <div class="title-section">Listagem de contatos recebidos</div>

    <div class="body-section">
        <?php
        echo '<table class="table table-striped table-hover">';
        $cols = array_keys($fakeData);

        echo '<tr>';
        foreach ($cols as $col) echo '<th>' . $col . '</th>';
        echo '</tr>';

        foreach ($fakeData[$cols[0]] as $i => $null) {
            echo '<tr>';
            foreach ($cols as $col) echo '<td>' . $fakeData[$col][$i] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        ?>
    </div>
</div>
