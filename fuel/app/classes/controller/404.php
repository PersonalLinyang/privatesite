<?php
/* 
 * 404ページ
 */

class Controller_404 extends Controller_App
{

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//TDK
		$data['title'] = 'お探しのページは見つかりませんでした - タンタンメン本舗';
		$data['description'] = 'お探しのページは見つかりませんでした。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。タンタンメンだけではなく、ラーメン、チャーハン、餃子、単品料理など様々な美味しい料理を販売しています、メニューを見るとお気に入りの料理がきっと見つかります。美味しい料理食べたいならぜひタンタンメン本舗へ！';
		$data['keywords'] = 'お探しのページは見つかりませんでした,404,Not Found';
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/404/';
		
		return Response::forge(View::forge($this->template . '/404', $data, false));
	}
	
}