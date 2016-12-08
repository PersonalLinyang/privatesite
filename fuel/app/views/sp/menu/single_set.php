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

	<div class="main-image"><?php echo Asset::img('menu/banner/banner-single_set.jpg');?></div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">単品・定食リスト</div>
		<div>
			<ul class="list-single_set">
				<?php foreach($single_list as $single) : ?>
				<li>
					<div class="div-img">
						<?php 
							try {
								echo Asset::img('menu/product/img_p' . $single->id . '.jpg');
							} catch(Exception $e) {
								echo Asset::img('system/img_product_nofound.jpg');
							}
						?>
					</div>
					<div class="div-info">
						<table class="table-info">
							<tr><th colspan="2"><?php echo $single->name; ?></th></tr>
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
	
	<?php echo $footer; ?>
</body>
</html>