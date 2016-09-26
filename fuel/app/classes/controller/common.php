<?php
/* 
 * 共通パーツ
 */

class Controller_Common extends Controller_App
{

	/**
	 * 
	 * 共通ヘッダ
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_header()
	{
		$data = array();
		return Response::forge(View::forge($this->template . '/common/header', $data, false));
	}
	
}