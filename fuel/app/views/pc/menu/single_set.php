<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>単品・定食 - タンタンメン本舗</title>
	<meta name="description" content="単品・定食メニューの一覧です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。">
	<meta name="keywords" content="タンタンメン本舗,単品,定食,メニュー">
	<link rel="canonical" href="http://tantanmen-honpo.jp/menu/single_set/">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/menu.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('menu/banner/banner-single_set.jpg');?></a></div>
			<div class="main-article">
				<div class="main-article-title">単品・定食リスト</div>
				<div>
					<ul class="list-single_set">
						<?php foreach($single_list as $single) : ?>
						<li>
							<div class="div-img">
								<?php 
									try {
										echo Asset::img('menu/product/img_p' . $single->id . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('system/img_product_nofound.jpg');
									}
								?>
							</div>
							<div class="div-info">
								<table class="table-info">
									<tr><th colspan="2"><?php echo $single->name; ?></th></tr>
									<tr><td>単品</td><td class="td-price"><span class="price"><?php echo $single->price; ?></span>円</td></tr>
									<?php if($single->price_set) : ?>
									<tr><td>定食</td><td class="td-price"><span class="price"><?php echo $single->price_set; ?></span>円</td></tr>
									<?php endif; ?>
								</table>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>