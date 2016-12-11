<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/menu.css'); ?>
	<?php echo Asset::css('pc/menu/drink.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('menu/banner-drink.jpg');?></div>
			<div class="main-article">
				<?php foreach($drink_list as $sub_type_id => $drink_type) : ?>
				<div class="main-article-title"><?php echo $drink_type['sub_type_name']; ?></div>
				<div>
					<table class="table-drink">
						<tr>
							<td class="td-image">
								<?php 
									try {
										echo Asset::img('upload/menu/thumb/img_st' . $sub_type_id . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('system/img_product_nofound.jpg');
									}
								?>
							</div>
							<td class="td-list">
								<table class="table-drink-list">
									<?php foreach($drink_type['product_list'] as $drink) : ?>
									<tr>
										<td class="td-title"><?php echo $drink->name; ?></td>
										<td class="td-price"><span class="price"><?php echo $drink->price; ?></span>円</td>
									</tr>
									<?php endforeach; ?>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>