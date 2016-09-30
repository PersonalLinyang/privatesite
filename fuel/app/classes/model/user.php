<?php

class Model_User extends Model
{

	public $user_id;
	public $login_id;
	public $login_pw;
	public $user_name;
	public $user_type;
	public $agent_id;
	
    /**
     * Login
     * 
	 * ユーザーログイン
	 */
	public static function Login($login_id, $login_pw) {
		//ログインユーザー検索
		$sql = 'SELECT * FROM t_user WHERE login_id = :login_id AND login_pw = :login_pw ';
		$query = DB::query($sql);
		$query->param('login_id', $login_id);
		$query->param('login_pw', md5(sha1($login_pw)));
		$result = $query->execute()->as_array();
		
		//リスポンス処理
		if(count($result) == 1) {
			$user = new Model_User();
			$user->user_id = $result[0]['user_id'];
			$user->login_id = $result[0]['login_id'];
			$user->login_pw = $result[0]['login_pw'];
			$user->user_name = $result[0]['user_name'];
			$user->user_type = $result[0]['user_type'];
			$user->agent_id = $result[0]['agent_id'];
			
			return $user;
		} else {
			return false;
		}
	}

}

