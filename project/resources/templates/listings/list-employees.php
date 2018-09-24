<?php
$fakeData=array(
    "Nome"=> array("Jose Augusto Bolina", "Vinicius Gonzaga", "Vinicius Scavoni"),
    "Sexo"=> array("Outro", "Homem", "Homem"),
    "Cargo"=> array("Secretário", "Médico", "Médico"),
    "RG"=> array("MG19283-12", "SP19230-12", "MG019823-12"),
    "Logradouro"=> array("Santa Edvirges", "Casinha doce", "Mar morto"),
    "Bairro"=> array("Santa Monica", "Tibery", "Saraiva"),
    "Cidade"=> array("Canapolis", "Patos", "Bebedouro")
);
?>

<div class="container-fluid">
    <div class="title-section">Listagem do funcionários</div>

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
