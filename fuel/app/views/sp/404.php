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
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('sp/common.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>

	<div class="main-article main-404">
		<h2>誠に申し訳ございません！</h2>
		<h2>お探しのページは<br/>見つかりませんでした。</h2>
		<h2>サイト更新などによって<br/>URLが変更になったか、</h2>
		<h2>URLが正しく入力されていない<br/>可能性があります。</h2>
		<h2>お手数ですがメニューより<br/>お求めのページをお探しください。</h2>
		<div class="link-top"><a href="/">トップページへ戻る</a></div>
	</div>
	
	<?php echo $footer; ?>
</body>
</html>
