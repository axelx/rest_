<?php

/*
spl_autoload_register(function($name) {
    require $name.'.php';
});*/



function autoLoader($name) {
    require_once 'classes/'.$name.'.php';
}

spl_autoload_register('autoLoader');


