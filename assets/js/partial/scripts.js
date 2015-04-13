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
    $('.comment__toggle').click(function(){
        event.preventDefault();
        var link = $(this).attr('href');
        $(link).fadeToggle();
    });
});
