<?php
//***Database Connect***

//Pega do arquivo environment.php se estamos no modo local ou na web, para fazer a conexão ao banco
require 'environment.php';

//declara a variável config
$config = array();

//muda as configurações de conexão ao banco de acordo de onde está o projeto (na web ou localmente)
if(ENVIRONMENT == 'development'){
    //config servidor local
    define("BASE_URL","http://localhost/urna_eletronica/");
    $config['dbname'] = 'urna_web';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}else{
    //config servidor web
    define("BASE_URL","http://www.meusite.com.br/");
    $config['dbname'] = 'ingles_sistema';
    $config['host'] = '192.168.5.6';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '184';
}

//define o banco como global, acessível para todas as páginas
global $db;
try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
    
} catch (PDOException $ex) {
    echo "ERRO: ".$ex->getMessage();
    exit;
}

global $data;
$data = new DateTime( 'now', new DateTimeZone( 'America/Sao_Paulo') );
$data = $data->format( "Y-m-d H:i:s" );
