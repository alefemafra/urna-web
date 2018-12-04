<h1>Cadastrar Edital</h1>
<form method="POST" action="<?php echo BASE_URL; ?>admin/_cadastrarEdital" enctype="multipart/form-data">
    Número do edital: <input name="numero" type="text"/><br/>
    Arquivo: <input name="arquivo" type="file"/><br/>
    <input value="Cadastrar" type="submit"/>
</form>