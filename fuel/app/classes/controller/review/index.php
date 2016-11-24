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
		$data = array();
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//アンケートリストとページャー取得
		$data['article_list'] = Model_Article::GetArticlesByPage(1, 5, 1);
		$data['comment_list'] = Model_Enquete::GetEnquetesByPage(1, 5, 1);
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/review/index', $data, false));
	}
	
}