<?php
namespace Models;

use \Core\Model;


class Permissions extends Model 
{

	public function getPermissions($id_permission)
	{
		$array = array();
		$sql = "SELECT id_permission_item FROM permission_links WHERE id_permission_group = :id_permission";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_permission', $id_permission);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$data = $sql->fetchAll();
			$ids = array();

			foreach ($data as $data_item) {
				$ids[] = $data_item['id_permission_item'];
			}

			$sql = "SELECT slug FROM permission_items WHERE id IN (".implode(',', $ids).")";
			$sql = $this->db->query($sql);

			if ($sql->rowCount() > 0) {
				$data = $sql->fetchAll();
				
				foreach ($data as $data_item) {
					$array[] = $data_item['slug'];
				}
			}
		}

		return $array;
	}

	public function getAll() {
		$array = array();

		return $array;
	}

}