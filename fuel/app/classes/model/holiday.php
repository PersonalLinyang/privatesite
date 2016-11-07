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
		$holidays = array();
		$sql = "SELECT day FROM t_holiday WHERE year = :year AND month = :month";
		$query = DB::query($sql);
		$query->param('year', $year);
		$query->param('month', $month);
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $holiday) {
				$holidays[] = $holiday["day"];
			}
		}
			
		return $holidays;
	}

}

