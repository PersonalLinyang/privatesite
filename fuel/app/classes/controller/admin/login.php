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
				$_SESSION['login_user_name'] = $login_user->user_name;
				$_SESSION['login_user_type'] = $login_user->user_type;
				
				//普通店員でログインする場合
				if($login_user->user_type == USER_TYPE_STAFF) {
					//所属店チェック
					if($login_user->agent_id) {
						$_SESSION['login_agent_id'] = $login_user->agent_id;
					} else {
						unset($_SESSION['login_user_id']);
						unset($_SESSION['login_user_name']);
						unset($_SESSION['login_user_type']);
						$data_error = array();
						$data_error['error_message'] = 'このユーザーはまだ所属店を設定していません<br/>管理者と連絡してください';
						return Response::forge(View::forge($this->template . '/admin/error', $data_error, false));
					}
				}
				
				header( 'Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/index.php' );
				exit;
			} else {
				unset($_SESSION['login_user_id']);
				unset($_SESSION['login_user_name']);
				unset($_SESSION['login_user_type']);
				unset($_SESSION['login_agent_id']);
				$data['login_id'] = $_POST['login_id'];
				$data['error_message'] = 'ログインIDかパスワードが間違っています';
			}
		}
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/admin/login', $data, false));
	}
	
}