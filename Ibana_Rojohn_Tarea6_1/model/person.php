<?php 

class Person {
	private $table = "persona";
	private $connection;

	public function __construct() {}

	public function getConnection() {
		$db = new Db();
		$this->connection = $db->connection;
	}

	public function getPersons() {
		$this->getConnection();

		$select = " SELECT *";
		$from = " FROM $this->table";
		$sql = $select . $from;

		$stmt = $this->connection->query($sql);

		return $stmt->fetchAll();
	}

	public function getPersonById($id) {
		if (!$id) {
			return false;
		}

		$this->getConnection();

		$select = " SELECT *";
		$from = " FROM $this->table";
		$where = " WHERE id = :id";
		$sql = $select . $from . $where;

		$stmt = $this->connection->prepare($sql);
		$stmt->execute([
			":id" => $id,
		]);

		return $stmt->fetch();
	}

	public function save($param){
		$this->getConnection();

		/* Set default values */
		$nombre = $nif = "";

		/* Check if exists */
		$exists = false;
		if (isset($param["id"]) and $param["id"] !='') {
			$actualPerson = $this->getPersonById($param["id"]);
			if (isset($actualPerson["id"])) {
				$exists = true;	
				/* Actual values */
				$id = $actualPerson["id"];
				$nombre = $actualPerson["nombre"];
				$nif = $actualPerson["nif"];
			}
		}

		/* Received values */
		if (isset($param["nombre"])) {
			$nombre = $param["nombre"];
		}
		if (isset($param["nif"])) {
			$nif = $param["nif"];
		}

		/* Database operations */
		if ($exists) {
			$update = " UPDATE $this->table";
			$set = " SET nombre = ?, nif = ?";
			$where = " WHERE id = ?";
			$sql = $update . $set . $where;

			$stmt = $this->connection->prepare($sql);

			$res = $stmt->execute([$nombre, $nif, $id]);
		} else {
			$insert = " INSERT INTO $this->table(nombre, nif)";
			$values = " VALUES(:nombre, :nif)";
			$sql = $insert . $values;
			
			$stmt = $this->connection->prepare($sql);
			$stmt->execute([
				":nombre" => $nombre,
				":nif" => $nif,
			]);

			$id = $this->connection->lastInsertId();
		}	

		return $id;	
	}

	public function deletePersonById($id) {
		$this->getConnection();

		$delete = " DELETE FROM $this->table";
		$where = " WHERE id = :id";
		$sql = $delete . $where;

		$stmt = $this->connection->prepare($sql);

		return $stmt->execute([
			":id" => $id,
		]);
	}
}

?>
