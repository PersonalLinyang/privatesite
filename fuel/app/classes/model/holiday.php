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

	/* 
	 * 休日チェック
	 */
	public static function CheckHoliday($year, $month, $day) {
		$holidays = array();
		$sql = "SELECT * FROM t_holiday WHERE year = :year AND month = :month AND day=:day";

		$query = DB::query($sql);
		$query->param('year', intval($year));
		$query->param('month', intval($month));
		$query->param('day', intval($day));
		$result = $query->execute()->as_array();

		if(count($result)) {
			return true;
		} else {
			return false;
		}
	}

}

