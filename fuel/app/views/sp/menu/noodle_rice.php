<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<?php echo Asset::css('sp/download/colorbox.css'); ?>
	<?php echo Asset::css('sp/common.css'); ?>
	<?php echo Asset::css('sp/menu.css'); ?>
	<?php echo Asset::css('sp/menu/noodle-rice.css'); ?>
	<?php echo Asset::css('sp/colorbox-expand.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/download/jquery.colorbox.js'); ?>
	<?php echo Asset::js('sp/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
	<?php echo Asset::js('sp/menu.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-image"><?php echo Asset::img('menu/banner/banner-tantanmen.jpg');?></div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">麺類</div>
		<div class="main-article-subtitle">タンタンメン</div>
		<div>
			<ul class="list-noodle_rice">
				<?php foreach ($tantanmen_list as $tantanmen) : ?>
				<li>
					<div class="product-area">
						<div class="div-img">
							<?php 
								try {
									echo Asset::img('upload/menu/thumb/img_p' . $tantanmen->id . '.jpg');
								} catch(Exception $e) {
									echo Asset::img('system/img_product_nofound.jpg');
								}
							?>
							<?php 
							if($tantanmen->image_list): 
								$image_list = explode(',', $tantanmen->image_list);
								$image_count = count($image_list);
							?>
							<a rel="colorbox-<?php echo $tantanmen->id; ?>" href="/assets/img/upload/menu/<?php echo $tantanmen->id; ?>/<?php echo $image_list[0]; ?>" title="<?php echo $tantanmen->name; ?>写真　1/<?php echo $image_count; ?>">
								<div class="div-img-more">
								</div>
							</a>
								<?php if($image_count > 1) : ?>
							<div class="colorbox-hide">
									<?php for($counter = 1; $counter < $image_count; $counter++) : ?>
								<a rel="colorbox-<?php echo $tantanmen->id; ?>" href="/assets/img/upload/menu/<?php echo $tantanmen->id; ?>/<?php echo $image_list[$counter]; ?>" title="<?php echo $tantanmen->name; ?>写真　<?php echo ($counter + 1); ?>/<?php echo $image_count; ?>"></a>
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
							<div class="div-title"><?php echo $tantanmen->name; ?></div>
							<?php if($tantanmen->caution) : ?>
							<div class="div-caution">(<?php echo $tantanmen->caution; ?>)</div>
							<?php endif; ?>
							<div class="div-price"><span class="price"><?php echo $tantanmen->price; ?></span>円</div>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="div-kara-select">
			<div class="div-title">お好みの辛さもご指定できます</div>
			<ul class="list-select">
				<li class="honnori">ほんのり</li>
				<li class="futsu">普通</li>
				<li class="chukara">中辛</li>
				<li class="okara">大辛</li>
				<li class="mechakara">メッチャ辛</li>
			</ul>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-subtitle">その他の麺類</div>
		<div>
			<ul class="list-noodle_rice">
				<?php foreach ($noodle_list as $noodle) : ?>
				<li>
					<div class="product-area">
						<div class="div-img">
							<?php 
								try {
									echo Asset::img('upload/menu/thumb/img_p' . $noodle->id . '.jpg');
								} catch(Exception $e) {
									echo Asset::img('system/img_product_nofound.jpg');
								}
							?>
							<?php 
							if($noodle->image_list): 
								$image_list = explode(',', $noodle->image_list);
								$image_count = count($image_list);
							?>
							<a rel="colorbox-<?php echo $noodle->id; ?>" href="/assets/img/upload/menu/<?php echo $noodle->id; ?>/<?php echo $image_list[0]; ?>" title="<?php echo $noodle->name; ?>写真　1/<?php echo $image_count; ?>">
								<div class="div-img-more">
								</div>
							</a>
								<?php if($image_count > 1) : ?>
							<div class="colorbox-hide">
									<?php for($counter = 1; $counter < $image_count; $counter++) : ?>
								<a rel="colorbox-<?php echo $noodle->id; ?>" href="/assets/img/upload/menu/<?php echo $noodle->id; ?>/<?php echo $image_list[$counter]; ?>" title="<?php echo $noodle->name; ?>写真　<?php echo ($counter + 1); ?>/<?php echo $image_count; ?>"></a>
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
							<div class="div-title"><?php echo $noodle->name; ?></div>
							<?php if($noodle->caution) : ?>
							<div class="div-caution">(<?php echo $noodle->caution; ?>)</div>
							<?php endif; ?>
							<div class="div-price"><span class="price"><?php echo $noodle->price; ?></span>円</div>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-subtitle">トッピング メニュー</div>
		<div>
			<ul class="list-topping">
				<?php foreach ($topping_list as $topping) : ?>
				<li>
					<div>
						<table>
							<tr>
								<td class="td-title"><?php echo $topping->name; ?></td>
								<td class="td-price"><span class="price"><?php echo $topping->price; ?></span>円</td>
							</tr>
						</table>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">ご飯類</div>
		<div>
			<ul class="list-noodle_rice">
				<?php foreach ($rice_list as $rice) : ?>
				<li>
					<div class="product-area">
						<div class="div-img">
							<?php 
								try {
									echo Asset::img('upload/menu/thumb/img_p' . $rice->id . '.jpg');
								} catch(Exception $e) {
									echo Asset::img('system/img_product_nofound.jpg');
								}
							?>
							<?php 
							if($rice->image_list): 
								$image_list = explode(',', $rice->image_list);
								$image_count = count($image_list);
							?>
							<a rel="colorbox-<?php echo $rice->id; ?>" href="/assets/img/upload/menu/<?php echo $rice->id; ?>/<?php echo $image_list[0]; ?>" title="<?php echo $rice->name; ?>写真　1/<?php echo $image_count; ?>">
								<div class="div-img-more">
								</div>
							</a>
								<?php if($image_count > 1) : ?>
							<div class="colorbox-hide">
									<?php for($counter = 1; $counter < $image_count; $counter++) : ?>
								<a rel="colorbox-<?php echo $rice->id; ?>" href="/assets/img/upload/menu/<?php echo $rice->id; ?>/<?php echo $image_list[$counter]; ?>" title="<?php echo $rice->name; ?>写真　<?php echo ($counter + 1); ?>/<?php echo $image_count; ?>"></a>
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
							<div class="div-title"><?php echo $rice->name; ?></div>
							<?php if($rice->caution) : ?>
							<div class="div-caution">(<?php echo $rice->caution; ?>)</div>
							<?php endif; ?>
							<div class="div-price"><span class="price"><?php echo $rice->price; ?></span>円</div>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php echo $footer; ?>
</body>
</html>
