<?php
/**
 * la clase AppCooontroller 
 * 
 */
abstract class AppController{

protected $_view;

/**
 * Este metodo ejecuta automaticamente a view 
 * hace una instancia de la classPDO
 * __construct()
 */
	public function __construct(){
		$this->_view = new View(new Request);
		$this->db = new classPDO();
		
	}
	/**
	 * metodo redirect indica que controlador y que fincion va usar la aplicacion 
	 * 
	 * function redirect(){
	 *  
	 * 
	 * }
	 */

	protected function redirect($url =array()){
		$path ="";
		if ($url['controller']) {
			$path .=$url['controller'];

		}
		if ($url['action']) {
			$path .='/'.$url['action'];

		}
		
		header("LOCATION:".APP_URL.$path);
	  }
}

	/*abstract function index();

	protected function loadModel($modelo){
		$modelo = $modelo."Model";
		$rutaModelo = ROOT."models".DS.$modelo.".php";


		if (is_readable($rutaModelo)) {
		 	require_once($rutaModelo);
		 	$modelo = new $modelo;
		 	return $modelo;
		 }else{
		 	throw new Exception("Error al cargar el modelo");
		 }
	}
}*/
