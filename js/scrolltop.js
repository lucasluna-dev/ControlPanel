$(function(){
    var animacaoMenu = $('.header-principal');
    menuAnimate();
    function menuAnimate(){
        $('nav a').click(function(){
            var href = $(this).attr('href');
            var offset = $(href).offset().top;
            $('body,html').animate({'scrollTop':offset});
            return false;            
        })
    }
    
})