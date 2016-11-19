<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>お飲物 - タンタンメン本舗</title>
	<meta name="description" content="お飲物メニューの一覧です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。">
	<meta name="keywords" content="タンタンメン本舗,メニュー,お飲物">
	<link rel="canonical" href="http://tantanmen-honpo.jp/menu/drink/">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/menu.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('menu/banner/banner-drink.jpg');?></a></div>
			<div class="main-article">
				<?php foreach($drink_list as $sub_type_id => $drink_type) : ?>
				<div class="main-article-title"><?php echo $drink_type['sub_type_name']; ?></div>
				<div>
					<table class="table-drink">
						<tr>
							<td class="td-image">
								<?php 
									try {
										echo Asset::img('menu/product/img_st' . $sub_type_id . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('system/img_product_nofound.jpg');
									}
								?>
							</div>
							<td class="td-list">
								<table class="table-drink-list">
									<?php foreach($drink_type['product_list'] as $drink) : ?>
									<tr>
										<td class="td-title"><?php echo $drink->name; ?></td>
										<td class="td-price"><span class="price"><?php echo $drink->price; ?></span>円</td>
									</tr>
									<?php endforeach; ?>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>