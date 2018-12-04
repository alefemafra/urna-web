<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/header.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/nav.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/content.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/footer.css"/>
    </head>
    <body>
        <header>Admin Template Logado</header>
        <a href="<?php echo BASE_URL; ?>admin">Home</a> | <br/>
        Votação: <a href="<?php echo BASE_URL; ?>admin/cadastrarEdital">Cadastrar Edital</a> |
        <a href="<?php echo BASE_URL; ?>admin/editarEdital">Editar Edital</a> | 
        <a href="<?php echo BASE_URL; ?>admin/criarEleicao">Criar Eleição</a> |
        <a href="<?php echo BASE_URL; ?>admin/editarEleicao">Editar Eleição</a> <br/>
        Contas: <a href="<?php echo BASE_URL; ?>admin/cadastrarCargo">Cadastrar Cargo</a> | 
        <a href="<?php echo BASE_URL; ?>admin/cadastrarConta/participante">Cadastrar Novo Participante</a> | 
        <a href="<?php echo BASE_URL; ?>admin/cadastrarConta/sistema">Cadastrar Novo Sistema</a> | <br/>
        Login atual: <a href="<?php echo BASE_URL; ?>admin/login">Login</a> | 
        <a href="<?php echo BASE_URL; ?>admin/_sairAdmin">Sair</a>
        <hr/>
        <?php
        $this->loadViewInTemplate($viewName, $viewDados);
        ?>
        <script src="<?php echo BASE_URL?>/assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo BASE_URL?>/assets/js/maps.js"></script>
    </body>
</html>
