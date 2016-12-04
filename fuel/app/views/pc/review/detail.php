<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/review.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('review/banner-review.jpg');?></div>
			<div class="main-article">
				<div class="review-title"><?php echo $article->title; ?></div>
				<div class="review-top-info">
					<?php echo date('Y年m月d日', strtotime($article->create_date)); ?>&nbsp;&nbsp;&nbsp;
					「<?php echo $article->site; ?>」から
				</div>
				<div class="review-content">
					<?php echo $article->content; ?>
				</div>
				<div class="caution">原文リンク：<a href="<?php echo $article->link; ?>"><?php echo $article->link; ?></a></div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>