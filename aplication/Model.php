
<?php
/**
 * AppModel uatancia la clase Database en donde se hace la conexion y consultas 
 * class AppModel{
 * 
 * }
 */
class AppModel
{
	protected $_db;

	public function __construct(){
		$this->_db = new Database();
		
	}
}

