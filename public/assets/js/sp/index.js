$(function(){

	$( document ).ready(function( $ ) {
		$( '#slider-pro' ).sliderPro({
			buttons: true, //スライダーのページャを表示する
			startSlide: 0, //最初のスライドを指定する
			arrows: true, //左右の矢印ボタンを表示する
			width: '100%', //横幅を設定する
			height: 500, //高さを設定する
			autoplay: true, //自動再生の設定
			loop: true, //スライドをループさせる設定
			visibleSize: '100%', //前後のスライドを表示するかの設定
			forceSize: 'fullWidth' //スライダーの幅をブラウザ幅に設定する
		});
	});
	
});