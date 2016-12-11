<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/index.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
	<?php echo Asset::js('pc/index.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-article main-404">
				<h2>誠に申し訳ございません！</h2>
				<h2>お探しのページは見つかりませんでした。</h2>
				<h2>サイト更新などによってURLが変更になったか、</h2>
				<h2>URLが正しく入力されていない可能性があります。</h2>
				<h2>お手数ですが下部サイトマップより</h2>
				<h2>お求めのページをお探しください。</h2>
				<div class="link_top"><a href="/">トップページへ戻る</a></div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>
