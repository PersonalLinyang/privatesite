<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ホームページ</title>
	<?php echo Asset::css('pc/common.css'); ?>
	<?php echo Asset::css('pc/event.css'); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('pc/common.js'); ?>
	<?php echo Asset::js('pc/event.js'); ?>
</head>
<body class="body-common">
	<?php echo $header; ?>
	<div class="body-area">
		<div class="main-area">
			<div>
				<div class="main-image">
					<?php echo Asset::img('event/event-big_size_free.jpg');?>
				</div>
				<div class="main-article">
					<table class="main-article-table" padding="0">
						<tr><td class="main-article-table-title" colspan="2">麺類全品大盛り無料サービス</td></tr>
						<tr>
							<th>開催期間</th>
							<td>2016年11月4日～</td>
						</tr>
						<tr>
							<th>イベント内容</th>
							<td>
								<p>毎度ありがとうございます！</p>
								<p>おかげさまで、タンタンメン本舗は順調に開店させていただきました。</p>
								<p>皆様の熱愛を応えるために、本店は2016年11月4日から麺類全品大盛り無料サービスを開催いたします。</p>
								<p>美味しいタンタンメンでお腹いっぱいにして、一日の疲れを癒して、極上の幸せを味わってください！</p>
								<p>これからもどうかよろしくお願いいたします！！</p>
							</td>
						</tr>
						<tr>
							<th>対象商品</th>
							<td>タンタンメン、みそタンタンメン、ラーメン、チャーシューメン、タンメン、サンマーメン、五目そば、みそラーメン</td>
						</tr>
					</table>
				</div>
			</div>
			<div>
				<div class="main-image">
					<?php echo Asset::img('event/event-noodle_500.jpg');?>
				</div>
				<div class="main-article">
					<table class="main-article-table" padding="0">
						<tr><td class="main-article-table-title" colspan="2">開店イベント　麺類全品500円</td></tr>
						<tr>
							<th>開催期間</th>
							<td>2016年11月1日～2016年11月3日</td>
						</tr>
						<tr>
							<th>イベント内容</th>
							<td>
								<p>2016年11月1日、タンタンメン本舗はついに開店いたしました！</p>
								<p>開店を記念するため、本店は2016年11月1日からの3日間、麺類全品500円サービスを提供いたします。</p>
								<p>これからはご満足いただけるように、タンタンメン本舗は引き続き一生懸命に美味しい料理を作ることに専念いたします。</p>
								<p>よろしくお願いいたします！お待ちしております！！</p>
							</td>
						</tr>
						<tr>
							<th>対象商品</th>
							<td>タンタンメン、みそタンタンメン、ラーメン、チャーシューメン、タンメン、サンマーメン、五目そば、みそラーメン</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<?php echo $sidebar; ?>
	</div>
</body>
</html>