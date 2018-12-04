<form method="POST" action="<?php echo BASE_URL; ?>admin/_criarEleicao">
    Referente ao edital: <select name="tipoconta">
        <?php
            foreach($editais as $edital){
                echo "<option value='" . $edital['id'] . "'>" . $edital['numero'] . "</option>";
            }
        ?>
    </select>
    <br/>
    Título da Eleição: <input name="titulo" type="text"/><br/>
    Quem participará?: <br/>
    <?php
        foreach($cargos as $cargo){
            echo "<input type='checkbox' name='cargo[]' value='" . $cargo['id'] . "'>" . $cargo['nome'] . "<br/>";
        }
    ?>
    <br/>
    <input value="Enviar" type="submit"/>
</form>