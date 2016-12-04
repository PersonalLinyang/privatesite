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
	<?php echo Asset::css('sp/index.css'); ?>
	<?php echo Asset::css('sp/download/slider-pro.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
	<?php echo Asset::js('sp/index.js'); ?>
	<?php echo Asset::js('sp/download/jquery.sliderPro.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<!-- スライド画像 -->
	<div id="slider-pro" class="slider-pro">
		<div class="sp-slides">
			<div class="sp-slide"><?php echo Asset::img('main_visual/mv-tantanmen.jpg', array('class' => 'sp-image'));?></div>
			<div class="sp-slide"><?php echo Asset::img('main_visual/mv-menu.jpg', array('class' => 'sp-image'));?></div>
			<div class="sp-slide"><?php echo Asset::img('main_visual/mv-tantanmen.jpg', array('class' => 'sp-image'));?></div>
			<div class="sp-slide"><?php echo Asset::img('main_visual/mv-menu.jpg', array('class' => 'sp-image'));?></div>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-video">
		<iframe src="https://www.youtube.com/embed/p7RA6r9rZLg" frameborder="0" allowfullscreen=""></iframe>
	</div>
	<div class="main-normal">
		<div class="caution">
			<a href="https://www.youtube.com/channel/UCLhwocU6brl2OYp57dgUxTA">@Atsushi's LIFE CHANNEL</a>さんからの動画<br>ありがとうございました
		</div>
	</div>

	<div class="parting-line"></div>

	<!-- 当店カレンダー -->
	<div class="main-normal">
		<div class="main-normal-title"><?php echo Asset::img('system/icon-calendar.jpg');?>  当店カレンダー</div>
		<div class="main-normal-content">
			<?php echo $holiday_calendar; ?>
			<div class="caution">※太文字のは営業日でございます</div>
		</div>
	</div>

	<?php echo $footer; ?>
</body>
</html>
