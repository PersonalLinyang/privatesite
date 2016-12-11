<?php

class Model_Product extends Model
{

	public $id;
	public $name;
	public $type;
	public $sub_type;
	public $price;
	public $price_set;
	public $start_date;
	public $end_date;
	public $image_list;
	public $caution;

	/* 
	 * 大分類で商品を取得
	 */
	public static function GetProductsByType($type, $sell_flag) {
		$products = array();
		$sql_sub_type = "SELECT * FROM m_product_sub_type WHERE type = :type ORDER BY id ASC";
		$query_sub_type = DB::query($sql_sub_type);
		$query_sub_type->param('type', $type);
		$result_sub_type = $query_sub_type->execute()->as_array();

		if(count($result_sub_type)) {
			foreach($result_sub_type as $sub_type) {
				$products[$sub_type['id']] = array(
						'sub_type_name' => $sub_type['name'],
						'product_list' => array(),
					);
			}
		}

		$sql = "SELECT * FROM t_product WHERE type = :type AND sub_type in (SELECT id FROM m_product_sub_type WHERE type = :type) ";
		if($sell_flag) {
			$sql .= "AND start_date < :time_now AND (end_date > :time_now OR end_date IS NULL) ";
		}
		$sql .= "ORDER BY start_date DESC,id ASC ";
		$query = DB::query($sql);
		$query->param('type', $type);
		$query->param('time_now', date('Y-m-d H:i:s'));
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $product_info) {
				$product = new Model_Product();
				$product->id = $product_info['id'];
				$product->name = $product_info['name'];
				$product->type = $product_info['type'];
				$product->sub_type = $product_info['sub_type'];
				$product->price = $product_info['price'];
				$product->price_set = $product_info['price_set'];
				$product->start_date = $product_info['start_date'];
				$product->end_date = $product_info['end_date'];
				$product->image_list = $product_info['image_list'];
				$product->caution = $product_info['caution'];

				$products[$product_info['sub_type']]['product_list'][] = $product;
			}
		}
			
		return $products;
	}

	/* 
	 * 小分類で商品を取得
	 */
	public static function GetProductsBySubType($type, $sub_type, $sell_flag) {
		$products = array();
		$sql = "SELECT * FROM t_product WHERE type = :type AND sub_type = :sub_type ";
		if($sell_flag) {
			$sql .= "AND start_date < :time_now AND (end_date > :time_now OR end_date IS NULL) ";
		}
		$sql .= "ORDER BY start_date DESC,id ASC ";
		$query = DB::query($sql);
		$query->param('type', $type);
		$query->param('sub_type', $sub_type);
		$query->param('time_now', date('Y-m-d H:i:s'));
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $product_info) {
				$product = new Model_Product();
				$product->id = $product_info['id'];
				$product->name = $product_info['name'];
				$product->type = $product_info['type'];
				$product->sub_type = $product_info['sub_type'];
				$product->price = $product_info['price'];
				$product->price_set = $product_info['price_set'];
				$product->start_date = $product_info['start_date'];
				$product->end_date = $product_info['end_date'];
				$product->image_list = $product_info['image_list'];
				$product->caution = $product_info['caution'];

				$products[] = $product;
			}
		}
			
		return $products;
	}

	/* 
	 * IDリストで商品名リストを取得
	 */
	public static function GetProductNamesByIdArray($id_list) {
		$product_names = array();
		if(count($id_list)) {
			$sql = "SELECT name FROM t_product WHERE id IN (" . implode(',', $id_list) . ") ";
			$query = DB::query($sql);
			$result = $query->execute()->as_array();

			if(count($result)) {
				foreach ($result as $product_info) {
					$product_names[] = $product_info['name'];
				}
			}
		}
			
		return $product_names;
	}

	/* 
	 * セットリストを取得
	 */
	public static function GetSets($sell_flag) {
		$sets = array();
		$sql_set_group = "SELECT * FROM t_set_group WHERE 1=1 ";
		if($sell_flag) {
			$sql_set_group .= "AND start_date < :time_now AND (end_date > :time_now OR end_date IS NULL) ";
		}
		$sql_set_group .= "ORDER BY start_date DESC, id ASC ";
		$query_set_group = DB::query($sql_set_group);
		$query_set_group->param('time_now', date('Y-m-d H:i:s'));
		$result_set_group = $query_set_group->execute()->as_array();

		if(count($result_set_group)) {
			foreach ($result_set_group as $set_group) {
				$sets[$set_group['id']] = array(
						'group_name' => $set_group['name'],
						'group_start_date' => $set_group['start_date'],
						'group_end_date' => $set_group['end_date'],
						'set_list' => array(),
					);
			}
		}

		$sql_set = "SELECT s.*, main.image_list main_image, sub.image_list sub_image FROM t_set s LEFT JOIN t_product main ON s.main_id = main.id LEFT JOIN t_product sub ON s.sub_id = sub.id WHERE s.set_group in (SELECT id FROM t_set_group) ";
		if($sell_flag) {
			$sql_set .= "AND s.start_date < :time_now AND (s.end_date > :time_now OR s.end_date IS NULL) ";
		}
		$sql_set .= "ORDER BY s.start_date DESC, s.id ASC ";
		$query_set = DB::query($sql_set);
		$query_set->param('time_now', date('Y-m-d H:i:s'));
		$result_set = $query_set->execute()->as_array();

		if(count($result_set)) {
			foreach ($result_set as $set) {
				$sets[$set['set_group']]['set_list'][] = array(
						'id' => $set['id'],
						'main_id' => $set['main_id'],
						'main_image' => $set['main_image'],
						'sub_id' => $set['sub_id'],
						'sub_image' => $set['sub_image'],
						'set_name' => $set['set_name'],
						'price' => $set['price'],
						'start_date' => $set['start_date'],
						'end_date' => $set['end_date'],
					);
			}
		}

		return $sets;
	}

	/* 
	 * IDリストでセット名リストを取得
	 */
	public static function GetSetNamesByIdArray($id_list) {
		$set_names = array();
		if(count($id_list)) {
			$sql = "SELECT sg.name group_name, s.set_name set_name "
					. "FROM t_set s LEFT JOIN t_set_group sg ON s.set_group = sg.id " 
					. "WHERE s.id IN (" . implode(',', $id_list) . ") ";
			$query = DB::query($sql);
			$result = $query->execute()->as_array();

			if(count($result)) {
				foreach ($result as $set_info) {
					$set_names[] = $set_info['group_name'] . '(' . $set_info['set_name'] . ')';
				}
			}
		}
			
		return $set_names;
	}

	/* 
	 * ちょい飲み お飲物リスト取得
	 */
	public static function GetChoinomiDrink($sell_flag) {
		$products = array();
		$sql = "SELECT * FROM t_product WHERE type = 5 AND id in (SELECT product_id FROM t_choinomi) ";
		if($sell_flag) {
			$sql .= "AND start_date < :time_now AND (end_date > :time_now OR end_date IS NULL) ";
		}
		$sql .= "ORDER BY start_date DESC,id ASC ";
		$query = DB::query($sql);
		$query->param('time_now', date('Y-m-d H:i:s'));
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $product_info) {
				$product = new Model_Product();
				$product->id = $product_info['id'];
				$product->name = $product_info['name'];
				$product->type = $product_info['type'];
				$product->sub_type = $product_info['sub_type'];
				$product->price = $product_info['price'];
				$product->price_set = $product_info['price_set'];
				$product->start_date = $product_info['start_date'];
				$product->end_date = $product_info['end_date'];

				$products[] = $product;
			}
		}
			
		return $products;
	}

	/* 
	 * ちょい飲み おつまみリスト取得
	 */
	public static function GetChoinomiDishes($sell_flag) {
		$products = array();
		$sql = "SELECT * FROM t_product WHERE type = 4 AND id in (SELECT product_id FROM t_choinomi) ";
		if($sell_flag) {
			$sql .= "AND start_date < :time_now AND (end_date > :time_now OR end_date IS NULL) ";
		}
		$sql .= "ORDER BY start_date DESC,id ASC ";
		$query = DB::query($sql);
		$query->param('time_now', date('Y-m-d H:i:s'));
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $product_info) {
				$product = new Model_Product();
				$product->id = $product_info['id'];
				$product->name = $product_info['name'];
				$product->type = $product_info['type'];
				$product->sub_type = $product_info['sub_type'];
				$product->price = $product_info['price'];
				$product->price_set = $product_info['price_set'];
				$product->start_date = $product_info['start_date'];
				$product->end_date = $product_info['end_date'];
				$product->image_list = $product_info['image_list'];
				$product->caution = $product_info['caution'];

				$products[] = $product;
			}
		}
			
		return $products;
	}

}

