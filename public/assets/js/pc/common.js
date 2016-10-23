$(function(){

  //ヘッダナビにマウスを通過する動作
  $(".header-navi li").mouseover(function(){
    if($(this).hasClass("js-navi-sub")) {
      //サブナビがある場合
      $(this).addClass("active-sub");
      $(this).find("div.header-sub-navi").stop().show();
    } else {
      //サブナビがない場合
      $(this).addClass("active");
    }
  });

  //ヘッダナビにマウスを離れる動作
  $(".header-navi li").mouseout(function(){
    if($(this).hasClass("js-navi-sub")) {
      //サブナビがある場合
      $(this).find("div.header-sub-navi").stop().hide();
      $(this).removeClass("active-sub");
    } else {
      //サブナビがない場合
      $(this).removeClass("active");
    }
  });

});