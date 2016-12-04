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
	<?php echo Asset::css('sp/menu.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-image"><?php echo Asset::img('menu/banner/banner-set.jpg');?></div>

	<?php foreach($set_list as $set_group) : ?>
	<div class="parting-line"></div>
	<div class="main-article">
		<div class="main-article-title"><?php echo $set_group['group_name']; ?></div>
		<div>
			<ul class="list-set">
				<?php foreach($set_group['set_list'] as $set) : ?>
				<li>
					<div class="div-img">
						<?php 
							try {
								echo Asset::img('menu/product/img_p' . $set['main_id'] . '.jpg');
							} catch(Exception $e) {
								echo Asset::img('system/img_product_nofound.jpg');
							}
						?>
						<div class="td-sub-img">
							<?php 
								try {
									echo Asset::img('menu/product/img_p' . $set['sub_id'] . '.jpg');
								} catch(Exception $e) {
									echo Asset::img('system/img_product_nofound.jpg');
								}
							?>
						</div>
					</div>
					<div class="div-info">
						<div class="div-title"><?php echo str_replace(' ＋ ', '<br/> ＋ ', $set['set_name']); ?></div>
						<div class="div-price"><span class="price"><?php echo $set['price']; ?></span>円</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php endforeach; ?>
	
	<?php echo $footer; ?>
</body>
</html>
