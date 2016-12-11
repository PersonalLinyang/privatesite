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
	<?php echo Asset::css('pc/menu/single-set.css'); ?>
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
			<div class="main-image"><?php echo Asset::img('menu/banner-single_set.jpg');?></div>
			<div class="main-article">
				<div>
					<ul class="list-single_set">
						<?php foreach($single_list as $single) : ?>
						<li>
							<div class="div-img">
								<?php 
									try {
										echo Asset::img('upload/menu/thumb/img_p' . $single->id . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('system/img_product_nofound.jpg');
									}
								?>
								<?php 
								if($single->image_list): 
									$image_list = explode(',', $single->image_list);
									$image_count = count($image_list);
								?>
								<a rel="colorbox-<?php echo $single->id; ?>" href="/assets/img/upload/menu/<?php echo $single->id; ?>/<?php echo $image_list[0]; ?>" title="<?php echo $single->name; ?>写真　1/<?php echo $image_count; ?>">
									<div class="div-img-more">
										<div class="icon"><?php echo Asset::img('system/icon-colorbox.png'); ?></div>
										<div class="text">もっと見る</div>
									</div>
								</a>
									<?php if($image_count > 1) : ?>
								<div class="colorbox-hide">
										<?php for($counter = 1; $counter < $image_count; $counter++) : ?>
									<a rel="colorbox-<?php echo $single->id; ?>" href="/assets/img/upload/menu/<?php echo $single->id; ?>/<?php echo $image_list[$counter]; ?>" title="<?php echo $single->name; ?>写真　<?php echo ($counter + 1); ?>/<?php echo $image_count; ?>"></a>
										<?php endfor; ?>
								</div>
								<div class="multi-photo-mark">
									写真<br/>多数
								</div>
								<?php 
									endif;
								endif; 
								?>
							</div>
							<div class="div-info">
								<div class="div-title"><?php echo $single->name; ?></div>
								<?php if($single->caution) : ?>
								<div class="div-caution">(<?php echo $single->caution; ?>)</div>
								<?php endif; ?>
								<table class="table-info">
									<tr><td>単品</td><td class="td-price"><span class="price"><?php echo $single->price; ?></span>円</td></tr>
									<?php if($single->price_set) : ?>
									<tr><td>定食</td><td class="td-price"><span class="price"><?php echo $single->price_set; ?></span>円</td></tr>
									<?php endif; ?>
								</table>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>