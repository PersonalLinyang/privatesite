<?php
/* 
 * ホームページ
 */

class Controller_Admin_Login extends Controller_App
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
		
		if(isset($_POST['login_id']) && isset($_POST['login_pw'])) {
			$login_user = Model_User::Login($_POST['login_id'], $_POST['login_pw']);
			if($login_user) {
				$_SESSION['login_user_id'] = $login_user->user_id;
				$_SESSION['login_user_type'] = $login_user->user_type;
				header( 'Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/index.php' );
				exit;
			} else {
				unset($_SESSION['login_user_id']);
				unset($_SESSION['login_user_type']);
				$data['login_id'] = $_POST['login_id'];
				$data['error_message'] = 'ログインIDかパスワードが間違っています';
			}
		}
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/admin/login', $data, false));
	}
	
}