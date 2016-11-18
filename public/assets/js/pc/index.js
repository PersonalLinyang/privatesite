$(function () {

    /*======次の画像======*/
    $(".next").hover(function(){
        $(".next").css("background-image", "url(/assets/img/system/image-slide-right-active.png)");
    }, function(){
        $(".next").css("background-image", "url(/assets/img/system/image-slide-right.png)");
    });

    $(".next").click(function() { nextscroll(); });

    function nextscroll() {
        var con = $(".image-slide-content ");
        var offset = ($(".image-slide-content li").width()) * -1;

        con.stop().animate({ left: offset }, "slow", function() {
            var firstItem = $(".image-slide-content ul li").first();
            con.find("ul").append(firstItem);
            $(this).css("left", "0px");
        });
    };

    /*======前の画像======*/
    $(".prev").hover(function(){
        $(".prev").css("background-image", "url(/assets/img/system/image-slide-left-active.png)");
    }, function(){
        $(".prev").css("background-image", "url(/assets/img/system/image-slide-left.png)");
    });

    $(".prev").click(function() {
        var con = $(".image-slide-content ");
        var offset = ($(".image-slide-content li").width() * -1);

        var lastItem = $(".image-slide-content ul li").last();
        con.find("ul").prepend(lastItem);
        con.css("left", offset);
        con.animate({ left: "0px" }, "slow", function() {
        });
    });

    //自動化
    var scrollTimer;
    scrollTimer = setInterval(nextscroll,5000);
    $(".image-slide-area").hover(function() {
        $(".next").show();
        $(".prev").show();
        clearInterval(scrollTimer); 
    }, function() {
        $(".next").hide();
        $(".prev").hide();
        scrollTimer = setInterval(nextscroll,5000);
    });

});