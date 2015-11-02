<?php
/**
 * clase TareaModel es el moderlo de la aplicacion 
 * class TareaModel{
 * 
 * }
 */
class TareaModel extends AppModel
{
	/**
	 * __construct cargar el constructor del padre
	 * function __construct(){
	 * 
	 * }
	 */
	public function __construct(){
		parent::__construct();
	}
	/**
	 * optiene las tareas de la basde de datos
	 * function getTareas(){
	 * 
	 * }
	 */

	public function getTareas(){
		$tareas = $this->_db->query("SELECT * FROM tareas");
		
		return $tareas->fetchall();
	}
}
