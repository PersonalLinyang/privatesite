<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<?php echo Asset::css('pc/common.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
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