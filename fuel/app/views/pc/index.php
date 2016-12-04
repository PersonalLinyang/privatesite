<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
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
