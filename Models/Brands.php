<?php
namespace Models;

use \Core\Model;

class Brands extends Model 
{
	public function getAll() {
		$array = array();
		$sql = "SELECT * FROM brands";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array  = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function get($id) {
		$array = array();
		$sql = "SELECT * FROM brands WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array  = $sql->fetch(\PDO::FETCH_ASSOC);
		}
		return $array;
	}

	public function add($name)
	{
		$sql = "INSERT INTO brands (name) VALUES (:name)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->execute();
	}

	public function update($name, $id)
	{
		$sql = "UPDATE brands SET name = :name WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}