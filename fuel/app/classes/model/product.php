<?php

class Model_Product extends Model
{

	public $product_id;
	public $product_name;
	public $product_spell;
	public $product_type;
	public $product_price;
	public $product_unit;
	public $start_date;
	public $end_date;
	public $start_time;
	public $end_time;
	public $sell_flag;

    /**
     * GetProductsByTypeSpell
     * 
     * 製品名(英)で製品リスト取得
     * @access  public static
     * @param   Array   $product_type_spell  製品名(英)
     *                  $orderby             順に並ぶ条件(項目)
     *                  $sort                順に並ぶ条件(ソート)
     *                  $sell_flag           販売フラグ
     *                  $time_flag           販売期間フラグ
     * @return  Array   データ配列
     *          bool    false(取得失敗の場合)
     */
	public static function GetProductsByTypeSpell($product_type_spell = '', $orderby = 'start_date', $sort = 'desc', $sell_flag = '', $time_flag = '') {
		//商品タイプ検索
		$sql_type = 'SELECT * FROM m_product_type WHERE product_type_spell = :product_type_spell ';
		$query_type = DB::query($sql_type);
		$query_type->param(':product_type_spell', $product_type_spell);
		$result_type = $query_type->execute()->as_array();
		
		if(count($result_type)) {
			$product_list = array();
			//商品詳細情報取得
			$product_type_id = $result_type[0]['product_type_id'];
			$sql_product = 'SELECT tp.*, mpt.product_type_name FROM t_product tp LEFT JOIN m_product_type mpt ON tp.product_type_id=mpt.product_type_id ' 
			             . 'WHERE tp.product_type_id = :product_type_id ';
			//販売フラグ
			if($sell_flag != '') {
				$sql_product .= 'AND sell_flag = :sell_flag ';
			}
			//販売期間
			if($time_flag == '1') {
				$sql_product .= 'AND start_date <= :date AND (end_date >= :date OR end_date is null) ';
			}
			$sql_product .= 'ORDER BY :orderby :sort';
			$query_product = DB::query($sql_product);
			$query_product->param(':product_type_id', $product_type_id);
			$query_product->param(':sell_flag', $sell_flag);
			$query_product->param(':date', date('Y-m-d', time()));
			$query_product->param(':orderby', $orderby);
			$query_product->param(':sort', $sort);
			$result_product = $query_product->execute()->as_array();
			
			foreach($result_product as $product_info) {
				$product_id = $product_info['product_id'];
				$choices_type_list = array();
				//選択タイプリスト取得
				$sql_choices_type = 'SELECT DISTINCT choices_type_id FROM r_choices WHERE product_id = :product_id ';
				$query_choices_type = DB::query($sql_choices_type);
				$query_choices_type->param(':product_id', $product_id);
				$result_choices_type = $query_choices_type->execute()->as_array();
				
				foreach($result_choices_type as $choices_type) {
					$choices_type_id = $choices_type['choices_type_id'];
					$choices_list = array();
					//選択情報取得
					$sql_choices = 'SELECT mc.*,rc.choices_price FROM m_choices mc RIGHT JOIN r_choices rc ON mc.choices_id = rc.choices_id ' 
					             . 'WHERE rc.product_id = :product_id AND rc.choices_type_id = :choices_type_id ';
					$query_choices = DB::query($sql_choices);
					$query_choices->param(':product_id', $product_id);
					$query_choices->param(':choices_type_id', $choices_type_id);
					$result_choices = $query_choices->execute()->as_array();
					
					foreach($result_choices as $choices) {
						//選択情報を配列に組み合わせ
						$choices_list[$choices['choices_id']] = array(
							'choices_text' => $choices['choices_text'],
							'choices_price' => $choices['choices_price'],
						);
					}
					
					//選択情報をタイプ別で配列に組み合わせ
					$choices_type_list[$choices_type_id] = $choices_list;
				}
				
				//製品情報を配列に組み合わせ
				$product_list[$product_id] = array(
					'product_name' => $product_info['product_name'],
					'product_spell' => $product_info['product_spell'],
					'product_type_id' => $product_info['product_type_id'],
					'product_type_name' => $product_info['product_type_name'],
					'product_price' => $product_info['product_price'],
					'product_unit' => $product_info['product_unit'],
					'start_date' => $product_info['start_date'],
					'end_date' => $product_info['end_date'],
					'start_time' => $product_info['start_time'],
					'end_time' => $product_info['end_time'],
					'sell_flag' => $product_info['sell_flag'],
					'choices' => $choices_type_list,
				);
			}
			
			return $product_list;
		} else {
			return false;
		}
	}

}

