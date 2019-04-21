<?php
require_once "environment.php";

$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/library/");
    $confg['host'] = 'sql10.freesqldatabase.com';
    $confg['dbname'] = 'sql10288962';
    $confg['dbuser'] = 'sql10288962';
    $confg['dbpass'] = 'JiX8JQTLxV';
} else {
    define("BASE_URL", "https://applibrary-test.herokuapp.com/");
    $confg['host'] = 'remotemysql.com';
    $confg['dbname'] = 'EhtOxG1jbI';
    $confg['dbuser'] = 'EhtOxG1jbI';
    $confg['dbpass'] = 'yym7x4XfT6';
}

global $db;

try {
    $db = new PDO("mysql:dbname=".$confg['dbname'].";host=".$confg['host'], $confg['dbuser'], $confg['dbpass']);
} catch(PDOException $e) {
  echo "ERRO: ".$e->getMessage();
}