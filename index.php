<?php
session_start();
require 'config.php';

//ao instanciar uma classe, o php vai procurar qual pasta a classe foi criada e dar um require nela.
spl_autoload_register(function($class){ 
    if(file_exists('controllers/'.$class.'.php')){
        require 'controllers/'.$class.'.php';
    }else if(file_exists('models/'.$class.'.php')){
        require 'models/'.$class.'.php';
    }else if(file_exists('core/'.$class.'.php')){
        require 'core/'.$class.'.php';
    }
});

$core = new Core();
$core->run();