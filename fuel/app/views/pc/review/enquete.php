<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/enquete.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('pc/common.js'); ?>
	<?php echo Asset::js('pc/enquete.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('review/banner-review.jpg');?></a></div>
			<div class="main-article">
				<h2>ご感想を教えてお願いいたします</h2>
				<form action="" method="post" id="form_enquete">
					<table class="main-article-table" padding="0">
						<tr>
							<th>お名前</th>
							<td>
								<?php if(isset($error_name)) : ?>
								<div class="caution">※<?php echo $error_name; ?></div>
								<?php endif; ?>
								<div class="div_name">
									<?php if(isset($post_data['secrit'])) : ?>
									<input id="chk_secrit" type="checkbox" name="secrit" checked />
									<label for="chk_secrit" class="lbl_checkbox active" id="lbl_secrit">匿名送信したい</label>
									<input id="txt_name" type="text" name="name" maxlength="100" style="display: none" />
									<?php else : ?>
									<input id="chk_secrit" type="checkbox" name="secrit" />
									<label for="chk_secrit" class="lbl_checkbox" id="lbl_secrit">匿名送信したい</label>
									<input id="txt_name" type="text" name="name" maxlength="100" vlaue="<?php echo $post_data['name']; ?>" />
									<?php endif; ?>
								</div>
							</td>
						</tr>
						<tr>
							<th>ご来店日</th>
							<td>
								<?php if(isset($error_visit_time)) : ?>
								<div class="caution">※<?php echo $error_visit_time; ?></div>
								<?php endif; ?>
								<?php echo $select_year;?> 年
								<?php echo $select_month; ?> 月
								<?php echo $select_day; ?> 日
							</td>
						</tr>
						<tr>
							<th>ご注文した料理</th>
							<td class="td_order_list">
								<?php if(isset($error_order_list)) : ?>
								<div class="caution">※<?php echo $error_order_list; ?></div>
								<?php endif; ?>
								<div>
									<label class="lbl_openbutton">ー</label>
									<span class="type">麺類</span>
									<div class="open_area">
										<ul class="list_col3">
											<?php foreach($tantanmen_list as $tantanmen) : ?>
											<li <?php echo strlen($tantanmen->name)>18 ? 'class="long"' : ''; ?>>
												<?php if(in_array('nr' . $tantanmen->id, $post_data['order_list'])) : ?>
												<input id="chk_order_nr<?php echo $tantanmen->id; ?>" type="checkbox" name="order_list[]" value="nr<?php echo $tantanmen->id; ?>" checked>
												<label for="chk_order_nr<?php echo $tantanmen->id; ?>" class="lbl_checkbox active"><?php echo $tantanmen->name; ?></label>
												<?php else : ?>
												<input id="chk_order_nr<?php echo $tantanmen->id; ?>" type="checkbox" name="order_list[]" value="nr<?php echo $tantanmen->id; ?>">
												<label for="chk_order_nr<?php echo $tantanmen->id; ?>" class="lbl_checkbox"><?php echo $tantanmen->name; ?></label>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>
											<?php foreach($noodle_list as $noodle) : ?>
											<li <?php echo strlen($noodle->name)>18 ? 'class="long"' : ''; ?>>
												<?php if(in_array('nr' . $noodle->id, $post_data['order_list'])) : ?>
												<input id="chk_order_nr<?php echo $noodle->id; ?>" type="checkbox" name="order_list[]" value="nr<?php echo $noodle->id; ?>" checked>
												<label for="chk_order_nr<?php echo $noodle->id; ?>" class="lbl_checkbox active"><?php echo $noodle->name; ?></label>
												<?php else : ?>
												<input id="chk_order_nr<?php echo $noodle->id; ?>" type="checkbox" name="order_list[]" value="nr<?php echo $noodle->id; ?>">
												<label for="chk_order_nr<?php echo $noodle->id; ?>" class="lbl_checkbox"><?php echo $noodle->name; ?></label>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
								<div>
									<label class="lbl_openbutton">ー</label>
									<span class="type">ご飯類</span>
									<div class="open_area">
										<ul class="list_col3">
											<?php foreach($rice_list as $rice) : ?>
											<li <?php echo strlen($rice->name)>18 ? 'class="long"' : ''; ?>>
												<?php if(in_array('nr' . $rice->id, $post_data['order_list'])) : ?>
												<input id="chk_order_nr<?php echo $rice->id; ?>" type="checkbox" name="order_list[]" value="nr<?php echo $rice->id; ?>" checked>
												<label for="chk_order_nr<?php echo $rice->id; ?>" class="lbl_checkbox active"><?php echo $rice->name; ?></label>
												<?php else : ?>
												<input id="chk_order_nr<?php echo $rice->id; ?>" type="checkbox" name="order_list[]" value="nr<?php echo $rice->id; ?>">
												<label for="chk_order_nr<?php echo $rice->id; ?>" class="lbl_checkbox"><?php echo $rice->name; ?></label>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>	
										</ul>
									</div>
								</div>
								<div>
									<label class="lbl_openbutton">ー</label>
									<span class="type">セット</span>
									<div class="open_area">
										<ul class="set_list">
											<?php 
											foreach($set_list as $set_group) : 
												foreach($set_group['set_list'] as $set) : 
											?>
											<li>
												<?php if(in_array('st' . $set['id'], $post_data['order_list'])) : ?>
												<input id="chk_order_st<?php echo $set['id']; ?>" type="checkbox" name="order_list[]" value="st<?php echo $set['id']; ?>" checked>
												<label for="chk_order_st<?php echo $set['id']; ?>" class="lbl_checkbox active">
													<?php echo $set_group['group_name']; ?>&nbsp;&nbsp;<?php echo $set['set_name'];?>
												</label>
												<?php else : ?>
												<input id="chk_order_st<?php echo $set['id']; ?>" type="checkbox" name="order_list[]" value="st<?php echo $set['id']; ?>">
												<label for="chk_order_st<?php echo $set['id']; ?>" class="lbl_checkbox">
													<?php echo $set_group['group_name']; ?>&nbsp;&nbsp;<?php echo $set['set_name'];?>
												</label>
												<?php endif; ?>
											</li>
											<?php 
												endforeach; 
											endforeach; 
											?>
										</ul>
									</div>
								</div>
								<div>
									<label class="lbl_openbutton">ー</label>
									<span class="type">単品・定食</span>
									<div class="open_area">
										<ul class="single_list">
											<?php foreach($single_list as $single) : ?>
											<li class="single_name">
												<?php echo $single->name; ?>
											</li>
											<li>
												<?php if(in_array('tp' . $single->id, $post_data['order_list'])) : ?>
												<input id="chk_order_tp<?php echo $single->id; ?>" type="checkbox" name="order_list[]" value="tp<?php echo $single->id; ?>" checked />
												<label for="chk_order_tp<?php echo $single->id; ?>" class="lbl_checkbox active">単品</label>
												<?php else : ?>
												<input id="chk_order_tp<?php echo $single->id; ?>" type="checkbox" name="order_list[]" value="tp<?php echo $single->id; ?>" />
												<label for="chk_order_tp<?php echo $single->id; ?>" class="lbl_checkbox">単品</label>
												<?php endif; ?>
											</li>
											<li>
												<?php if(in_array('ts' . $single->id, $post_data['order_list'])) : ?>
												<input id="chk_order_ts<?php echo $single->id; ?>" type="checkbox" name="order_list[]" value="ts<?php echo $single->id; ?>" checked />
												<label for="chk_order_ts<?php echo $single->id; ?>" class="lbl_checkbox active">定食</label>
												<?php else : ?>
												<input id="chk_order_ts<?php echo $single->id; ?>" type="checkbox" name="order_list[]" value="ts<?php echo $single->id; ?>" />
												<label for="chk_order_ts<?php echo $single->id; ?>" class="lbl_checkbox">定食</label>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
								<div>
									<label class="lbl_openbutton">ー</label>
									<span class="type">ちょい飲み</span><br/>
									<div class="open_area">
										<span class="sub_type">お飲物</span>
										<ul class="list_col2">
											<?php foreach($choinomi_drink_list as $drink) : ?>
											<li <?php echo strlen($drink->name)>33 ? 'class="long"' : ''; ?>>
												<?php if(in_array('ch' . $drink->id, $post_data['order_list'])) : ?>
												<input id="chk_order_ch<?php echo $drink->id; ?>" type="checkbox" name="order_list[]" value="ch<?php echo $drink->id; ?>" checked />
												<label for="chk_order_ch<?php echo $drink->id; ?>" class="lbl_checkbox active"><?php echo $drink->name; ?></label>
												<?php else : ?>
												<input id="chk_order_ch<?php echo $drink->id; ?>" type="checkbox" name="order_list[]" value="ch<?php echo $drink->id; ?>" />
												<label for="chk_order_ch<?php echo $drink->id; ?>" class="lbl_checkbox"><?php echo $drink->name; ?></label>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>
										</ul>
										<span class="sub_type">おつまみ</span>
										<ul class="list_col2">
											<?php foreach($choinomi_dishes_list as $dishes) : ?>
											<li <?php echo strlen($dishes->name)>33 ? 'class="long"' : ''; ?>>
												<?php if(in_array('ch' . $dishes->id, $post_data['order_list'])) : ?>
												<input id="chk_order_ch<?php echo $dishes->id; ?>" type="checkbox" name="order_list[]" value="ch<?php echo $dishes->id; ?>" checked />
												<label for="chk_order_ch<?php echo $dishes->id; ?>" class="lbl_checkbox active"><?php echo $dishes->name; ?></label>
												<?php else : ?>
												<input id="chk_order_ch<?php echo $dishes->id; ?>" type="checkbox" name="order_list[]" value="ch<?php echo $dishes->id; ?>" />
												<label for="chk_order_ch<?php echo $dishes->id; ?>" class="lbl_checkbox"><?php echo $dishes->name; ?></label>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
								<div>
									<label class="lbl_openbutton">ー</label>
									<span class="type">お飲物</span><br/>
									<div class="open_area">
										<?php foreach($drink_list as $sub_type) : ?>
										<span class="sub_type"><?php echo $sub_type['sub_type_name']; ?></span>
										<ul class="list_col2">
											<?php foreach ($sub_type['product_list'] as $drink) : ?>
											<li <?php echo strlen($drink->name)>33 ? 'class="long"' : ''; ?>>
												<?php if(in_array('dr' . $drink->id, $post_data['order_list'])) : ?>
												<input id="chk_order_dr<?php echo $drink->id; ?>" type="checkbox" name="order_list[]" value="dr<?php echo $drink->id; ?>" checked />
												<label for="chk_order_dr<?php echo $drink->id; ?>" class="lbl_checkbox active"><?php echo $drink->name; ?></label>
												<?php else : ?>
												<input id="chk_order_dr<?php echo $drink->id; ?>" type="checkbox" name="order_list[]" value="dr<?php echo $drink->id; ?>" />
												<label for="chk_order_dr<?php echo $drink->id; ?>" class="lbl_checkbox"><?php echo $drink->name; ?></label>
												<?php endif; ?>
											</li>
											<?php endforeach; ?>
										</ul>
										<?php endforeach; ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>ご印象</th>
							<td class="td_level_list">
								<?php if(isset($error_flavor)) : ?>
								<div class="caution">※<?php echo $error_flavor; ?></div>
								<?php endif; ?>
								<ul>
									<li><span class="level_title">料理の味満足度</span></li>
									<?php for($i = 1; $i < intval($post_data['level_flavor']); $i++) : ?>
									<li>
										<input id="rdo_flavor_<?php echo $i; ?>" type="radio" name="level_flavor" value="<?php echo $i; ?>" />
										<label for ="rdo_flavor_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-on.png'); ?></label>
									</li>
									<?php endfor; ?>
									<?php if(intval($post_data['level_flavor'])) : ?>
									<li>
										<input id="rdo_flavor_<?php echo $i; ?>" type="radio" name="level_flavor" value="<?php echo $i; ?>" checked />
										<label for ="rdo_flavor_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-on.png'); ?></label>
									</li>
									<?php endif; ?>
									<?php for($i = intval($post_data['level_flavor']) + 1; $i < 6; $i++) : ?>
									<li>
										<input id="rdo_flavor_<?php echo $i; ?>" type="radio" name="level_flavor" value="<?php echo $i; ?>" />
										<label for ="rdo_flavor_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-off.png'); ?></label>
									</li>
									<?php endfor; ?>
								</ul>
								<?php if(isset($error_service)) : ?>
									<div class="caution">※<?php echo $error_service; ?></div>
								<?php endif; ?>
								<ul>
									<li><span class="level_title">サービス満足度</span></li>
									<?php for($i = 1; $i < intval($post_data['level_service']); $i++) : ?>
									<li>
										<input id="rdo_service_<?php echo $i; ?>" type="radio" name="level_service" value="<?php echo $i; ?>" />
										<label for ="rdo_service_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-on.png'); ?></label>
									</li>
									<?php endfor; ?>
									<?php if(intval($post_data['level_service'])) : ?>
									<li>
										<input id="rdo_service_<?php echo $i; ?>" type="radio" name="level_service" value="<?php echo $i; ?>" checked />
										<label for ="rdo_service_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-on.png'); ?></label>
									</li>
									<?php endif; ?>
									<?php for($i = intval($post_data['level_service']) + 1; $i < 6; $i++) : ?>
									<li>
										<input id="rdo_service_<?php echo $i; ?>" type="radio" name="level_service" value="<?php echo $i; ?>" />
										<label for ="rdo_service_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-off.png'); ?></label>
									</li>
									<?php endfor; ?>
								</ul>
								<?php if(isset($error_environment)) : ?>
									<div class="caution">※<?php echo $error_environment; ?></div>
								<?php endif; ?>
								<ul>
									<li><span class="level_title">店内環境満足度</span></li>
									<?php for($i = 1; $i < intval($post_data['level_environment']); $i++) : ?>
									<li>
										<input id="rdo_environment_<?php echo $i; ?>" type="radio" name="level_environment" value="<?php echo $i; ?>" />
										<label for ="rdo_environment_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-on.png'); ?></label>
									</li>
									<?php endfor; ?>
									<?php if(intval($post_data['level_environment'])) : ?>
									<li>
										<input id="rdo_environment_<?php echo $i; ?>" type="radio" name="level_environment" value="<?php echo $i; ?>" checked />
										<label for ="rdo_environment_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-on.png'); ?></label>
									</li>
									<?php endif; ?>
									<?php for($i = intval($post_data['level_environment']) + 1; $i < 6; $i++) : ?>
									<li>
										<input id="rdo_environment_<?php echo $i; ?>" type="radio" name="level_environment" value="<?php echo $i; ?>" />
										<label for ="rdo_environment_<?php echo $i; ?>" class="rdo_star"><?php echo Asset::img('system/star-off.png'); ?></label>
									</li>
									<?php endfor; ?>
								</ul>
							</td>
						</tr>
						<tr>
							<th>タイトル</th>
							<td>
								<?php if(isset($error_title)) : ?>
								<div class="caution">※<?php echo $error_title; ?></div>
								<?php endif; ?>
								<input id="txt_title" type="text" name="title" maxlength="100" value="<?php echo $post_data['title']; ?>" />
							</td>
						</tr>
						<tr>
							<th>コメント</th>
							<td>
								<?php if(isset($error_comment)) : ?>
								<div class="caution">※<?php echo $error_comment; ?></div>
								<?php endif; ?>
								<textarea name="comment"><?php echo $post_data['comment']; ?></textarea>
							</td>
						</tr>
					</table>
					<div class="div_submit">
						<input type="hidden" name="page" value="form" />
						<label class="lbl_submit">送信</label>
					</div>
				</form>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>