<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>タンタンメン本舗</title>
	<?php echo Asset::css('sp/common.css'); ?>
	<?php echo Asset::css('sp/index.css'); ?>
	<?php echo Asset::css('sp/download/slider-pro.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/common.js'); ?>
	<?php echo Asset::js('sp/index.js'); ?>
	<?php echo Asset::js('sp/download/jquery.sliderPro.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="parting-line"></div>
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
	<!-- 当店カレンダー -->
	<div class="main-normal">
		<div class="main-normal-title"><?php echo Asset::img('system/icon-calendar.jpg');?>  当店カレンダー</div>
		<div class="main-normal-content">
			<?php echo $holiday_calendar; ?>
			&nbsp;<span class="caution">※丸付けるのは営業日でございます</span>
		</div>
	</div>
	<div class="parting-line"></div>
	<?php echo $footer; ?>
</body>
</html>
