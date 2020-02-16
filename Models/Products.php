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

	public function add(
					$id_category, 
					$id_brand, 
					$name, 
					$description, 
					$stock, 
					$price_from, 
					$price, 
					
					$weight,
					$width, 
					$height, 
					$length, 
					$diameter, 
					
					$featured, 
					$sale, 
					$bestseller, 
					$new_product, 
									
					$options)
	{

		$options_selected = array();
		foreach ($options as $optk => $opt) {
			if (!empty($opt)) {
				$options_selected[$optk] = $opt; 
			}
		}
		$options_ids = implode(',', array_keys($options_selected));

		if (!empty($id_category) && !empty($id_brand) && !empty($name) && !empty($stock) && !empty($price)) {
			$sql = "INSERT INTO products 
			(id_category, id_brand, name, description, stock, price_from, price, weight, width, height, length, diameter, featured, sale, bestseller, new_product, options ) VALUES
			(:id_category, :id_brand, :name, :description, :stock, :price_from, :price, :weight, :width, :height, :length, :diameter, :featured, :sale, :bestseller, :new_product, :options )";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_category', $id_category);
			$sql->bindValue(':id_brand', $id_brand);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':description', $description);
			$sql->bindValue(':stock', $stock);
			$sql->bindValue(':price_from', $price_from);
			$sql->bindValue(':price', $price);
			$sql->bindValue(':weight', $weight);
			$sql->bindValue(':width', $width);
			$sql->bindValue(':height', $height);
			$sql->bindValue(':length', $length);
			$sql->bindValue(':diameter', $diameter);
			$sql->bindValue(':featured', $featured);
			$sql->bindValue(':sale', $sale);
			$sql->bindValue(':bestseller', $bestseller);
			$sql->bindValue(':new_product', $new_product);
			$sql->bindValue(':options', $options_ids);
			$sql->execute();
			
			$id = $this->db->lastInsertId();
			print_r($options_selected);
			foreach ($options_selected as $optk => $opt) {
				$sql = "INSERT INTO products_options (id_product, id_option, p_value) VALUES (:id_product, :id_option, :p_value)";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_product', $id);
				$sql->bindValue(':id_option', $optk);
				$sql->bindValue(':p_value', $opt);
				$sql->execute();
				$sql->debugDumpParams();
			}

			//add imgs
		}
	}

}