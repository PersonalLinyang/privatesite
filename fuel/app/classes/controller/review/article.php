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
		if($this->template == 'pc') {
			$num_per_page = 10;
		} else {
			$num_per_page = 5;
		}
		$data['article_list'] = Model_Article::GetArticlesByPage($page, $num_per_page, 1);
		$data['total_page_number'] = Model_Enquete::GetTotalPageNumber($num_per_page, 1);
		$data['page'] = $page;

		//TDK
		$data['title'] = 'ネット上の声 - タンタンメン本舗';
		$data['description'] = 'タンタンメン本舗のレビューページ(ネット上の声)です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。';
		$data['keywords'] = 'タンタンメン本舗,レビュー,感想,口コミ,ネット上の声';
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/review/article/';
		
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

		//TDK
		$data['title'] = $article->title . ' - タンタンメン本舗';
		$data['description'] = $article->title . '。タンタンメン本舗のレビュー詳細ページです。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。';
		$data['keywords'] = 'タンタンメン本舗,レビュー,' . $article->title;
		$data['canonical'] = 'http://' . $_SERVER['HTTP_HOST'] . '/review/article/detail/' . $article_id . '/';
		
		//View呼び出す
		if($article) {
			$data['article'] = $article;
			return Response::forge(View::forge($this->template . '/review/detail', $data, false));
		} else {
			return Response::forge(View::forge($this->template . '/404', $data, false));
		}
	}
	
}