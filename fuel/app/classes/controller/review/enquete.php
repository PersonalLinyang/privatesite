<?php
/* 
 * お客様の声ページ
 */

class Controller_Review_Enquete extends Controller_App
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
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();

		//フォーム表示
		$year = date('Y');
		$month = date('m');
		$day = date('d');

		//フォームデフォルト情報初期化
		$data['post_data']=array(
				'name' => '',
				'visit_year' => $year,
				'visit_month' => $month,
				'visit_day' => $day,
				'order_list' => array(),
				'level_flavor' => '0',
				'level_service' => '0',
				'level_environment' => '0',
				'title' => '',
				'comment' => '',
			);

		//送信ボタン処理
		if(isset($_POST['page'])) {
			//成功フラグ
			$success_flag = 1;

			//お名前チェック
			if(!isset($_POST['secrit']) && trim($_POST['name']) == '') {
				$data['error_name'] = 'お名前をご入力してお願いいたします';
				$success_flag = 0;
			}

			//ご来店日チェック
			if(strtotime($_POST['visit_year'] . '-' . $_POST['visit_month'] . '-' . $_POST['visit_day']) < strtotime('2016-11-01')) {
				$data['error_visit_time'] = '当店は2016年11月1日から営業になっております';
				$success_flag = 0;
			}

			//ご注文した料理チェック
			if(!isset($_POST['order_list'])) {
				$data['error_order_list'] = 'ご注文した料理をご選択してお願いいたします';
				$success_flag = 0;
			}

			//料理の味チェック
			if(!isset($_POST['level_flavor'])) {
				$data['error_flavor'] = '料理の味についてのご印象を教えてお願いいたします';
				$success_flag = 0;
			}

			//サービスチェック
			if(!isset($_POST['level_service'])) {
				$data['error_service'] = 'サービスについてのご印象を教えてお願いいたします';
				$success_flag = 0;
			}

			//店内環境チェック
			if(!isset($_POST['level_environment'])) {
				$data['error_environment'] = '店内環境についてのご印象を教えてお願いいたします';
				$success_flag = 0;
			}

			//タイトルチェック
			if(trim($_POST['title']) == '') {
				$data['error_title'] = 'タイトルをご入力してお願いいたします';
				$success_flag = 0;
			}

			//コメントチェック
			if(trim($_POST['comment']) == '') {
				$data['error_comment'] = 'コメントをご入力してお願いいたします';
				$success_flag = 0;
			}

			//送信
			if($success_flag) {
				$enquete_info = array(
						'name' => isset($_POST['secrit']) ? '' : $_POST['name'],
						'secrit_flag' => isset($_POST['secrit']) ? '1' : '0',
						'visit_date' => date('Y-m-d H:i:s', strtotime($_POST['visit_year'] . '-' . $_POST['visit_month'] . '-' . $_POST['visit_day'])),
						'order_list' => implode(',', $_POST['order_list']),
						'level_flavor' => $_POST['level_flavor'],
						'level_service' => $_POST['level_service'],
						'level_environment' => $_POST['level_environment'],
						'title' => $_POST['title'],
						'comment' => $_POST['comment'],
						'create_date' => date('Y-m-d H:i:s')
					);

				$data['sql'] = Model_Enquete::AddEnquete($enquete_info);

				header('Location:/review/enquete/finish/');
				exit;
			}

			//前ページ入力した情報反映
			$data['post_data'] = $_POST;
			if(!isset($data['post_data']['order_list'])) {
				$data['post_data']['order_list'] = array();
			}
			if(!isset($_POST['level_flavor'])) {
				$data['post_data']['level_flavor'] = '0';
			}
			if(!isset($_POST['level_service'])) {
				$data['post_data']['level_service'] = '0';
			}
			if(!isset($_POST['level_environment'])) {
				$data['post_data']['level_environment'] = '0';
			}
		}

		//来店年取得
		if($year == '2016') {
			$select_year = '<input id="sel_visit_year" type="hidden" name="visit_year" value="2016" />2016';
		} else {
			$select_year = '<select id="sel_visit_year" name="year">';
			for($i = 2016; $i <= intval($year); $i++){
				$select_year .= '<option value="' . $i . '"' . ($i == $data['post_data']['visit_year'] ? ' selected' : '') . '>' . $i . '</option>';
			}
			$select_year .= '</select>';
		}
		$data['select_year'] = $select_year;

		//来店月取得
		$select_month = '<select id="sel_visit_month" name="visit_month">';
		for($i = 1; $i < 13; $i++) {
			$select_month .='<option vlaue="' . $i . '"' . ($i == $data['post_data']['visit_month'] ? ' selected' : '') . '>' . $i .'</option>';
		}
		$select_month .= '</select>';
		$data['select_month'] = $select_month;

		//来店日取得
		$select_day = '<select id="sel_visit_day" name="visit_day">';
		switch($month) {
			case '2':
				if(intval($year) % 4 == 0) {
					$last_day = 29;
				} else {
					$last_day = 28;
				}
				break;
			case '4':
			case '6':
			case '9':
			case '11':
				$last_day =30;
				break;
			default:
				$last_day =31;
				break;
		}
		for($i = 1; $i <= $last_day; $i++) {
			$select_day .='<option vlaue="' . $i . '"' . ($i == $data['post_data']['visit_day'] ? ' selected' : '') . '>' . $i .'</option>';
		}
		$select_day .= '</select>';
		$data['select_day'] = $select_day;

		//タンタンメンリスト取得
		$data['tantanmen_list'] = Model_Product::GetProductsBySubType(1, 1, 1);

		//普通麺類単品リスト取得
		$data['noodle_list'] = Model_Product::GetProductsBySubType(1, 2, 1);

		//ご飯類リスト取得
		$data['rice_list'] = Model_Product::GetProductsBySubType(2, 3, 1);

		//タンタンメンリスト取得
		$data['set_list'] = Model_Product::GetSets(1);

		//単品・定食取得
		$data['single_list'] = Model_Product::GetProductsBySubType(4, 4, 1);

		//ちょい飲み お飲物リスト取得
		$data['choinomi_drink_list'] = Model_Product::GetChoinomiDrink(1);

		//ちょい飲み おつまみリスト取得
		$data['choinomi_dishes_list'] = Model_Product::GetChoinomiDishes(1);

		//お飲物リスト取得
		$data['drink_list'] = Model_Product::GetProductsByType(5, 1);
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/review/enquete', $data, false));
	}

	/**
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_finish($param = null)
	{
		session_start();
		$data = array();
		
		//共通ヘッダー取得
		$data['header'] = Request::forge('common/header')->execute()->response();
		//共通サイドバー取得
		$data['sidebar'] = Request::forge('common/sidebar')->execute()->response();
		//共通フッター取得
		$data['footer'] = Request::forge('common/footer')->execute()->response();
		
		//View呼び出す
		return Response::forge(View::forge($this->template . '/review/finish', $data, false));
	}
	
}