<?php
/* 
 * ホームページ
 */

class Controller_Index extends Controller_App
{

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index($param = null)
	{
		$data = array();
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//店休日カレンダー作成
		$date_last = date('t');
		$first_day = date('w', strtotime(date('Y-m-01')));
		$last_day = date('w', strtotime(date('Y-m-' . $date_last)));
		$year = date('Y');
		$month = date('m');
		$holiday_list = Model_Holiday::GetHolidaysByMonth($year, $month);
		$holiday_calendar = '<table class="table-calendar">';
		$holiday_calendar .= '<tr><td class="table-calendar-title" colspan="7">' . date('Y年m月') . '</td></tr>';
		$holiday_calendar .= '<tr><th>日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th></tr>';
		$holiday_calendar .= '<tr>';
		$day=0;
		for (; $day<$first_day; $day++) {
			$holiday_calendar .= '<td></td>';
		}
		for ($date = 1; $date <= $date_last; $date++) { 
			if($day == 0) {
				$holiday_calendar .= '<tr>';
			}
			if(in_array($date, $holiday_list)) {
				$holiday_calendar .= '<td>' . $date . '</td>';
			} else {
				$holiday_calendar .= '<td class="workday">' . $date . '</td>';
			}
			if($day == 6) {
				$holiday_calendar .= '</tr>';
				$day = 0;
				continue;
			}
			$day++;
		}
		if($day!=0) {
			for(; $day<7; $day++) {
				$holiday_calendar .= '<td></td>';
			}
			$holiday_calendar .= '</tr>';
		}
		$holiday_calendar .= '</table>';
		$data['holiday_calendar'] = $holiday_calendar;

		//TDK
		$data['title'] = 'タンタンメン本舗';
		$data['description'] = 'タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。タンタンメンだけではなく、各種麺類、各種ご飯、餃子、単品料理、定食料理、ちょい飲みなど様々な美味しい料理を販売しています、メニューを見るとお気に入りの料理がきっと見つかります。美味しい料理食べたいならぜひタンタンメン本舗へ！';
		$data['keywords'] = 'タンタンメン本舗,横浜,坂東橋,曙町';
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/index', $data, false));
	}
	
}