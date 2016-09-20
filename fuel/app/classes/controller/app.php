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
		
		//PC、SPを判別してSPまたはFPならthemeをきりかえる
		if (Agent::is_mobiledevice()) {
			$this->template = 'sp';;
		}
		
	}

}