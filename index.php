<?php
require_once 'autoload.php';

echo '<pre>';

/*

$ob1 = new Rest();
$request = $ob1->response();
var_dump($request->selectMethod());


*/


// Тестировал через REST Client PHPStorm
//{"auth":{"user":"user1","password":"pass1"},"data":{"title":"News add__23-25","content":"content add__23-225"}}





$request = (new Rest())->response();
var_dump($request->selectMethod());



