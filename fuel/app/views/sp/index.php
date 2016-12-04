<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>タンタンメン本舗</title>
	<meta name="description" content="タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。タンタンメンだけではなく、各種麺類、各種ご飯、餃子、単品料理、定食料理、ちょい飲みなど様々な美味しい料理を販売しています、メニューを見るとお気に入りの料理がきっと見つかります。美味しい料理食べたいならぜひタンタンメン本舗へ！">
	<meta name="keywords" content="タンタンメン本舗,横浜,坂東橋,曙町">
	<link rel="canonical" href="http://tantanmen-honpo.jp/">
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
