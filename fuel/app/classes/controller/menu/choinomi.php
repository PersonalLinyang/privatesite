<?php
/* 
 * ちょい飲みページ
 */

class Controller_Menu_Choinomi extends Controller_App
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

		//ちょい飲み お飲物リスト取得
		$data['drink_list'] = Model_Product::GetChoinomiDrink(1);

		//ちょい飲み おつまみリスト取得
		$data['dishes_list'] = Model_Product::GetChoinomiDishes(1);
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu/choinomi', $data, false));
	}
	
}