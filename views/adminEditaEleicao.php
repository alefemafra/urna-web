<h1>Edita eleição <?php echo $eleicoes['titulo']; ?></h1>
<form method="POST" action="<?php echo BASE_URL; ?>admin/_editarEleicao/<?php echo $eleicoes['id']; ?>">
    titulo: <input name="titulo" type="text" value="<?php echo $eleicoes['titulo']; ?>"/><br/>
    Status: 
    <select name="status">
        <option value="espera">Espera</option>
        <option value="publicado">Publicado</option>
    </select><br/>
    <input value="Enviar" type="submit"/>
</form>