$(function(){

    var fadeOutMenu = $('.menu-mobile');
    $('.icon-menu').click(function(){
        $('.menu-mobile').slideToggle();
    })

    $('nav a').click(function(){
       fadeOutMenu.fadeOut();
    })


    
})