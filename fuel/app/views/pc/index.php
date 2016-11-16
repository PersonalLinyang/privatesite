<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>タンタンメン本舗</title>
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/index.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
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
							<li index="0"><a href="/guide/"><?php echo Asset::img('main_visual/mv-tantanmen.jpg');?></a></li>
							<li index="1"><a href="/menu/"><?php echo Asset::img('main_visual/mv-menu.jpg');?></a></li>
						</ul>
					</div>
					<div class="prev">
					</div>
					<div class="next">
					</div>
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
</body>
</html>
