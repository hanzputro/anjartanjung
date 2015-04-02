
$(document).ready(function(){

    // when hash is #award then scroll to #award__wrapper 
    if(document.location.hash) {        
        // call function
        $().timelinr({
            arrowKeys: 'true'
        })
        /////// masonry
        // about
        var $container__award = $('#masonry__award');
        $container__award.masonry({
          itemSelector: '.award__about--li'
        });
        /////// bxslider -- about
        var slider = $('.slider__about').bxSlider({        
            captions: true,
            mode: 'fade',
            pager: false
        });
        var thehash = document.location.hash;
        if (thehash == "#award"){           
            $('html, body').animate({scrollTop: $("#award__wrapper").offset().top}, 1400);
            return false;
        }     
    }

    /////// hamburger icon
    $(document).ready(function(){
        $('#hamburger--icon, .overlay__blur').click(function(){
            $('#hamburger--icon').toggleClass('open');
            if($(".header__right--responsive").hasClass('inactive')){ //this is the start of our condition // 
                $('#hamburger--icon').animate({'right' : "-=0px"},"fast").css("position", "fixed");                   
                $('.header__right--responsive').removeClass('inactive');   
                $('.header__right--responsive').animate({'marginRight' : "+=220px"},"fast");
                // $('.container, .container__header, .container__main, .footer__wrapper').animate({'marginLeft' : "-=220px"},"fast");
                $('.container, .container__header, .container__main, .footer__wrapper').addClass('blur');
                $('.overlay__blur').css('display',"block");
                $('html').css('overflow',"hidden");                   
            }
            else{
                $('#hamburger--icon').animate({'right' : "+=0px"},"fast").css("position", "absolute");
                $('.header__right--responsive').addClass('inactive');
                $('.header__right--responsive').animate({'marginRight' : "-=220px"},"fast");
                // $('.container, .container__header, .container__main, .footer__wrapper').animate({'marginLeft' : "+=220px"},"fast");
                $('.container, .container__header, .container__main, .footer__wrapper').removeClass('blur');
                $('.overlay__blur').css('display',"none");
                $('html').css('overflow',"auto");                       
            }
        });
    });

    /////// masonry
    // about
    var $container__award = $('#masonry__award');
    $container__award.masonry({
      itemSelector: '.award__about--li'
    });
    // new AnimOnScroll( document.getElementById( 'masonry__highlights' ), {
    //   minDuration : 0.4,
    //   maxDuration : 0.7,
    //   viewportFactor : 0.2
    // });

    /////// bxslider -- about
    var slider = $('.slider__about').bxSlider({        
        captions: true,
        mode: 'fade',
        pager: false
    });
    /////// bxslider -- businesses
    $('#photo--ul--commercial').bxSlider({
        pagerCustom: '#photo__thumb--commercial',
        mode: 'fade',
        controls: false
    });
    $('#photo--ul--residential').bxSlider({
        pagerCustom: '#photo__thumb--residential',
        mode: 'fade',
        controls: false
    });
    $('#photo--ul--hotel').bxSlider({
        pagerCustom: '#photo__thumb--hotel',
        mode: 'fade',
        controls: false
    });
    $('#photo--ul--information').bxSlider({
        pagerCustom: '#photo__thumb--information',
        mode: 'fade',
        controls: false
    });
    $('#photo--ul--other').bxSlider({
        pagerCustom: '#photo__thumb--other',
        mode: 'fade',
        controls: false
    });
    $('#photo--ul--future').bxSlider({
        pagerCustom: '#photo__thumb--future',
        mode: 'fade',
        controls: false
    });
    $('#photo--ul--hospitality').bxSlider({
        pagerCustom: '#photo__thumb--hospitality',
        mode: 'fade',
        controls: false
    });

    // timelinr
    $().timelinr({
        arrowKeys: 'true'
    })

    /////// responsive img
    // molt($('.molt')).start();
    
    /////// tab career
    $(".tabcareer--ul li:first").addClass("tabcareer--active");
    $(".tabcareer--ul li a").click(function(event) {
        event.preventDefault();
        $(this).closest('li').addClass("tabcareer--active").siblings().removeClass("tabcareer--active");
        var tabcareer = $(this).attr("href");
        $(".tabcontent__career").not(tabcareer).css("display", "none");
        $(tabcareer).fadeIn();
    });

    /////// tab businesses detail
    $(".tabbcat__detail--ul li:first").addClass("tabbcat__detail--active");
    $(".tabbcat__detail--ul li a").click(function(event) {
        event.preventDefault();
        $(this).closest('li').addClass("tabbcat__detail--active").siblings().removeClass("tabbcat__detail--active");
        var tabcareer = $(this).attr("href");
        $(".tabcontainer__bcat__detail").not(tabcareer).css("display", "none");
        $(tabcareer).fadeIn();
    });    

    /////// tab highlights (list & grid)
    $(".filter__h--ul li:first").addClass("filter__h--active");
    $(".filter__h--ul li a").click(function(event) {
        event.preventDefault();
        $(this).closest('li').addClass("filter__h--active").siblings().removeClass("filter__h--active");
        var tab = $(this).attr("href");
        $(".tabcontainer__h").not(tab).css("display", "none");
        $(tab).fadeIn();
    });      


    /*send contact */
    $("#contact").click(function() {
      
         $(".info__alert").remove();
       
       
        var email   = $(".input--contact").val();
        var url     = window.location.origin;
        var domain  = url+"/send";
        var html = "";
       
        $.ajax({
            type: "POST",
            url: domain,
            dataType: "json",
            data: {email: email},
            success: function(ret) {

                    

                    if(ret.result.status == true)
                    {
                        html += " <span class='info__alert alert--success'><span class='icon--alert--success'></span>" + ret.result.msg + "</span>";
                    } else {
                        html += " <span class='info__alert alert--failed'><span class='icon--alert--failed'></span>" +ret.result.msg + "</span>";

                    }

                    $(html).insertAfter( ".form__content--contact" );
                    $(".input--contact").val("");
                    $(".info__alert").show().delay(2000).fadeOut();

               
            }
        });
        return false;
    });

    //contact
    $("#br-submit-contact").click(function(e){
        var form = $(this).parents("form");
        var btn = $(this);
        form.ajaxSubmit(function(ret){

            $(".career-notif").parent("div").remove();
            var html = generate_alert(ret.result.status,ret.result.msg);
            btn.parent("div").before(html);

            if(ret.result.status)
            {
                needRefresh = true;
                
            }

        });

        e.preventDefault();
        return false;

    });
});
