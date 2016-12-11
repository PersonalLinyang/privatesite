<?php
/* 
 * お飲物ページ
 */

class Controller_Menu_Drink extends Controller_App
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

		//お飲物リスト取得
		$data['drink_list'] = Model_Product::GetProductsByType(5, 1);

		//TDK
		$data['title'] = 'お飲物 - タンタンメン本舗';
		$data['description'] = 'お飲物メニューの一覧です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。';
		$data['keywords'] = 'タンタンメン本舗,お飲物,メニュー';
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/menu/drink/';
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu/drink', $data, false));
	}
	
}