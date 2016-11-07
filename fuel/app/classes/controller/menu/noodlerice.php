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

		//タンタンメンリスト取得
		$data['tantanmen_list'] = Model_Product::GetProductsBySubType(1, 1, 1);

		//普通麺類単品リスト取得
		$data['noodle_list'] = Model_Product::GetProductsBySubType(1, 2, 1);

		//トッピングリスト取得
		$data['topping_list'] = Model_Product::GetProductsBySubType(3, 11, 1);

		//トッピングリスト取得
		$data['rice_list'] = Model_Product::GetProductsBySubType(2, 3, 1);
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu/noodle_rice', $data, false));
	}
	
}