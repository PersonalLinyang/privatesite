<?php

class Model_Enquete extends Model
{

	public $id;
	public $name;
	public $secrit_flag;
	public $visit_date;
	public $order_list;
	public $level_flavor;
	public $level_service;
	public $level_environment;
	public $title;
	public $comment;
	public $create_date;
	public $publish_flag;

	/* 
	 * アンケート追加
	 */
	public static function AddEnquete($data) {
		$sql = 'INSERT INTO t_enquete(name, secrit_flag, visit_date, order_list, level_flavor, level_service, level_environment, title, comment) '
				. 'VALUES(:name, :secrit_flag, :visit_date, :order_list, :level_flavor, :level_service, :level_environment, :title, :comment)';
		$query = DB::query($sql);
		foreach($data as $key => $value) {
			$query->param($key, $value);
		}
		$result = $query->execute();
			
		return $result;
	}

	/* 
	 * 該当ページのアンケートリスト取得
	 */
	public static function GetEnquetesByPage($page, $num_per_page) {

		$enquetes = array();
		$sql = 'SELECT * FROM t_enquete ORDER BY create_date DESC LIMIT :num_per_page OFFSET :start';
		$query = DB::query($sql);
		$query->param('num_per_page', $num_per_page);
		$query->param('start', ($page - 1) * $num_per_page);
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $enquete_info) {
				//注文リスト取得
				$order_array = explode(',', $enquete_info['order_list']);
				$order_list = array();
				$nr_list = array();
				$st_list = array();
				$tp_list = array();
				$ts_list = array();
				$ch_list = array();
				$dr_list = array();
				foreach ($order_array as $order) {
					switch (substr($order, 0, 2)) {
						case 'nr':
							$nr_list[] = substr($order, 2);
							break;
						case 'st':
							$st_list[] = substr($order, 2);
							break;
						case 'tp':
							$tp_list[] = substr($order, 2);
							break;
						case 'ts':
							$ts_list[] = substr($order, 2);
							break;
						case 'ch':
							$ch_list[] = substr($order, 2);
							break;
						case 'dr':
							$dr_list[] = substr($order, 2);
							break;
					}
				}

				//麺類、ご飯類リスト取得
				$order_list['nr_list'] = Model_Product::GetProductNamesByIdArray($nr_list);
				//セットリスト取得
				$order_list['st_list'] = Model_Product::GetSetNamesByIdArray($st_list);
				//単品リスト取得
				$order_list['tp_list'] = Model_Product::GetProductNamesByIdArray($tp_list);
				//定食リスト取得
				$ts_name_list = Model_Product::GetProductNamesByIdArray($ts_list);
				foreach($ts_name_list as $ts_name) {
					$order_list['ts_list'][] = $ts_name . '定食';
				}
				//ちょい飲みリスト取得
				$order_list['ch_list'] = Model_Product::GetProductNamesByIdArray($ch_list);
				//お飲物リスト取得
				$order_list['dr_list'] = Model_Product::GetProductNamesByIdArray($dr_list);

				$enquete = new Model_Enquete();
				$enquete->id = $enquete_info['id'];
				$enquete->name = $enquete_info['name'];
				$enquete->secrit_flag = $enquete_info['secrit_flag'];
				$enquete->visit_date = $enquete_info['visit_date'];
				$enquete->order_list = $order_list;
				$enquete->level_flavor = $enquete_info['level_flavor'];
				$enquete->level_service = $enquete_info['level_service'];
				$enquete->level_environment = $enquete_info['level_environment'];
				$enquete->title = $enquete_info['title'];
				$enquete->comment = $enquete_info['comment'];
				$enquete->create_date = $enquete_info['create_date'];
				$enquete->publish_flag = $enquete_info['publish_flag'];
				$enquete->id = $enquete_info['id'];
				$enquetes[] = $enquete;
			}
		}

		return $enquetes;
	}

	/* 
	 * アンケートページ数取得
	 */
	public static function GetTotalPageNumber($num_per_page) {
		$total_page_number = 0;
		$sql = 'SELECT count(*) count FROM t_enquete';
		$query = DB::query($sql);
		$result = $query->execute()->as_array();

		if(count($result)) {
			$total_page_number = ceil(intval($result[0]['count']) / $num_per_page);
		}

		return $total_page_number;
	}

}
