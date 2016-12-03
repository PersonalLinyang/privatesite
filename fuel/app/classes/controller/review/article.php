<?php
/* 
 * お客様の声ページ(ネット上の声)
 */

class Controller_Review_Article extends Controller_App
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
		$num_per_page = 20;
		$data['article_list'] = Model_Article::GetArticlesByPage($page, $num_per_page, 1);
		$data['total_page_number'] = Model_Enquete::GetTotalPageNumber($num_per_page, 1);
		$data['page'] = $page;
		
		//View呼び出す
		if($page > $data['total_page_number']) {
			return Response::forge(View::forge($this->template . '/404', $data, false));
		} else {
			return Response::forge(View::forge($this->template . '/review/article', $data, false));
		}
	}

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_detail($param = null)
	{
		$data = array();

		$article_id = $param;
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//文章情報取得
		$article = Model_Article::GetArticle($article_id, 1);
		
		//View呼び出す
		if($article) {
			$data['article'] = $article;
			return Response::forge(View::forge($this->template . '/review/detail', $data, false));
		} else {
			return Response::forge(View::forge($this->template . '/404', $data, false));
		}
	}
	
}