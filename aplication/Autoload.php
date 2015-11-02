<?php

/**
 * metodo _autoload
 * @param   $name 
 * @return un archivo 
 * funcion _autoload(){
 * 
 * }
 */
function __autoload($name){
	require_once(ROOT."libs".DS.$name.".php");
}


?>