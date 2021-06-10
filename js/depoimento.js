$(function(){
    
    //REPLICANDO OS DEPOIMENTOS E AS BULLETS.
    var amt;
    iniciarSlider();
    function iniciarSlider(){
        amt = $('.sobre-cliente').length;
        var sizeContainer = 100 * amt;
        var sizeBoxSingle = 100 / amt;
        $('.sobre-cliente').css('width',sizeBoxSingle+'%');
        $('.scroll-wraper').css('width',sizeContainer+'%');

        for(var i = 0; i < amt; i++){
            if(i == 0)
                $('.slider-bullets').append('<span style="background-color: rgb(46, 3, 46) ;"></span>');
            else
                $('.slider-bullets').append('<span></span>');   
        }        
    }

    //SLIDDER PARA DEPOIEMTNOS NA PAGINA HOME
        var delay = 3000;
        var curindex = 0;
        AutoPlay();
        function AutoPlay(){
            setInterval(function(){
                curindex++;
                if(curindex == amt)
                    curindex = 0;
                goToSlider(curindex);
            },delay)
        }
        

    function goToSlider(curindex){
        var offSetx = $('.sobre-cliente').eq(curindex).offset().left - $('.scroll-wraper').offset().left;
        $('.slider-bullets span').css('background-color','silver');
        $('.slider-bullets span').eq(curindex).css('background-color','rgb(46, 3, 46)');
        $('.scroll-cliente').stop().animate({'scrollLeft':offSetx+'px'}); 
    }

    $('window').resize(function(){
        $('.scroll-cliente').stop().animate({'scrollLeft':0}); 
    })

    
})