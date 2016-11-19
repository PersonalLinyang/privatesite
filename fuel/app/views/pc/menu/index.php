<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>メニュー - タンタンメン本舗</title>
	<meta name="description" content="販売中のメニュー一覧です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。">
	<meta name="keywords" content="タンタンメン本舗,メニュー,一覧">
	<link rel="canonical" href="http://tantanmen-honpo.jp/menu/">
	<?php echo Asset::css('pc/common.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image">
				<a href="/menu/noodle_rice/">
					<?php echo Asset::img('menu/banner/banner-tantanmen.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/set/">
					<?php echo Asset::img('menu/banner/banner-set.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/single_set/">
					<?php echo Asset::img('menu/banner/banner-single_set.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/choinomi/">
					<?php echo Asset::img('menu/banner/banner-choinomi.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/drink/">
					<?php echo Asset::img('menu/banner/banner-drink.jpg');?>
				</a>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>