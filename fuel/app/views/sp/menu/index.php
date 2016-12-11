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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-image">
		<a href="/menu/staple/">
			<?php echo Asset::img('menu/banner-staple.jpg');?>
		</a>
	</div>

	<div class="parting-line"></div>

	<div class="main-image">
		<a href="/menu/set/">
			<?php echo Asset::img('menu/banner-set.jpg');?>
		</a>
	</div>

	<div class="parting-line"></div>

	<div class="main-image">
		<a href="/menu/single_set/">
			<?php echo Asset::img('menu/banner-single_set.jpg');?>
		</a>
	</div>

	<div class="parting-line"></div>

	<div class="main-image">
		<a href="/menu/choinomi/">
			<?php echo Asset::img('menu/banner-choinomi.jpg');?>
		</a>
	</div>

	<div class="parting-line"></div>

	<div class="main-image">
		<a href="/menu/drink/">
			<?php echo Asset::img('menu/banner-drink.jpg');?>
		</a>
	</div>
	
	<?php echo $footer; ?>
</body>
</html>
