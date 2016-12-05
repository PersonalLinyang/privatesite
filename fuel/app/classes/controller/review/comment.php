<?php
/* 
 * お客様の声ページ(本サイトコメント)
 */

class Controller_Review_Comment extends Controller_App
{

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index($param = null)
	{
		$data = array();
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//アンケートリストとページャー取得
		if(isset($_GET['page'])) {
			$page = intval($_GET['page']);
		} else {
			$page = 1;
		}
		if($this->template == 'pc') {
			$num_per_page = 5;
		} else {
			$num_per_page = 3;
		}
		$data['enquete_list'] = Model_Enquete::GetEnquetesByPage($page, $num_per_page, 1);
		$data['total_page_number'] = Model_Enquete::GetTotalPageNumber($num_per_page, 1);
		$data['page'] = $page;

		//TDK
		$data['title'] = '本サイトの声 - タンタンメン本舗';
		$data['description'] = 'タンタンメン本舗のレビューページ(本サイトの声)です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。';
		$data['keywords'] = 'タンタンメン本舗,レビュー,感想,口コミ,本サイトの声';
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/review/comment/';
		
		//View呼び出す
		if($page > $data['total_page_number']) {
			return Response::forge(View::forge($this->template . '/404', $data, false));
		} else {
			return Response::forge(View::forge($this->template . '/review/comment', $data, false));
		}
	}
	
}