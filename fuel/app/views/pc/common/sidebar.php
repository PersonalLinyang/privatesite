<div class="sidebar-area">
	<?php //サイドバー店舗トップ ?>
	<div class="sidebar-maininfo"></div>
	<?php //ニュース速報 ?>
	<div class="sidebar-slide">
		<div class="sidebar-slide-title">ニュース速報</div>
		<div class="sidebar-slide-content">
			<ul>
				<?php foreach($news_list as $news) : ?>
				<li>・<?php echo $news; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php //アンケート導線 ?>
	<div class="sidebar-enquete">
		<div class="link-enquete"><a href="/review/enquete/">来店感想を投稿</a></div>
	</div>
	<?php //トップ戻り ?>
	<a class="sidebar-toplink"><div>ページの先頭へ戻る</div></a>
</div>