<?php
/* 
 * 共通パーツ - ヘッダー
 */

class Controller_Common_Header extends Controller
{

	/*
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		return Response::forge(View::forge('common/header', $data, false));
	}
	
}