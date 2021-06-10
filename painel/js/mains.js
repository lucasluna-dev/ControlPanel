$(function(){
    var open = true;
    var windowSzie = $(window)[0].innerWidth;
    var targetSizemenu = (window <= 400 ) ? 200 : 250;
    

    if(windowSzie <= 768){
        $('.menu').css('width','0').css('padding','0');
        open = false;
        
    }
    
    $('.icon-menu').click(function(){
        if(open){
            $('.menu').animate({'width':'0','padding':'0'},function(){
                open = false;
            });
                
            $('header,.content').css('width','100%');
            $('header,.content').animate({'left':'0'},function(){
                open = false;
            });
        }else{
            $('.menu').css('display','block');
            $('.menu').animate({'width':targetSizemenu+'px','padding':'10px 0'},function(){
                open = true;
            });

            if(windowSzie > 768)
				$('.content,header').css('width','calc(100% - 250px)');
				$('.content,header').animate({'left':targetSizemenu+'px'},function(){
				open = true;
			});
        }
    })

    $(window).resize(function(){    
		windowSzie = $(window)[0].innerWidth;
		targetSizemenu = (window <= 400) ? 200 : 250;
		if(windowSzie <= 768){
			$('.menu').css('width','0').css('padding','0');
			$('.content,header').css('width','100%').css('left','0');
			open = false;
		}else{
			$('.menu').animate({'width':targetSizemenu+'px','padding':'10px 0'},function(){
				open = true;
			});

			$('.content,header').css('width','calc(100% - 250px)');
			$('.content,header').animate({'left':targetSizemenu+'px'},function(){
			open = true;
			});
		}       

	})

    $('[actionbt=excluir]').click(function(){
        var d = confirm('DESEJA EXLUIR ESSE TÓPICO?');
        if(d == true)
            return true;

        else
            return false;
            
    });
})