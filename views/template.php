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
        <header>Este é o topo</header>
        <a href="<?php echo BASE_URL; ?>">Home</a>|
        <a href="<?php echo BASE_URL; ?>galeria">Galeria</a>|
        <a href="<?php echo BASE_URL; ?>login/_sair">Sair</a>
        <hr/>
        <?php
        $this->loadViewInTemplate($viewName, $viewDados);
        ?>
        <script src="<?php echo BASE_URL?>/assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo BASE_URL?>/assets/js/maps.js"></script>
    </body>
</html>
