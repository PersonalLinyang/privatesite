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
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//単品・定食取得
		$data['single_list'] = Model_Product::GetProductsBySubType(4, 4, 1);
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu/single_set', $data, false));
	}
	
}