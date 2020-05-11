<?php 
// i put buffering , when its send a lot of request at the same time and if i dont have it when i use 
// redirection (header()) i got in output headers being sent or ..
ob_start();


session_start();

// setup my path so i can use my files easier when im including requiring or using it with fcts or displaying img
// want to make sure that whatever path we're using is compatible with mac windows or lunix
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null: define("TEMPLATE_FRONT", __DIR__ . DS . "templates/templates/front");
defined("TEMPLATE_BACK") ? null: define("TEMPLATE_BACK", __DIR__ . DS . "templates/templates/back");

defined("DB_HOST") ? null: define("DB_HOST","localhost");
defined("DB_USER") ? null: define("DB_USER","root");

defined("DB_PASS") ? null: define("DB_PASS","root");
defined("DB_NAME") ? null: define("DB_NAME","ecommerce");

$connecttion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
require_once("functions.php");

// echo TEMPLATE_BACK;
?>