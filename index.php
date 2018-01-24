<?php
require_once 'autoload.php';

echo '<pre>';
//$t1 = $_REQUEST['rquest'];
//$t2 = $_SERVER["REQUEST_URI"];


//var_dump($t2);
//var_dump($_SERVER['REQUEST_METHOD']);



$ob = new News();
$ob->get();

echo '<br>';

$ob1 = new Rest();


$request = $ob1->response();


//var_dump($ob->getAllNews());
var_dump($request->getMethod());