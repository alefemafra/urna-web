<h1>Edita edital <?php echo $edital['numero']; ?></h1>
<form method="POST" action="<?php echo BASE_URL; ?>admin/_editarEdital/<?php echo $edital['id']; ?>">
    Numero: <input name="numero" type="text" value="<?php echo $edital['numero']; ?>"/><br/>
    Status: 
    <select name="status">
        <option value="espera">Espera</option>
        <option value="publicado">Publicado</option>
    </select><br/>
    <input value="Enviar" type="submit"/>
</form>