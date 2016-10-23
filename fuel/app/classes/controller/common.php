<?php
/* 
 * 通常共通パーツ
 */

class Controller_Common extends Controller_App
{

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_header($param = null)
	{
		$data = array();
		return Response::forge(View::forge($this->template . '/common/header', $data, false));
	}
	
}