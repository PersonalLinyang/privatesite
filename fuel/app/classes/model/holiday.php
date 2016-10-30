<?php

class Model_Holiday extends Model
{

	public $year;
	public $month;
	public $day;

	/* 
	 * 休日リスト取得
	 */
	public static function GetHolidaysByMonth($year, $month) {
		$sql = "SELECT day FROM t_holiday WHERE year = :year AND month = :month";
		$query = DB::query($sql);
		$query->param('year', $year);
		$query->param('month', $month);
		$result = $query->execute()->as_array();

		if(count($result) == 1) {
			$user = new Model_User();
			$user->user_id = $result[0]["user_id"];
			$user->login_id = $result[0]["login_id"];
			$user->login_pw = $result[0]["login_pw"];
			$user->user_name = $result[0]["user_name"];
			$user->user_type = $result[0]["user_type"];
			$user->agent_id = $result[0]["agent_id"];
			
			return $user;
		} else {
			return array();
		}
	}

}

