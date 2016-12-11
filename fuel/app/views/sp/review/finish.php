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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('sp/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-image"><?php echo Asset::img('review/banner-review.jpg');?></div>

	<div class="parting-line"></div>

	<div class="main-article">
		<h2>誠にありがとうございました。</h2>
		<h2>タンタンメン本舗はこれからも</h2>
		<h2>美味しい料理を捧げるために</h2>
		<h2>一生懸命に頑張ります。</h2>
		<h2>どうかよろしくお願いいたします！！</h2>
		<div class="link-top"><a href="/">トップページへ戻る</a></div>
	</div>

	<?php echo $footer; ?>
</body>
</html>
