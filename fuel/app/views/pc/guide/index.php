<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<link rel="canonical" href="<?php echo $canonical; ?>">
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/guide.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNec7O3yCFpIdsHK5rOVU4HRqiwikjrwU&callback=initMap&language=ja"></script>
	<?php echo Asset::js('pc/google-analytics.js'); ?>
	<?php echo Asset::js('pc/common.js'); ?>
	<?php echo Asset::js('pc/guide.js'); ?>
</script>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-image"><?php echo Asset::img('guide/banner-guide.jpg');?></a></div>
			<div class="main-article">
				<table class="main-article-table" padding="0">
					<tr><td class="main-article-table-title" colspan="2">当店情報</td></tr>
					<tr>
						<th>店名</th>
						<td>タンタンメン本舗</td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td>045-294-9045</td>
					</tr>
					<tr>
						<th>住所</th>
						<td>〒231-0057<br/>神奈川県横浜市中区曙町3丁目44-2<br/><a id="map-link" href="#map">地図で確認</a></td>
					</tr>
					<tr>
						<th>アクセス</th>
						<td>
							阪東橋駅より徒歩3分<br/>
							阪東橋駅から273m<br/>
						</td>
					</tr>
					<tr>
						<th>営業時間</th>
						<td>昼：11:30～15:00<br/>夜：17:30～24:00</td>
					</tr>
					<tr>
						<th>定休日</th>
						<td>無定休</td>
					</tr>
					<tr>
						<th>カード</th>
						<td>不可</td>
					</tr>
				</table>
				<table class="main-article-table" padding="0">
					<tr><td class="main-article-table-title" colspan="2">席・設備</td></tr>
					<tr>
						<th>席数</th>
						<td>
							合計　　　　　20席<br/>
							カウンター席　 6席<br/>
							テーブル席　　14席<br/>
						</td>
					</tr>
					<tr>
						<th>個室</th>
						<td>無</td>
					</tr>
					<tr>
						<th>貸切</th>
						<td>不可</td>
					</tr>
					<tr>
						<th>禁煙・喫煙</th>
						<td>全面喫煙可</td>
					</tr>
					<tr>
						<th>駐車場</th>
						<td>無（100メートル以内に有料駐車場あり）</td>
					</tr>
				</table>
				<div id="map"></div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
	<?php echo $footer; ?>
</body>
</html>