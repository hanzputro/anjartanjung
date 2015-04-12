$(document).ready(function(){

    // toggle menu responsive
    $('.responsive__wrapper').click(function(){
        $(".menu-header-menu-container").fadeToggle();
    });

    // toggle comment
    $('.comment__toggle').click(function(){
        event.preventDefault();
        var link = $(this).attr('href');
        $(link).fadeToggle();
    });
});
