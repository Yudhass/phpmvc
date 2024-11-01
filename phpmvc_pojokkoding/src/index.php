<?php 


if(!session_id()) session_start();

include_once '../src/config/default.php';
include_once '../src/core/Autoload.php';

$routes = new Routes();
$routes->run();

?>