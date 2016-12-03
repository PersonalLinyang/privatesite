$(function(){

	/* 追従ヘッダ */
	$(document).ready(function(){
		var headerHeight = $('.header-area')[0].clientHeight;
		$('.header-shadow').animate({height:headerHeight + "px"});
	});

	$('.ja-navi-main').click(function(){
		$('.header-navi').slideToggle();
		$('.overlay').toggle();
	});
	$('.js-navi-sub').click(function(){
		$(this).parent().find('.header-sub-navi').slideToggle();
	});

});