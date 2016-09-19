<?php
/* 
 * ホームページ
 */

class Controller_Index extends Controller
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
		
		$sql="select * from menu";
		$query=DB::query("select * from agent");
		$result=$query->execute()->as_array();
		var_dump($result);
		
		//View呼び出す
		return Response::forge(View::forge('index', $data, false));
	}
	
}