<?php
/* 
 * 404ページ
 */

class Controller_404 extends Controller
{

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		return Response::forge(View::forge('404', $data, false));
	}
	
}