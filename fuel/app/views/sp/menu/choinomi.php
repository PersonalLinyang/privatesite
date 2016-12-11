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
	<?php echo Asset::css('sp/menu/choinomi.css'); ?>
	<?php echo Asset::css('sp/colorbox-expand.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-image"><?php echo Asset::img('menu/banner-choinomi.jpg');?></div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">価格</div>
		<div>
			<ul class="list-choinomi-price">
				<li>
					<div>お酒 <span class="price">1</span> 杯 + おつまみ <span class="price">1</span> 皿 <span class="price">&nbsp;&nbsp;780</span> 円</div>
				</li>
				<li>
					<div>お酒 <span class="price">1</span> 杯 + おつまみ <span class="price">2</span> 皿 <span class="price"> 1080</span> 円</div>
				</li>
				<li>
					<div>お酒 <span class="price">1</span> 杯 + おつまみ <span class="price">3</span> 皿 <span class="price"> 1380</span> 円</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">お酒リスト</div>
		<div>
			<ul class="list-choinomi-drink">
				<?php foreach($drink_list as $drink) :?>
				<li><div><?php echo $drink->name; ?></div><li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="parting-line"></div>

	<div class="main-article">
		<div class="main-article-title">おつまみリスト</div>
		<div>
			<ul class="list-choinomi-food">
				<?php foreach($dishes_list as $dishes) : ?>
				<li>
					<div class="div-img">
						<?php 
							try {
								echo Asset::img('upload/menu/thumb/img_p' . $dishes->id . '.jpg');
							} catch(Exception $e) {
								echo Asset::img('system/img_product_nofound.jpg');
							}
						?>
						<?php 
						if($dishes->image_list): 
							$image_list = explode(',', $dishes->image_list);
							$image_count = count($image_list);
						?>
						<a rel="colorbox-<?php echo $dishes->id; ?>" href="/assets/img/upload/menu/<?php echo $dishes->id; ?>/<?php echo $image_list[0]; ?>" title="<?php echo $dishes->name; ?>写真　1/<?php echo $image_count; ?>">
							<div class="div-img-more">
								<div class="icon"><?php echo Asset::img('system/icon-colorbox.png'); ?></div>
								<div class="text">もっと見る</div>
							</div>
						</a>
							<?php if($image_count > 1) : ?>
						<div class="colorbox-hide">
								<?php for($counter = 1; $counter < $image_count; $counter++) : ?>
							<a rel="colorbox-<?php echo $dishes->id; ?>" href="/assets/img/upload/menu/<?php echo $dishes->id; ?>/<?php echo $image_list[$counter]; ?>" title="<?php echo $dishes->name; ?>写真　<?php echo ($counter + 1); ?>/<?php echo $image_count; ?>"></a>
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
						<div class="div-title"><?php echo $dishes->name; ?></div>
						<?php if($dishes->caution) : ?>
						<div class="div-caution">(<?php echo $dishes->caution; ?>)</div>
						<?php endif; ?>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php echo $footer; ?>
</body>
</html>
