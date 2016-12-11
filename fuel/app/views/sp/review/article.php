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

	<?php foreach($article_list as $article) : ?>
	<div class="parting-line"></div>
	<div class="main-article">
		<div class="article-list-image"><?php echo Asset::img('upload/article/' . $article->id . '/thumb.jpg');?></div>
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
	<?php endforeach; ?>

	<?php if($total_page_number > 1) : ?>
	<div class="parting-line"></div>
	<div class="main-pager">
		<table>
			<tr>
				<?php if($page > 1): ?>
				<td><a href="/review/article/"><div>最初へ</div></a></td>
				<td><a href="/review/article/?page=<?php echo $page - 1; ?>"><div>前へ</div></a></td>
				<?php endif; ?>
				<?php if($page < $total_page_number): ?>
				<td><a href="/review/article/?page=<?php echo $page + 1; ?>"><div>次へ</div></a></td>
				<td><a href="/review/article/?page=<?php echo $total_page_number; ?>"><div>最後へ</div></a></td>
				<?php endif; ?>
			</tr>
		</table>
	</div>
	<div class="parting-line"></div>
	<div class="main-pager">
		<table>
			<tr>
				<?php if($page > 1): ?>
				<td><a href="/review/article/"><div>1</div></a></td>
				<?php endif; ?>
				<?php if($page > 3): ?>
				<td class="short">...</td>
				<?php endif; ?>
				<?php for($i = ($page - 1 > 2 ? $page - 1 : 2); $i < $page; $i++) : ?>
				<td><a href="/review/article/?page=<?php echo $i; ?>"><div><?php echo $i; ?></div></a></td>
				<?php endfor; ?>
				<td class="active"><?php echo $page; ?></td>
				<?php for($i = $page + 1; $i <= (($page + 1) > ($total_page_number - 1) ? ($total_page_number - 1) : ($page + 1)); $i++) : ?>
				<td><a href="/review/article/?page=<?php echo $i; ?>"><div><?php echo $i; ?></div></a></td>
				<?php endfor; ?>
				<?php if($page + 2 < $total_page_number): ?>
				<td class="short">...</td>
				<?php endif; ?>
				<?php if($page < $total_page_number): ?>
				<td><a href="/review/article/?page=<?php echo $total_page_number; ?>"><div><?php echo $total_page_number; ?></div></a></td>
				<?php endif; ?>
			</tr>
		</table>
	</div>
	<?php endif; ?>

	<?php echo $footer; ?>
</body>
</html>
