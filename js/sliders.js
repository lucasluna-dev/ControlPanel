$(function(){

    // SLIDER PRINCIPAL
    var curSlider = 0;
    var maxSlider = $('.banner-single').length - 1;
    var delay = 2500;
    initSlider();
    changeSlider();

    function initSlider(){
        $('.banner-single').hide();
        $('.banner-single').eq(0).show();
    }
    
    function changeSlider(){
        setInterval(function(){
            $('.banner-single').eq(curSlider).fadeOut(2500);
            curSlider++
            if(curSlider > maxSlider){
                curSlider = 0;
            }
            $('.banner-single').eq(curSlider).fadeIn(2500);
        },delay)
    }

     // SLIDER PEQUENO img-author

       
    /*var Indice = 0;
    var maxIndice = $('.img-author').length - 1;
    var time = 2500;
    iniciarSlider();
    mudarSlider();

    function iniciarSlider(){
        $('.img-author').hide();
        $('.img-author').eq(0).show();
    }
    
    function mudarSlider(){
        setInterval(function(){
            $('.img-author').eq(Indice).fadeOut(2500);
            Indice++
            if(Indice > maxIndice){
                Indice = 0;
            }
            $('.img-author').eq(Indice).fadeIn(2500);
        },time)
    }*/

     

})