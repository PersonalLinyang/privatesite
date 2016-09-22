<?php
/* 
 * 管理画面ホームページ
 */

class Controller_Admin_Index extends Controller_App
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
		
		//未ログインとときログインページに遷移
		if(!isset($_SESSION['login_user_id'])){
			header( 'Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/login.php' );
			exit;
		}
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('admin/common/header')->execute()->response();
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/admin/index', $data, false));
	}
	
}