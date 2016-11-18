<?php
/* 
 * お客様の声ページ
 */

class Controller_Review_Index extends Controller_App
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

		//アンケートリストとページャー取得
		if(isset($_GET['page'])) {
			$page = intval($_GET['page']);
		} else {
			$page = 1;
		}
		$num_per_page = 5;
		$data['enquete_list'] = Model_Enquete::GetEnquetesByPage($page, $num_per_page);
		$data['total_page_number'] = Model_Enquete::GetTotalPageNumber($num_per_page);
		$data['page'] = $page;
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/review/index', $data, false));
	}
	
}