<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ホームページ</title>
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/enquete.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('review/banner-review.jpg');?></a></div>
			<div class="main-article">
				<h2>誠にありがとうございました。</h2>
				<h2>タンタンメン本舗はこれからも</h2>
				<h2>美味しい料理を捧げるために</h2>
				<h2>一生懸命に頑張ります。</h2>
				<h2>どうかよろしくお願いいたします！！</h2>
				<div class="link_top"><a href="/">トップページへ戻る</a></div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>