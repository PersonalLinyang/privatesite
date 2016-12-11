$(function() {
    $('[rel^=colorbox-').colorbox({
        maxWidth: "80%",
        maxHeight: "70%",
        opacity: 0.7
    });
    
    $('.colorbox-visual').click(function(){
        if($(this).closest('li').find('[rel^=colorbox-').length > 0) {
            $(this).closest('li').find('[rel^=colorbox-')[0].click();
        }
    });
});