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

	<div class="main-image"><?php echo Asset::img('menu/banner/banner-drink.jpg');?></div>

	<?php foreach($drink_list as $sub_type_id => $drink_type) : ?>
	<div class="parting-line"></div>
	<div class="main-article">
		<div class="main-article-title"><?php echo $drink_type['sub_type_name']; ?></div>
		<div>
			<table class="table-drink">
				<tr>
					<td class="td-image">
						<?php 
							try {
								echo Asset::img('menu/product/img_st' . $sub_type_id . '.jpg');
							} catch(Exception $e) {
								echo Asset::img('system/img_product_nofound.jpg');
							}
						?>
					</td>
					<td class="td-list">
						<table class="table-drink-list">
							<?php foreach($drink_type['product_list'] as $drink) : ?>
							<tr>
								<td class="td-title"><?php echo $drink->name; ?></td>
							</tr>
							<tr>
								<td class="td-price"><span class="price"><?php echo $drink->price; ?></span>円</td>
							</tr>
						<?php endforeach; ?>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php endforeach; ?>
	
	<?php echo $footer; ?>
</body>
</html>
