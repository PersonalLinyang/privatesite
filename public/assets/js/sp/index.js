$(function(){

	$( document ).ready(function( $ ) {
		$( '#slider-pro' ).sliderPro({
			buttons: false, //スライダーのページャを表示する
			startSlide: 0, //最初のスライドを指定する
			arrows: true, //左右の矢印ボタンを表示する
			autoplay: true, //自動再生の設定
			loop: true, //スライドをループさせる設定
			autoHeight: true, //スライダーの高さが要素の高さによって調整されるか否か 初期:false
			visibleSize: '100%', //前後のスライドを表示するかの設定
			forceSize: 'fullWidth' //スライダーの幅をブラウザ幅に設定する
		});
	});
	
});