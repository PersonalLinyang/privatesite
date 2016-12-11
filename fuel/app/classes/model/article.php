<?php

class Model_Article extends Model
{

	public $id;
	public $title;
	public $content;
	public $create_date;
	public $site;
	public $link;
	public $publish_flag;

	/* 
	 * 該当ページのアンケートリスト取得
	 */
	public static function GetArticlesByPage($page, $num_per_page, $publish_flag) {

		$articles = array();
		$sql = 'SELECT * FROM t_article ';
		if($publish_flag) {
			$sql .= 'WHERE publish_flag=1 ';
		}
		$sql .= 'ORDER BY create_date DESC LIMIT :num_per_page OFFSET :start';
		$query = DB::query($sql);
		$query->param('num_per_page', $num_per_page);
		$query->param('start', ($page - 1) * $num_per_page);
		$result = $query->execute()->as_array();

		if(count($result)) {
			foreach ($result as $article_info) {
				$article = new Model_Article();
				$article->id = $article_info['id'];
				$article->title = $article_info['title'];
				$article->content = '';
				$article->create_date = $article_info['create_date'];
				$article->site = $article_info['site'];
				$article->link = $article_info['link'];
				$article->publish_flag = $article_info['publish_flag'];
				$articles[] = $article;
			}
		}

		return $articles;
	}

	/* 
	 * 記事ページ数取得
	 */
	public static function GetTotalPageNumber($num_per_page, $publish_flag) {
		$total_page_number = 0;
		$sql = 'SELECT count(*) count FROM t_article ';
		if($publish_flag) {
			$sql .= 'WHERE publish_flag=1 ';
		}
		$query = DB::query($sql);
		$result = $query->execute()->as_array();

		if(count($result)) {
			$total_page_number = ceil(intval($result[0]['count']) / $num_per_page);
		}

		return $total_page_number;
	}

	/* 
	 * 記事IDで記事を取得
	 */
	public static function GetArticle($id, $publish_flag) {
		$sql = 'SELECT * FROM t_article WHERE id = :id ';
		if($publish_flag) {
			$sql .= 'AND publish_flag=1 ';
		}
		$query = DB::query($sql);
		$query->param('id', $id);
		$result = $query->execute()->as_array();

		if(count($result)) {
			$article_info = $result[0];
			$article = new Model_Article();
			$article->id = $article_info['id'];
			$article->title = $article_info['title'];
			$article->content = $article_info['content'];
			$article->create_date = $article_info['create_date'];
			$article->site = $article_info['site'];
			$article->link = $article_info['link'];
			$article->publish_flag = $article_info['publish_flag'];
		} else {
			$article = false;
		}

		return $article;
	}

}
