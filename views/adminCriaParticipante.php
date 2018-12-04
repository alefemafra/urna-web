<h1>Nova conta Participante</h1>
<form method="POST" action="<?php echo BASE_URL; ?>admin/_cadastrarConta/participante">
    cpf: <input name="cpf" type="text"/><br/>
    Nome: <input name="nome" type="text"/><br/>
    E-mail: <input name="email" type="text"/><br/>
    Senha: <input name="senha" type="password"/><br/>
    Confirmar Senha: <input name="confsenha" type="password"/><br/>
    Tipo conta: <select name="tipoconta">
        <?php
            foreach($cargo as $option){
                echo "<option value='" . $option['id'] . "'>" . $option['nome'] . "</option>";
            }
        ?>
    </select>
    <input value="Entrar" type="submit"/>
</form>