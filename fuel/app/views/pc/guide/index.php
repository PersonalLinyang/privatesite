<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>当店案内 - タンタンメン本舗</title>
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/guide.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNec7O3yCFpIdsHK5rOVU4HRqiwikjrwU&callback=initMap&language=ja"></script>
	<?php echo Asset::js('pc/common.js'); ?>
	<?php echo Asset::js('pc/guide.js'); ?>
</script>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div class="main-content-article">
				<h2>当店案内</h2>
				<table class="guide-table" padding="0">
					<tr>
						<th>店名</th>
						<td>タンタンメン本舗</td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td></td>
					</tr>
					<tr>
						<th>住所</th>
						<td>〒231-0057<br/>神奈川県横浜市中区曙町3丁目44-2</td>
					</tr>
					<tr>
						<th>アクセス</th>
						<td>
							京浜急行黄金町駅下車　徒歩6分<br/>
							横浜市営地下鉄阪東橋駅下車　徒歩５分<br/>
							鎌倉街道沿い、横浜橋バス停近く<br/>
							距離阪东桥 260 米<br/>
						</td>
					</tr>
					<tr>
						<th>営業時間</th>
						<td></td>
					</tr>
					<tr>
						<th>定休日</th>
						<td></td>
					</tr>
				</table>
				<div id="map" style="width:600px;height: 500px;margin: auto;"></div>
			</div>
		</div>
		<div class="sidebar-area">
			<div class="sidebar-content">
				キクラゲ・野菜・肉・玉子炒め<br/>test<br/>
			</div>
			<div class="sidebar-content">
				test<br/>test<br/>
			</div>
			<div class="sidebar-content">
				test<br/>test<br/>
			</div>
		</div>
	</div>
</body>
</html>