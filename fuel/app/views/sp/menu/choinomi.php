<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<?php echo Asset::css('sp/common.css'); ?>
	<?php echo Asset::css('sp/menu.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-image"><?php echo Asset::img('menu/banner/banner-choinomi.jpg');?></div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">価格</div>
		<div>
			<ul class="list-choinomi-price">
				<li>
					<div>お酒 <span class="price">1</span> 杯 + おつまみ <span class="price">1</span> 皿 <span class="price">&nbsp;&nbsp;780</span> 円</div>
				</li>
				<li>
					<div>お酒 <span class="price">1</span> 杯 + おつまみ <span class="price">2</span> 皿 <span class="price"> 1080</span> 円</div>
				</li>
				<li>
					<div>お酒 <span class="price">1</span> 杯 + おつまみ <span class="price">3</span> 皿 <span class="price"> 1380</span> 円</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">お酒リスト</div>
		<div>
			<ul class="list-choinomi-drink">
				<?php foreach($drink_list as $drink) :?>
				<li><div><?php echo $drink->name; ?></div><li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-article">
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
	
	<?php echo $footer; ?>
</body>
</html>
