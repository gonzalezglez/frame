<?php
/**
 * clase categoriasController que extends AppController
 * class categoriasController(){
 * 
 * }
 * 
 *  */
class categoriaController extends AppController
{

	/**
	 * __construct ejecuta el contructor del padre AppController 
	 * function __contruct(){
	 * 
	 * }
	 */
	public function __construct(){
		parent::__construct();
		
	}
     
     /**
      * index ejecuta el index de categorias 
      * @return string vista 
      */
	public function index(){
		$this->_view->titulo = "Listado categorias";
		$this->_view->categoria = $this->db->find('categorias', 'all');
		$this->_view->renderizar('index');
		//$tareas = $this->loadmodel("tarea");
		//$this->_view->tareas = $tareas->getTareas();
		// TITULO QUE SE VISUALZARA EN LA URL.
		//$this->_view->renderizar("index");

	}
	
     /**
      * edit para editar registro de categorias  
      * @param  int $id resive la id de  categia a editar 
      * @return string  vista 
      * function edit(){
      * 
      * 
      * }
      */
	public function edit($id = NULL){

	if ($_POST){
			if($this->db->update('categorias', $_POST)){
	           $this->redirect(
	      	          array('controller'=>'categoria','action'=>'index'
	      	          	)
	      	        );
        }else{
        	$this->redirect(
        	          array(
        	                'controller'=>'categoria',
        	                'action'=>'edit/'.$_POST['id']
        	               )
        	          );
                }

        }else{

//llena los imput en edit view
		$conditions = array(
			      'conditions'=>'id='.$id);
		$this->_view->categoria=$this->db->find(
			'categorias',
			'first',
			$conditions
		);
//llena el selet


		$this->_view->titulo="Editar categoria";
		$this->_view->renderizar('edit');
exit;

	}
}
   /**
    * add agregar categorias 
    * @return string vista
    *function add(){
    * 
    * 
    * }
    * 
    */
public function add(){
		if ($_POST){
			if($this->db->save('categorias',$_POST)){
	           $this->redirect(
	      	          array('controller'=>'categoria','action'=>'index'
	      	          	)
	      	        );
        }else{$this->redirect(
        	                  array(
        	                  	'controller'=>'categoria','action'=>'add'
        	               )
        	          );
    }
		}else{

			$this->_view->titulo="Agregar categoria";
			$this->_view->renderizar=("add");


		}
		$this->_view->renderizar('add');

	  }
/**
 * delete elimina registros de categorias 
 * @param  int $id parmetro que contiene la id del registro a eliminar
 * function delete(){
 * 
 * 
 * }
 * 
 * 
 */
    public function delete($id){
	$condition='id='.$id;
	if ($this->db->delete('categorias', $condition)) {
		$this->redirect(array('controller'=>'categoria'));
	  }
   }

}
