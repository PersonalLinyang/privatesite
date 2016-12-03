<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ネット上の声詳細 - タンタンメン本舗</title>
	<meta name="description" content="タンタンメン本舗のレビューページ(ネット上の声)です。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。">
	<meta name="keywords" content="タンタンメン本舗,レビュー,感想,口コミ,ネット上の声">
	<link rel="canonical" href="http://tantanmen-honpo.jp/review/">
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
			<div class="main-image"><?php echo Asset::img('review/banner-review.jpg');?></a></div>
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