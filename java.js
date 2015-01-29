var imagedivs;

$(document).ready(function () {
    imagedivs = $('.imagediv');
    
    //make Love button clickable 

//make the hate button clickable 
    $('.highlight span').on('click', function () {
        $(this).parent().parent().addClass('imagediv-selected');
        $(this).addClass('active').siblings().removeClass('active');
        /*
        if ($(this).prevAll(
            '.glyphicon-heart-empty').hasClass('love_btn_color')) {
            $(this).prevAll(
                '.glyphicon-heart-empty').removeClass('love_btn_color');
            $(this).addClass('hate_btn_color');

        } else if ($(this).prev(
            '.glyphicon-thumbs-up').hasClass('like_btn_color')) {
            $(this).prev(
                '.glyphicon-thumbs-up').removeClass('like_btn_color');
            $(this).addClass('hate_btn_color');
        } else {
            $(this).addClass('hate_btn_color');
        }
    
        if(!$(this).hasClass('highlight-selected')) {
            $(this).addClass('highlight-selected');
        }
    
        // Check how many highlight-selected there are
        var test = $('.highlight.highlight-selected').length;
        console.log(test);
        */
        var selected_imagedivs = $('.imagediv.imagediv-selected');
        if(imagedivs.length === selected_imagedivs.length) {
            $('#btn-continue').removeClass('disabled');
        }
        
        var preference = 0;
        if($(this).hasClass('love-btn')) {
            preference = 4;
        } else if( $(this).hasClass('like-btn')) {
            preference = 3;
        } else {
            preference = 0;
        }
        
        $(this).parent().parent().find('.location-input').val(preference);
    });
});

/*full screen background image on the home page*/
function fullscreenFix(){
    var h = $('body').height();
    // set .fullscreen height
    $(".content-b").each(function(i){
        if($(this).innerHeight() <= h){
            $(this).closest(".fullscreen").addClass("not-overflow");
        }
    });
}
$(window).resize(fullscreenFix);
fullscreenFix();

/* resize background images */
function backgroundResize(){
    var windowH = $(window).height();
    $(".background").each(function(i){
        var path = $(this);
        // variables
        var contW = path.width();
        var contH = path.height();
        var imgW = path.attr("data-img-width");
        var imgH = path.attr("data-img-height");
        var ratio = imgW / imgH;
        // overflowing difference
        var diff = parseFloat(path.attr("data-diff"));
        diff = diff ? diff : 0;
        // remaining height to have fullscreen image only on parallax
        var remainingH = 0;
        if(path.hasClass("parallax")){
            var maxH = contH > windowH ? contH : windowH;
            remainingH = windowH - contH;
        }
        // set img values depending on cont
        imgH = contH + remainingH + diff;
        imgW = imgH * ratio;
        // fix when too large
        if(contW > imgW){
            imgW = contW;
            imgH = imgW / ratio;
        }
        //
        path.data("resized-imgW", imgW);
        path.data("resized-imgH", imgH);
        path.css("background-size", imgW + "px " + imgH + "px");
    });
}
$(window).resize(backgroundResize);
$(window).focus(backgroundResize);
backgroundResize();