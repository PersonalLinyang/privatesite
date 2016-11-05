$(function () {

    //イベント内容表示
    $(".main-image").click(function(){
        $(this).parent().find(".main-article").slideToggle();
    });

});