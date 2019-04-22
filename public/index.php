<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", "On");

require '../config/config.php';

spl_autoload_register( function($class) {

  if (file_exists('../src/controllers/'.$class.'.php')) {
    require '../src/controllers/'.$class.'.php';

  } elseif (file_exists('../src/models/'.$class.'.php')) {
    require '../src/models/'.$class.'.php';

  } elseif (file_exists('../src/core/'.$class.'.php')) {
    require '../src/core/'.$class.'.php';

  }

});

$core = new Core();
$core->run();
