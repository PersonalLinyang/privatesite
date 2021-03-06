<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<?php echo Asset::css('pc/download/colorbox.css'); ?>
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/menu.css'); ?>
	<?php echo Asset::css('pc/menu/set.css'); ?>
	<?php echo Asset::css('pc/colorbox-expand.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/download/jquery.colorbox.js'); ?>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('pc/common.js'); ?>
	<?php echo Asset::js('pc/menu.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('menu/banner-set.jpg');?></div>
			<div class="main-article">
				<?php foreach($set_list as $set_group) : ?>
				<div class="main-article-title"><?php echo $set_group['group_name']; ?></div>
				<div>
					<ul class="list-set">
						<?php 
						foreach($set_group['set_list'] as $set) : 
							if($set['main_image']) {
								$main_image_list = explode(',', $set['main_image']);
							} else {
								$main_image_list = array();
							}
							if($set['sub_image']) {
								$sub_image_list = explode(',', $set['sub_image']);
							} else {
								$sub_image_list = array();
							}
							$main_image_count = count($main_image_list);
							$sub_image_count = count($sub_image_list);
							$image_count = count($main_image_list) + count($sub_image_list);
							$image_counter = 1;
						?>
						<li>
							<div class="div-main-img">
								<?php 
								try {
									echo Asset::img('upload/menu/thumb/img_p' . $set['main_id'] . '.jpg');
								} catch(Exception $e) {
									echo Asset::img('system/img_product_nofound.jpg');
								}
								?>
								<?php if($main_image_count) : ?>
								<a rel="colorbox-<?php echo $set['id']; ?>" href="/assets/img/upload/menu/<?php echo $set['main_id']; ?>/<?php echo $main_image_list[0]; ?>" title="<?php echo $set_group['group_name']; ?>　<?php echo $set['set_name']; ?>写真　1/<?php echo $image_count; ?>">
									<div class="div-img-more">
										<div class="icon"><?php echo Asset::img('system/icon-colorbox.png'); ?></div>
										<div class="text">もっと見る</div>
									</div>
								</a>
									<?php if($main_image_count > 1) : ?>
								<div class="colorbox-hide">
										<?php for($counter = 1; $counter < $main_image_count; $counter++) : ?>
									<a rel="colorbox-<?php echo $set['id']; ?>" href="/assets/img/upload/menu/<?php echo $set['main_id']; ?>/<?php echo $main_image_list[$counter]; ?>" title="<?php echo $set_group['group_name']; ?>　<?php echo $set['set_name']; ?>写真　<?php echo ($image_counter + 1); ?>/<?php echo $image_count; ?>"></a>
										<?php 
											$image_counter++;
										endfor; 
										?>
								</div>
								<?php 
									endif;
								elseif($sub_image_count) : 
								?>
								<a class="colorbox-visual">
									<div class="div-img-more">
										<div class="icon"><?php echo Asset::img('system/icon-colorbox.png'); ?></div>
										<div class="text">もっと見る</div>
									</div>
								</a>
								<?php endif; ?>
								<?php if($image_count) : ?>
								<div class="multi-photo-mark">
									写真<br/>多数
								</div>
								<?php endif; ?>
							</div>
							<div class="div-plus">+</div>
							<div class="div-sub-img">
								<?php 
								try {
									echo Asset::img('upload/menu/thumb/img_p' . $set['sub_id'] . '.jpg');
								} catch(Exception $e) {
									echo Asset::img('system/img_product_nofound.jpg');
								}
								?>
								<?php if($sub_image_count) : ?>
								<a rel="colorbox-<?php echo $set['id']; ?>" href="/assets/img/upload/menu/<?php echo $set['sub_id']; ?>/<?php echo $sub_image_list[0]; ?>" title="<?php echo $set_group['group_name']; ?>　<?php echo $set['set_name']; ?>写真　<?php echo ($image_counter + 1); ?>/<?php echo $image_count; ?>">
									<div class="div-img-more">
										<div class="icon"><?php echo Asset::img('system/icon-colorbox.png'); ?></div>
										<div class="text">もっと見る</div>
									</div>
								</a>
									<?php 
									$image_counter = $image_counter + 1;
									if($sub_image_count > 1) : 
									?>
								<div class="colorbox-hide">
										<?php for($counter = 1; $counter < $sub_image_count; $counter++) : ?>
									<a rel="colorbox-<?php echo $set['id']; ?>" href="/assets/img/upload/menu/<?php echo $set['sub_id']; ?>/<?php echo $sub_image_list[$counter]; ?>" title="<?php echo $set_group['group_name']; ?>　<?php echo $set['set_name']; ?>写真　<?php echo ($image_counter + 1); ?>/<?php echo $image_count; ?>"></a>
										<?php 
											$image_counter++;
										endfor; 
										?>
								</div>
								<?php 
									endif;
								elseif($main_image_count) : 
								?>
								<a class="colorbox-visual">
									<div class="div-img-more">
										<div class="icon"><?php echo Asset::img('system/icon-colorbox.png'); ?></div>
										<div class="text">もっと見る</div>
									</div>
								</a>
								<?php endif; ?>
							</div>
							<div class="div-info">
								<div class="div-title"><?php echo $set['set_name']; ?></div>
								<div class="caution" style="padding-left: 20px;">(イベント期間中100円引き)</div>
								<div class="div-price"><span class="price"><?php echo $set['price']; ?></span>円</div>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>