<?php
$fakeData=array(
    "Médico"=> array("Jose Augusto Bolina", "Vinicius Gonzaga", "Vinicius Scavoni"),
    "Especialidade"=> array("Ficar quieto", "Amizade", "Amizade"),
    "Data"=> array("12/09/2019", "08/03/2019", "23/02/2019"),
    "Horário"=> array("09:00", "14:45", "18:00"),
    "Nome"=> array("Jose Augusto Bolina", "Vinicius Gonzaga", "Vinicius Scavoni"),
    "Telefone"=> array("553492368376", "553497586412", "553486748623")
);
?>

<div class="container-fluid">
    <div class="title-section">Listagem dos agendamentos</div>

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
