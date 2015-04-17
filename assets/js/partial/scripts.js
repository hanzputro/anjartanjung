$(document).ready(function(){

    /////////// gallery portfolio hover
    $('.portfolio ul').on('mouseover', function(e) {
        $('.portfolio ul li').css("opacity", "0.3");
        $(this).css("opacity", "1");
    });
    $('.portfolio').on('mouseout', function(e) {
        $('.portfolio ul li').css("opacity", "1");
    });

    /////////// lightbox/popup gallery preview
    $('.venobox').venobox();

    //////////// popup preview
    $(".assets__preview").click(function(event) {
        event.preventDefault();
        var ahref_preview = $(this).attr("href");
        $(ahref_preview).removeClass("popup--hide").addClass("popup--show");
    });    
    //////////// close popup preview
    $(".popup__preview--close").click(function(event) {
        $('.popup--wrapper ,'+ $(this).attr('href')).removeClass("popup--show").addClass("popup--hide");
    });

    //////////// toggle menu responsive
    $('.responsive__wrapper').click(function(){
        $(".menu-header-menu-container").fadeToggle();
    });

    //////////// toggle comment
    $('.comment__toggle').click(function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        $(link).fadeToggle();
    });

    //////////// social media share
    var popupCenter = function(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 3) - (h / 3)) + dualScreenTop;

        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    };

    ///////////// option themes
    $('.all_options').slideUp();
    $('.input_title h3').click(function(){
    if($(this).parent().next('.all_options').css('display')=='none'){    
        $(this).removeClass('inactive');
        $(this).addClass('active');
        $(this).children('img').removeClass('inactive');
        $(this).children('img').addClass('active');
    }
    else{
        $(this).removeClass('active');
        $(this).addClass('inactive');
        $(this).children('img').removeClass('active');
        $(this).children('img').addClass('inactive');
    }
    $(this).parent().next('.all_options').slideToggle('slow');
    });
});
