<h1>Listas de Editais</h1>
<?php
    foreach($editais as $edital){
        echo "<hr>";
        echo "<a href='" . BASE_URL . "admin/editarEdital/" . $edital['id'] . "'> " . $edital['numero'] . "</a><br/>";
        echo "data de publicação: " . $edital['data'] . "<br/>";
        echo "Status: " . $edital['status'] . "";
    }
?>