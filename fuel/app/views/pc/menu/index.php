<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>メニュー - タンタンメン本舗</title>
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
					<?php echo Asset::img('pc/menu/banner/banner-tantanmen.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/set/">
					<?php echo Asset::img('pc/menu/banner/banner-set.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/single_set/">
					<?php echo Asset::img('pc/menu/banner/banner-single_set.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/choinomi/">
					<?php echo Asset::img('pc/menu/banner/banner-choinomi.jpg');?>
				</a>
			</div>
			<div class="main-image">
				<a href="/menu/drink/">
					<?php echo Asset::img('pc/menu/banner/banner-drink.jpg');?>
				</a>
			</div>
		</div>
	</div>
</body>
</html>