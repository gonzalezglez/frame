<?php
/**
 * clase request filtra la url 
 * class Request{
 * }
 */

class Request{

	private $_controlador;
	private $_metodo;
	private $_argumentos;
/**
 * __construct eel contructor se ejecuta y obtiene la url y la filtra 
 */
	public function __construct(){
		//zanitiza la url 



		if(isset($_GET['url'])){
			echo $_GET['url'];
			$url=filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
			$url=explode("/",$url);
			$url=array_filter($url);

  
			$this->_controlador=strtolower(array_shift($url));
			$this->_metodo=strtolower(array_shift($url));
			$this->_argumentos=$url;

		}

		
		if(!$this->_controlador){
			$this->_controlador= DEFAULT_CONTROLLER;


		}
		if (!$this->_metodo) {
			 $this->_metodo = "index";

		}
		if (!$this->_argumentos) {
			 $this->_argumentos = array();

		}
	}
/**
 * getControlador optiene el controlador 
 * @return _controlador
 */
	public function getControlador(){
		return $this->_controlador;
	

	}
	/**
	 * getMetodo para optener el metodo
	 * @return _metodo
	 */
	public function getMetodo(){
		return $this->_metodo;
		
	}
/**
 * getArgs argumetos que se usaran para dirigirce alos metodos
 * @return _argumentos
 */
	public function getArgs(){
		return $this->_argumentos;
		
	}
}