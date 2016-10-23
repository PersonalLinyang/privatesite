<?php
/* 
 * 単品・定食ページ
 */

class Controller_Menu_SingleSet extends Controller_App
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
		return Response::forge(View::forge($this->template . '/menu/single_set', $data, false));
	}
	
}