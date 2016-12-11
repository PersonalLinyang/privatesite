$(document).ready(function(){
    $("a[rel^=colorbox-]").colorbox({
        maxWidth: "750px",
        maxHeight: "550px",
        opacity: 0.7
    });
    
    $('a[rel^=colorbox-]').hover(function(){
        $(this).find('.div-img-more').fadeIn();
    }, function(){
        $(this).find('.div-img-more').fadeOut();
    });
    
    $('.colorbox-visual').hover(function(){
        $(this).find('.div-img-more').fadeIn();
    }, function(){
        $(this).find('.div-img-more').fadeOut();
    });
    
    $('.colorbox-visual').click(function(){
        if($(this).closest('li').find('a[rel^=colorbox-]').length > 0) {
            $(this).closest('li').find('a[rel^=colorbox-]')[0].click();
        }
    });
});