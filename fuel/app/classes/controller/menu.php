<?php
/* 
 * ホームページ
 */

class Controller_Menu extends Controller_App
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
		
		$product_type_spell = $this->param('product_type_spell');
		
		$product_list = Model_Product::GetProductsByTypeSpell($product_type_spell, '1', '1');
		
		var_dump($product_list);
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/menu', $data, false));
	}
	
}