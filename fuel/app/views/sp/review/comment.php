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

	<?php foreach($enquete_list as $enquete) : ?>
	<div class="parting-line"></div>
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
				</tr>
				<tr>
					<td>
						<?php echo date('Y年m月d日', strtotime($enquete->visit_date)); ?>
					</td>
				</tr>
				<tr>
					<th>注文した料理</th>
				</tr>
				<tr>
					<td>
						<table class="table-order">
							<?php if(count($enquete->order_list['nr_list'])) : ?>
							<tr>
								<th>主食</th>
							</tr>
							<tr>
								<td>
									<?php echo implode('<br/>', $enquete->order_list['nr_list']); ?>
								</td>
							</tr>
							<?php endif; ?>
							<?php if(count($enquete->order_list['st_list'])) : ?>
							<tr>
								<th>当店セット</th>
							</tr>
							<tr>
								<td>
									<?php echo implode('<br/>', $enquete->order_list['st_list']); ?>
								</td>
							</tr>
							<?php endif; ?>
							<?php if(count($enquete->order_list['tp_list'])) : ?>
							<tr>
								<th>単品</th>
							</tr>
							<tr>
								<td>
									<?php echo implode('<br/>', $enquete->order_list['tp_list']); ?>
								</td>
							</tr>
							<?php endif; ?>
							<?php if(count($enquete->order_list['ts_list'])) : ?>
							<tr>
								<th>定食</th>
							</tr>
							<tr>
								<td>
									<?php echo implode('<br/>', $enquete->order_list['ts_list']); ?>
								</td>
							</tr>
							<?php endif; ?>
							<?php if(count($enquete->order_list['ch_list'])) : ?>
							<tr>
								<th>ちょい飲み</th>
							</tr>
							<tr>
								<td>
									<?php echo implode('<br/>', $enquete->order_list['ch_list']); ?>
								</td>
							</tr>
							<?php endif; ?>
							<?php if(count($enquete->order_list['dr_list'])) : ?>
							<tr>
								<th>お飲物</th>
							</tr>
							<tr>
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
				</tr>
				<tr>
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
	<div class="parting-line"></div>
	<div class="main-pager">
		<table>
			<tr>
				<?php if($page > 1): ?>
				<td><a href="/review/comment/"><div>最初へ</div></a></td>
				<td><a href="/review/comment/?page=<?php echo $page - 1; ?>"><div>前へ</div></a></td>
				<?php endif; ?>
				<?php if($page < $total_page_number): ?>
				<td><a href="/review/comment/?page=<?php echo $page + 1; ?>"><div>次へ</div></a></td>
				<td><a href="/review/comment/?page=<?php echo $total_page_number; ?>"><div>最後へ</div></a></td>
				<?php endif; ?>
			</tr>
		</table>
	</div>
	<div class="parting-line"></div>
	<div class="main-pager">
		<table>
			<tr>
				<?php if($page > 1): ?>
				<td><a href="/review/comment/"><div>1</div></a></td>
				<?php endif; ?>
				<?php if($page > 3): ?>
				<td class="short">...</td>
				<?php endif; ?>
				<?php for($i = ($page - 1 > 2 ? $page - 1 : 2); $i < $page; $i++) : ?>
				<td><a href="/review/comment/?page=<?php echo $i; ?>"><div><?php echo $i; ?></div></a></td>
				<?php endfor; ?>
				<td class="active"><?php echo $page; ?></td>
				<?php for($i = $page + 1; $i <= (($page + 1) > ($total_page_number - 1) ? ($total_page_number - 1) : ($page + 1)); $i++) : ?>
				<td><a href="/review/comment/?page=<?php echo $i; ?>"><div><?php echo $i; ?></div></a></td>
				<?php endfor; ?>
				<?php if($page + 2 < $total_page_number): ?>
				<td class="short">...</td>
				<?php endif; ?>
				<?php if($page < $total_page_number): ?>
				<td><a href="/review/comment/?page=<?php echo $total_page_number; ?>"><div><?php echo $total_page_number; ?></div></a></td>
				<?php endif; ?>
			</tr>
		</table>
	</div>
	<?php endif; ?>

	<?php echo $footer; ?>
</body>
</html>
