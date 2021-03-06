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
			<?php foreach($enquete_list as $enquete) : ?>
			<div class="main-article">
				<div class="review-title"><?php echo $enquete->title; ?></div>
				<div class="review-top-info">
					<?php echo date('Y年m月d日', strtotime($enquete->create_date)); ?>&nbsp;&nbsp;&nbsp;
					<?php echo $enquete->secrit_flag == '1' ? '匿名のお客' : $enquete->name; ?>様から
				</div>
				<div>
					<table class="main-article-table">
						<tr>
							<th>ご来店日</th>
							<td>
								<?php echo date('Y年m月d日', strtotime($enquete->visit_date)); ?>
							</td>
						</tr>
						<tr>
							<th>注文した料理</th>
							<td>
								<table class="table-order">
									<?php if(count($enquete->order_list['nr_list'])) : ?>
									<tr>
										<th>主食</th>
										<td>
											<?php echo implode('<br/>', $enquete->order_list['nr_list']); ?>
										</td>
									</tr>
									<?php endif; ?>
									<?php if(count($enquete->order_list['st_list'])) : ?>
									<tr>
										<th>当店セット</th>
										<td>
											<?php echo implode('<br/>', $enquete->order_list['st_list']); ?>
										</td>
									</tr>
									<?php endif; ?>
									<?php if(count($enquete->order_list['tp_list'])) : ?>
									<tr>
										<th>単品</th>
										<td>
											<?php echo implode('<br/>', $enquete->order_list['tp_list']); ?>
										</td>
									</tr>
									<?php endif; ?>
									<?php if(count($enquete->order_list['ts_list'])) : ?>
									<tr>
										<th>定食</th>
										<td>
											<?php echo implode('<br/>', $enquete->order_list['ts_list']); ?>
										</td>
									</tr>
									<?php endif; ?>
									<?php if(count($enquete->order_list['ch_list'])) : ?>
									<tr>
										<th>ちょい飲み</th>
										<td>
											<?php echo implode('<br/>', $enquete->order_list['ch_list']); ?>
										</td>
									</tr>
									<?php endif; ?>
									<?php if(count($enquete->order_list['dr_list'])) : ?>
									<tr>
										<th>お飲物</th>
										<td>
											<?php echo implode('<br/>', $enquete->order_list['dr_list']); ?>
										</td>
									</tr>
									<?php endif; ?>
								</table>
							</td>
						</tr>
						<tr>
							<th>ご印象</th>
							<td>
								<table class="table-level">
									<tr>
										<th>料理の味満足度</th>
										<td><?php for($i = 0; $i < $enquete->level_flavor; $i++) { echo '★'; } ?></td>
									</tr>
									<tr>
										<th>サービス満足度</th>
										<td><?php for($i = 0; $i < $enquete->level_service; $i++) { echo '★'; } ?></td>
									</tr>
									<tr>
										<th>店内環境満足度</th>
										<td><?php for($i = 0; $i < $enquete->level_environment; $i++) { echo '★'; } ?></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr><th colspan="2" class="comment-title">コメント</th></tr>
						<tr><td colspan="2"><?php echo nl2br($enquete->comment); ?></td></tr>
					</table>
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
								<a href="/review/comment/?page=<?php echo $page - 1; ?>"><li class="long">前へ</li></a>
								<a href="/review/comment/"><li>1</li></a>
								<?php endif; ?>
								<?php if($page > 4): ?>
								<li>...</li>
								<?php endif; ?>
								<?php for($i = ($page - 2 > 2 ? $page - 2 : 2); $i < $page; $i++) : ?>
								<a href="/review/comment/?page=<?php echo $i; ?>"><li><?php echo $i; ?></li></a>
								<?php endfor; ?>
								<li><?php echo $page; ?></li>
								<?php for($i = $page + 1; $i <= (($page + 2) > ($total_page_number - 1) ? ($total_page_number - 1) : ($page + 2)); $i++) : ?>
								<a href="/review/comment/?page=<?php echo $i; ?>"><li><?php echo $i; ?></li></a>
								<?php endfor; ?>
								<?php if($page + 3 < $total_page_number): ?>
								<li>...</li>
								<?php endif; ?>
								<?php if($page < $total_page_number): ?>
								<a href="/review/comment/?page=<?php echo $total_page_number; ?>"><li><?php echo $total_page_number; ?></li></a>
								<a href="/review/comment/?page=<?php echo $page + 1; ?>"><li class="long">次へ</li></a>
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