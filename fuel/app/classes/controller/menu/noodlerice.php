<?php
/* 
 * 麺類・ご飯類ページ
 */

class Controller_Menu_NoodleRice extends Controller_App
{

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index($param = null)
	{
		session_start();
		$data = array();
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu/noodle_rice', $data, false));
	}
	
}