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
			<?php foreach($article_list as $article) : ?>
			<div class="main-article">
				<div class="article-list">
					<div class="article-list-image"><img src="/upload/review/<?php echo $article->id; ?>/thumb.jpg"></div>
					<div class="article-list-content">
						<div class="title">
							<a href="/review/article/detail/<?php echo $article->id; ?>/">
								<?php echo mb_strlen($article->title) > 30 ? mb_substr($article->title, 0, 28) . '...' : $article->title; ?>	
							</a>
						</div>
						<div class="info">
							<?php echo date('Y年m月d日', strtotime($article->create_date)); ?><br/>
							「<?php echo $article->site; ?>」から
						</div>
						<div class="link"><a href="/review/article/detail/<?php echo $article->id; ?>/"><div>全文を読む</div></a></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

			<?php if($total_page_number > 1) : ?>
			<div class="main-pager">
				<table>
					<tr>
						<td>
							<ul>
								<?php if($page > 1): ?>
								<a href="/review/article/?page=<?php echo $page - 1; ?>"><li class="long">前へ</li></a>
								<a href="/review/article/"><li>1</li></a>
								<?php endif; ?>
								<?php if($page > 5): ?>
								<li>...</li>
								<?php endif; ?>
								<?php for($i = ($page - 2 > 2 ? $page - 2 : 2); $i < $page; $i++) : ?>
								<a href="/review/article/?page=<?php echo $i; ?>"><li><?php echo $i; ?></li></a>
								<?php endfor; ?>
								<li><?php echo $page; ?></li>
								<?php for($i = $page + 1; $i <= (($page + 2) > ($total_page_number - 1) ? ($total_page_number - 1) : ($page + 2)); $i++) : ?>
								<a href="/review/article/?page=<?php echo $i; ?>"><li><?php echo $i; ?></li></a>
								<?php endfor; ?>
								<?php if($page + 4 < $total_page_number): ?>
								<li>...</li>
								<?php endif; ?>
								<?php if($page < $total_page_number): ?>
								<a href="/review/article/?page=<?php echo $total_page_number; ?>"><li><?php echo $total_page_number; ?></li></a>
								<a href="/review/article/?page=<?php echo $page + 1; ?>"><li class="long">次へ</li></a>
								<?php endif; ?>
							</ul>
						</td>
					</tr>
				</table>
			</div>
			<?php endif; ?>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>