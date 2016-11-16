<?php
/* 
 * 当店セットページ
 */

class Controller_Menu_Set extends Controller_App
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
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();

		//タンタンメンリスト取得
		$data['set_list'] = Model_Product::GetSets(1);
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu/set', $data, false));
	}
	
}