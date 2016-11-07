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
			<div class="main-image"><?php echo Asset::img('pc/menu/banner/banner-single_set.jpg');?></a></div>
			<div class="main-article">
				<div class="main-article-title">単品・定食リスト</div>
				<div>
					<ul class="list-single_set">
						<?php foreach($single_list as $single) : ?>
						<li>
							<div class="div-img">
								<?php 
									try {
										echo Asset::img('pc/menu/product/img_p' . $single->id . '.jpg');
									} catch(Exception $e) {
										echo Asset::img('pc/system/img_product_nofound.jpg');
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
		</div>
	</div>
</body>
</html>