$(document).ready(function(){            
    sliderHeight();    
    var sliderCount = $("#slider-container img").length;                    
    
    $('#slider-container div:gt(0)').hide();
    
    setInterval(function(){        
        slider(); 
    }, 6000);    
    
    $('#slider-container div').eq(3).css('display' , 'block');
});

var button = 0;

function sliderHeight() { 
    
    var ventana_ancho = $(window).width();            
    var ventana_alto = $(window).height();
    if(ventana_ancho > 1200) {                 
        $('#slider-container').css('height' , ventana_alto );
        
    } else { 
        var redimencion = ventana_ancho / 3;
        redimencion = redimencion * 2;        
        $('#slider-container').css('height' , redimencion );
        $('#slider-container').css('top' , 52 );
    }         
}

function sliderNext() { 
    $('#slider-container div:first-child').fadeOut(1000)
        .next('div').fadeIn(1000)
        .end().appendTo('#slider-container');
    button = 1;
         
}

function sliderBefore() { 
    $('#slider-container div:first-child').fadeOut(1000)
         .next('div').fadeIn(1000)
         .end().appendTo('#slider-container');
         
    button = 1;
}

function slider() { 
    if(button === 0 ) {
        $('#slider-container div:first-child').fadeOut(1000)
             .next('div').fadeIn(1000)
             .end().appendTo('#slider-container');
    } else {
        button = 0;
    }
}