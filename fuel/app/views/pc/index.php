<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>タンタンメン本舗</title>
	<meta name="description" content="タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。タンタンメンだけではなく、各種麺類、各種ご飯、餃子、単品料理、定食料理、ちょい飲みなど様々な美味しい料理を販売しています、メニューを見るとお気に入りの料理がきっと見つかります。美味しい料理食べたいならぜひタンタンメン本舗へ！">
	<meta name="keywords" content="タンタンメン本舗,横浜,坂東橋,曙町">
	<link rel="canonical" href="http://tantanmen-honpo.jp/">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/index.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('pc/common.js'); ?>
	<?php echo Asset::js('pc/index.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<!-- スライド画像 -->
			<div class="main-image image-slide-area">
				<div class="image-slide-show">
					<div class="image-slide-content">
						<ul>
							<li index="0"><?php echo Asset::img('main_visual/mv-tantanmen.jpg');?></li>
							<li index="1"><?php echo Asset::img('main_visual/mv-menu.jpg');?></li>
						</ul>
					</div>
					<div class="prev">
					</div>
					<div class="next">
					</div>
				</div>
			</div>

			<div class="main-video">
				<iframe width="670" height="386" src="https://www.youtube.com/embed/p7RA6r9rZLg" frameborder="0" allowfullscreen></iframe>
				<div class="caution">
					<a href="https://www.youtube.com/channel/UCLhwocU6brl2OYp57dgUxTA">@Atsushi's LIFE CHANNEL</a>さんからの動画、ありがとうございました
				</div>
			</div>

			<!-- 当店カレンダー -->
			<div class="main-normal">
				<div class="main-normal-title"><?php echo Asset::img('system/icon-calendar.jpg');?>  当店カレンダー</div>
				<div class="main-normal-content">
					<?php echo $holiday_calendar; ?>
					&nbsp;<span class="caution">※丸付けるのは営業日でございます</span>
				</div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>
