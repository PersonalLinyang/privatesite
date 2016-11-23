<?php
/* 
 * 前サイトページの共通親
 */

class Controller_App extends Controller 
{

	//デフォルトでPCのthemeを使う
	public $template = 'pc';
	
	/**
	 *
	 * @access  public
	 */
	public function before() {

		$ua = $_SERVER['HTTP_USER_AGENT'];
		
		//PC、SPを判別してSPまたはFPならthemeをきりかえる
		if ((strpos($ua, 'iPhone') !== false)
	    || (strpos($ua, 'iPod') !== false)
	    || (strpos($ua, 'iPad') !== false)
	    || (strpos($ua, 'Android') !== false)) {
			$this->template = 'sp';
		}

		//時間を日本時間に調整
		date_default_timezone_set('Asia/Tokyo');
		
	}

}