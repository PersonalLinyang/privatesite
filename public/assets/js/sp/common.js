$(function(){

	/* 追従ヘッダ メニューを表示　メニューボタンクリック */
	$('.ja-navi-main').click(function(){
		if($(this).hasClass('active')) {
			$('.header-navi').slideUp();
			$('.overlay').hide();
			$('body').css({
				overflow: '',
				height:   ''
			});
			$(this).removeClass('active');
		} else {
			$('.header-navi').slideDown();
			$('.overlay').show();
			$('body').css({
				overflow: 'hidden',
				height:   '100%'
			});
			$(this).addClass('active');
		}
	});

	/* 追従ヘッダ メニューを表示　灰色背景クリック */
	$('.overlay').click(function(){
		$('.header-navi').slideUp();
		$(this).hide();
		$('body').css({
			overflow: '',
			height:   ''
		});
		$('.ja-navi-main').removeClass('active');
	});

	/* 追従ヘッダ サブメニューを表示 */
	$('.js-navi-sub').click(function(){
		$(this).parent().find('.header-sub-navi').slideToggle();
	});

	/* 追従ヘッダ 先頭へ戻るボタンクリック */
	$('.header-toplink').click(function(){
    	$("html,body").animate({scrollTop:0}, 'slow');
		$('.header-navi').slideUp();
		$('.overlay').hide();
		$('body').css({
			overflow: '',
			height:   ''
		});
		$('.ja-navi-main').removeClass('active');
	});

});