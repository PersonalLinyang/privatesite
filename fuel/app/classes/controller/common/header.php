<?php
/* 
 * 共通パーツ - ヘッダー
 */

class Controller_Common_Header extends Controller_App
{

	/*
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		return Response::forge(View::forge($this->template . '/common/header', $data, false));
	}
	
}