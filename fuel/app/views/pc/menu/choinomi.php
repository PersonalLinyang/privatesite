<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ホームページ</title>
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/menu.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('menu/banner/banner-choinomi.jpg');?></a></div>
			<div class="main-article">
				<div class="main-article-title">価格</div>
				<div>
					<ul class="list-choinomi-price">
						<li>
							<div>お酒<span class="big-price"> 1 </span>杯&nbsp;+&nbsp;おつまみ<span class="big-price"> 1 </span>皿&nbsp;&nbsp;<span class="big-price">　780 </span>円</div>
						</li>
						<li>
							<div>お酒<span class="big-price"> 1 </span>杯&nbsp;+&nbsp;おつまみ<span class="big-price"> 2 </span>皿&nbsp;&nbsp;<span class="big-price"> 1080 </span>円</div>
						</li>
						<li>
							<div>お酒<span class="big-price"> 1 </span>杯&nbsp;+&nbsp;おつまみ<span class="big-price"> 3 </span>皿&nbsp;&nbsp;<span class="big-price"> 1380 </span>円</div>
						</li>
					</ul>
				</div>
				<div class="main-article-title">お酒リスト</div>
				<div>
					<ul class="list-choinomi-drink">
						<?php foreach($drink_list as $drink) :?>
						<li><div><?php echo $drink->name; ?></div><li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="main-article-title">おつまみリスト</div>
				<div>
					<ul class="list-choinomi-food">
						<?php foreach($dishes_list as $dishes) : ?>
						<li>
							<div>
								<?php 
									try {
										echo Asset::img('menu/product/img_p' . $dishes->id . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('system/img_product_nofound.jpg');
									}
								?>
							</div>
							<div><?php echo $dishes->name; ?></div>
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