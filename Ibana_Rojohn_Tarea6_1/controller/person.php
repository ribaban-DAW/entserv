<?php 

require_once 'model/person.php';

class personController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->page_title = '';
		$this->view = 'list_person';
		$this->personObj = new Person();
	}

	public function list() {
		$this->page_title = 'Listado de personas';
		return $this->personObj->getPersons();
	}

	public function create($id = null) {
		$this->page_title = 'Crear persona';
		$this->view = 'create_person';
		if(isset($_GET["id"])) {
			$id = $_GET["id"];
		}

		return $this->personObj->getPersonById($id);
	}

	public function edit($id = null) {
		$this->page_title = 'Editar persona';
		$this->view = 'edit_person';
		if(isset($_GET["id"])) {
			$id = $_GET["id"];
		}

		return $this->personObj->getPersonById($id);
	}

	public function save() {
		$this->page_title = 'Editar persona';
		$this->view = 'edit_person';
		$id = $this->personObj->save($_POST);
		$result = $this->personObj->getPersonById($id);
		$_GET["response"] = true;

		return $result;
	}

	public function confirmDelete() {
		$this->page_title = 'Eliminar persona';
		$this->view = 'confirm_delete_person';

		return $this->personObj->getPersonById($_GET["id"]);
	}

	public function delete() {
		$this->page_title = 'Listado de personas';
		$this->view = 'delete_person';

		return $this->personObj->deletePersonById($_POST["id"]);
	}
}

?>
