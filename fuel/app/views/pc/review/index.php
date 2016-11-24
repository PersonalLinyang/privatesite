<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>お客様の声 - タンタンメン本舗</title>
	<meta name="description" content="タンタンメン本舗のレビューページです。タンタンメン本舗は神奈川県横浜市坂東橋近くのタンタンメン専門店です。">
	<meta name="keywords" content="タンタンメン本舗,レビュー,感想,口コミ">
	<link rel="canonical" href="http://tantanmen-honpo.jp/review/">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/review.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('review/banner-review.jpg');?></a></div>
			<div class="main-content-2cols">
				<div class="sub-main-content">
					<div class="review-title">ネット上の声</div>
					<div class="review-caution">ネットからから集まった来店の感想です</div>
					<ul>
						<?php foreach($article_list as $article) : ?>
						<li>
							<div class="title">
								<a href="/review/article/detail/<?php echo $article->id; ?>">
									<?php echo mb_strlen($article->title) > 36 ? mb_substr($article->title, 0, 34) . '...' : $article->title; ?>
								</a>
							</div>
							<div class="info">
								<?php echo date('Y年m月d日', strtotime($article->create_date)); ?><br/>
								「<?php echo $article->site; ?>」から
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
					<a href="/review/article/" class="review-link-button"><div>詳しく見る</div></a>
				</div>
				<div class="sub-main-content">
					<div class="review-title">本サイトコメント</div>
					<div class="review-caution">本サイトから投稿した来店の感想です</div>
					<ul>
						<?php foreach($comment_list as $comment) : ?>
						<li>
							<div class="title"><?php echo mb_strlen($comment->title) > 36 ? mb_substr($comment->title, 0, 34) . '...' : $comment->title; ?></div>
							<div class="info">
								<?php echo date('Y年m月d日', strtotime($comment->create_date)); ?><br/>
								<?php echo $comment->secrit_flag == '1' ? '匿名のお客' : $comment->name; ?>様から
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
					<a href="/review/comment/" class="review-link-button"><div>詳しく見る</div></a>
				</div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>