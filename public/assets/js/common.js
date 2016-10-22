$(function(){

  $(".header-navi li").mouseover(function(){
    if($(this).hasClass("js-navi-sub")) {
      $(this).addClass("active-sub");
      $(this).find("div.header-sub-navi").stop().show();
    } else {
      $(this).addClass("active");
    }
  });

  $(".header-navi li").mouseout(function(){
    if($(this).hasClass("js-navi-sub")) {
      $(this).find("div.header-sub-navi").stop().hide();
      $(this).removeClass("active-sub");
    } else {
      $(this).removeClass("active");
    }
  });

});