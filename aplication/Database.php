<?php
/**
 * 
 * Esta clase inpelmenta metodos para hacer la conexion ala base de datos 
 * y pra hacer consultas.
 * clase ClassPDO{}
 * 
 */

class ClassPDO{
	public $connection;
	private $dsn;
	private $drive;
	private $host;
	private $database;
	private $username;
	private $password;
	public $result;
	public $lastInsertId;
	public $numberRows;
	/**
	 * El constructor carga los prametros para despues usar esos parametros para hacer la conexion  
	 * _construc(){
	 * 
	 * }
	 */

	public function __construct($drive='mysql', $host ='localhost', $database = 'gestion', $username='root',$password=''){
		$this->drive=$drive;
		$this->host=$host;
		$this->database=$database;
		$this->username=$username;
		$this->password=$password;
		$this->connection();
	}
	/**
	 * El metodo connection nos proporciona la conexion ala base de datos.
	 * 
	 * @return conexion;
	 * function connection(){
	 * 
	 * 
	 * }
	 */
	public function connection(){
		$this->dsn = $this->drive.':host='.$this->host.';dbname='.$this->database;
		try{
			$this->connection = new PDO(
				$this->dsn,
				$this->username,
				$this->password
			);
			$this->connection->setAttribute(
				PDO::ATTR_ERRMODE,//Clase estatico que contiene PDO
				PDO::ERRMODE_EXCEPTION
			);
		}catch(PDOException $e){
			echo "ERROR:".$e->getMessage();
			die();

		}
	}
	/**
	 * Metodo find este metodo buscara registro 
	 * 
	 * function find(){
	 * 
	 * 
	 * }
	 */

	public function find($table = NULL, $query = NULL, $options = array()){
		$fields = '*';
		$parameters ='';
		if (!empty($options['fields'])) {
			$fields = $options['fields'];

		}
		if (!empty($options['conditions'])) {
			$parameters .= ' WHERE '.$options['conditions'];
		}
		if (!empty($options['group'])) {
			$parameters .= ' GROUP '.$options['group'];
		}
		if (!empty($options['order'])) {
			$parameters .= ' ORDER BY '.$options['order'];
		}

		if (!empty($options['limit'])) {
			$parameters .= ' LIMIT '.$options['limit'];
		}


		switch ($query) {
			case 'all':
		 		$sql = "SELECT $fields FROM $table".' '.$parameters;
		 		$this->result = $this->connection->query($sql);
		 	   


		 		break;
				case 'count':
				$sql = "SELECT COUNT(*) FROM $table".' '.$parameters;
                $result = $this->connection->query($sql);
		        $this->result = $result->fetch();
		        break;
				case 'first':
				$sql = "SELECT $fields FROM ".$table.' '.$parameters;
				$result = $this->connection->query($sql);
				$this->result = $result->fetch();

				break;
			default:
				$sql = "SELECT $fields FROM $table".' '.$parameters;
				$this->result = $this->connection->query($sql);
				break;
		}
		return $this->result;

	}

/**
 * metodo save se usara para gurar los registros en la base de datos.
 * @param  array $table contiene la tabla o tablas que se buscara en la base de datos.  
 * @param  array  $data  datos que se buscara en la base de datos.
 * @return array  $resul retorna el resultado de la consulta .
 */
	public function save($table = null, $data = array()){
		$sql = "SELECT * FROM $table";
		$result = $this->connection->query($sql);

		for ($i=0; $i < $result->columnCount(); $i++) {
			$meta = $result->getColumnMeta($i);
			$fields[$meta['name']]=null;
		}
        $fieldsToSave="id";
		$valueToSave="NULL";

		foreach ($data as $key => $value) {
			if(array_key_exists($key, $fields)){
				$fieldsToSave .= ", ".$key;
				$valueToSave  .= ", "."\"$value\"";
			}
			}

		$sql = "INSERT INTO $table ($fieldsToSave)VALUES($valueToSave);";
		$this->result = $this->connection->query($sql);
        $this->lastInsertId = $this->connection->lastInsertId();
      return $this->result;

	}


/**
 * update este metodo se usa para actucalizar registro  
 * @param  string $table datos de tabla a actualizar 
 * @param  array  $data  conjuntos de datos que compondran la consulta 
 * @return boleano $resul resultado de la consilta         
 */
	public function update($table = null, $data = array()){
		$sql = "SELECT * FROM $table";
		$result =$this->connection->query($sql);

		for ($i=0; $i < $result->columnCount(); $i++){
			$meta = $result->getColumnMeta($i);
			$fields[$meta['name']]=null;
		}
		if (array_key_exists('id', $data)) {
			$fieldsToSave = '';
			$id = $data['id'];
			unset($data['id']);

			foreach ($data as $key => $value) {
				if (array_key_exists($key, $fields)) {
					$fieldsToSave .=$key.'='."\"$value\", ";
					# code...
				}
			}
			$fieldsToSave = substr_replace($fieldsToSave, ' ', -2);
			$sql = "UPDATE $table SET $fieldsToSave WHERE $table.id=$id;";
		}
		$this->result = $this->connection->query($sql);
		return $this->result;

	}

/**
 * delete metodo elimina registro 
 * @param  string $table   tabla en la cual se ara la eliminacion de registro
 * @param  string $condition conjunto de datos que conformaran el sql 
 * @return boleano  $resul        retorna un resultado de si la consulta fue exitosa o no 
 */
	public function delete($table = null, $condition = NULL){
		$sql = "DELETE FROM $table WHERE $condition".";";
        $this->result = $this->connection->query($sql);
        $this->numberRows = $this->result->rowCount();

		return $this->result;

	}

}
/**
 * instancia de la classPDO
 * @var ClassPDO
 */
$db = new ClassPDO;
