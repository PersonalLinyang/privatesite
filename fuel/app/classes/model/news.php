<?php

class Model_News extends Model
{

	public $id;
	public $content;
	public $start_date;
	public $end_date;

	/* 
	 * ニュース取得
	 */
	public static function GetNews($active_flag) {
		$news_list = array();
		$sql = "SELECT * FROM t_news ";
		if($active_flag) {
			$sql .= "WHERE start_date <= :time_now AND (end_date IS NULL OR end_date >= :time_now)";
		}
		$query = DB::query($sql);
		$query->param('time_now', date('Y-m-d H:i:s'));
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $news) {
				$news_list[] = $news;
			}
		}
			
		return $news_list;
	}

}

