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
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//タンタンメンリスト取得
		$data['set_list'] = Model_Product::GetSets(1);

		//TDK
		$data['title'] = '当店セット - タンタンメン本舗';
		$data['description'] = 'セットメニューの一覧です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。';
		$data['keywords'] = 'タンタンメン本舗,セット,メニュー';
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/menu/set/';
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu/set', $data, false));
	}
	
}