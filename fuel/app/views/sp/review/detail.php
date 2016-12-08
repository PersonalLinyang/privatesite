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
	<?php echo Asset::css('sp/review.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-image"><?php echo Asset::img('review/banner-review.jpg');?></div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="review-title"><?php echo $article->title; ?></div>
		<div class="review-top-info">
			<?php echo date('Y年m月d日', strtotime($article->create_date)); ?><br/>
			「<?php echo $article->site; ?>」から
		</div>
		<div class="review-content">
			<?php echo $article->content; ?>
		</div>
		<div class="caution">
			原文リンク：<br/>
			<a href="<?php echo $article->link; ?>">
				<?php echo strlen($article->link) > 45 ? substr($article->link, 0, 42) . '...' :  $article->link; ?>
			</a>
		</div>
	</div>

	<?php echo $footer; ?>
</body>
</html>
