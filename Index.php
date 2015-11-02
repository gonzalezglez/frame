<?php


/**
 * Linux
 * Windows
 * @author gerardo Gonzalez
 * 
 *  */
/**
 *se hace referencia de los directorios
 */
 
error_reporting(0);
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)) . DS);
define("APP_PATH", ROOT . "aplication" . DS);
define("LIB_PATH", ROOT . "libs" . DS);

/**
 * Se llaman los archivos necesarios para el correcto funciona miento del framework
 */

require_once(APP_PATH . "Config.php");
require_once(APP_PATH . "Request.php");
require_once(APP_PATH . "Bootstrap.php");
require_once(APP_PATH . "Controller.php");
require_once(APP_PATH . "Model.php");
require_once(APP_PATH . "view.php");
require_once(APP_PATH . "Database.php");
require_once(APP_PATH . "Autoload.php");

//echo "<pre>"; print_r(get_required_files());

//Comprobar que los archivos se estan cargando correctamente
//echo "<pre>";print_r(get_required_files());
/*$r= new Request();
echo $r->getcontrolador()."<br>";
echo $r->getMetodo()."<pre>";
print_r($r->getArgs());*/

/**
 * se llama al obbgeto Bootsrap
 */
try{
	Bootstrap::run(new Request);
}catch(Exception $e){
	echo $e->getMessage();
}



/*define("APP_FOLDER", "gestion");
define("APP_URL", "http://".$_SERVER['SERVER_NAME']."/".APP_FOLDER."/");
define("APP_URL_CSS", APP_URL."public/css/");
define("APP_URL_IMG", APP_URL."public/img/");
define("APP_URL_JS",  APP_URL."public/js/");

require_once(APP_PATH . "config.php");
require_once(LIB_PATH . "PDO.php");
require_once(LIB_PATH . "Authorization.php");
require_once(LIB_PATH . "Password.php");
require_once(LIB_PATH . "Validations.php");


if (isset($_GET['url'])) {
	$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
	$url = explode("/", $url);
	$url = array_filter($url);

	$controller = array_shift($url);
	$action = array_shift($url);
	$args = $url;
}

if(!isset($controller)){
	$controller = "tareas";
}

if (!isset($action)) {
	$action = "index";
}

if(empty($args)){
	$args = array(0 => null);
}

$path =   ROOT."controllers". DS .$controller."Controller.php";
$view =   ROOT."views". DS .$controller. DS .$action.".php";
$header = ROOT."views". DS ."layouts". DS ."default". DS ."header.php";
$footer = ROOT."views".DS."layouts". DS ."default". DS. "footer.php";

if($action=="login"){
	$header = ROOT."views". DS ."layouts". DS ."login". DS ."header.php";
	$footer = ROOT."views".DS."layouts". DS ."login". DS. "footer.php";
}else{
	Authorization::logged();
}

if(file_exists($path)){
	include_once($path);
	$ob = new $controller();
	$var = $ob->$action($args);	
	
	if(file_exists($view)){
		include_once($header);
		include_once($view);
		include_once($footer);
	}else{
		echo "La vista para la acción $action no existe";
	}	
}else{
	echo "El controlador $controller no existe";
}*/