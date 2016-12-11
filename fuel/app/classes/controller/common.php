<?php
/* 
 * 通常共通パーツ
 */

class Controller_Common extends Controller_App
{

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_header($param = null)
	{
		$data = array();
		return Response::forge(View::forge($this->template . '/common/header', $data, false));
	}

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_sidebar($param = null)
	{
		$data = array();

		$news_list = array();

		//営業休店ニュース
		$year = date('Y');
		$month = date('m');
		$day = date('d');
		$holiday_flag = Model_Holiday::CheckHoliday($year, $month, $day);
		if($holiday_flag) {
			$news_list[] = '本日当店は休店でございます、ご迷惑かけて大変申し訳ございません';
		} else {
			$news_list[] = '本日当店は営業でございます、毎度ありがとうございます、よろしくお願いいたします。';
		}

		//スライドニュース取得
		$news_temp_list = Model_News::GetNews(true);
		foreach($news_temp_list as $news) {
			$news_list[] = nl2br($news['content']);
		}
		$data['news_list'] = $news_list;

		return Response::forge(View::forge($this->template . '/common/sidebar', $data, false));
	}

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_footer($param = null)
	{
		$data = array();
		return Response::forge(View::forge($this->template . '/common/footer', $data, false));
	}
	
}