<?php
require_once "environment.php";

$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/library/");
    $confg['dbname'] = 'library';
    $confg['host'] = 'localhost';
    $confg['dbuser'] = 'root';
    $confg['dbpass'] = '123456';
} else {
    define("BASE_URL", "http://meusite.com.br/");
    $confg['dbname'] = 'library';
    $confg['host'] = 'localhost';
    $confg['dbuser'] = 'root';
    $confg['dbpass'] = 'root';
}

global $db;

try {
    $db = new PDO("mysql:dbname=".$confg['dbname'].";host=".$confg['host'], $confg['dbuser'], $confg['dbpass']);
} catch(PDOException $e) {
  echo "ERRO: ".$e->getMessage();
}