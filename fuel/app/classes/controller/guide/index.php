<?php
/* 
 * ガイドページ
 */

class Controller_Guide_Index extends Controller_App
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

		//TDK
		$data['title'] = '当店案内 - タンタンメン本舗';
		$data['description'] = 'タンタンメン本舗のガイドページです。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。';
		$data['keywords'] = 'タンタンメン本舗,案内,地図,横浜,坂東橋,曙町';
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/guide/';
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/guide/index', $data, false));
	}
	
}