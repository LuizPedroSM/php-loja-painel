<?php
namespace Models;

use \Core\Model;

class Products extends Model 
{
	public function getAll() {
		$array = array();			
		$sql = "SELECT id, id_category, id_brand, name, stock, price, price_from FROM products";		
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$array  = $sql->fetchAll(\PDO::FETCH_ASSOC);

			foreach ($array as $key => $item) {
				$cat = new Categories();
				$catInfo = $cat->get($item['id_category']);
				$array[$key]['name_category'] = $catInfo['name'];
				
				$brands = new Brands();
				$brandsInfo = $brands->get($item['id_brand']);
				$array[$key]['name_brand'] = $brandsInfo['name'];
			}
		}
		return $array;
	}

}