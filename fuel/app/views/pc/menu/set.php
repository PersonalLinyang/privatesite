<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ホームページ</title>
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/menu.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('menu/banner/banner-set.jpg');?></a></div>
			<div class="main-article">
				<?php foreach($set_list as $set_group) : ?>
				<div class="main-article-title"><?php echo $set_group['group_name']; ?></div>
				<div>
					<table class="table-set">
						<?php foreach($set_group['set_list'] as $set) : ?>
						<tr>
							<td class="td-main-img">
								<?php 
									try {
										echo Asset::img('menu/product/img_p' . $set['main_id'] . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('system/img_product_nofound.jpg');
									}
								?>
							</td>
							<td class="td-plus">+</td>
							<td class="td-sub-img">
								<?php 
									try {
										echo Asset::img('menu/product/img_p' . $set['sub_id'] . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('system/img_product_nofound.jpg');
									}
								?>
							</td>
							<td class="td-title"><?php echo $set['set_name']; ?></td>
							<td class="td-price"><span class="price"><?php echo $set['price']; ?></span>円</td>
						</tr>
						<?php endforeach; ?>
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