<h1>Listas de Eleições</h1>
<?php
    foreach($eleicoes as $eleicao){
        echo "<hr>";
        echo "<a href='" . BASE_URL . "inscrever/_inscreverEleicao/" . $eleicao['id'] . "'> " . $eleicao['titulo'] . "</a><br/>";
        echo "Total de participantes: " . $eleicao['participantes'] . "<br/>";
        echo "Status: " . $eleicao['status'] . "";
    }
?>