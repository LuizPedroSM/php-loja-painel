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
}