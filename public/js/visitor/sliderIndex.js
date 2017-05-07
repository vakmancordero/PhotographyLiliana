$(document).ready(function(){            
    sliderPosition();
    var sliderCount = $("#slider-container img").length;                    
    
    $('#slider-container div:gt(0)').hide();
    
    setInterval(function(){        
        slider(); 
    }, 6000);    
    
    // $('#slider-container div').eq(3).css('display' , 'none');
});


$(window).resize(function(){
    sliderPosition();
});


var button = 0;

function sliderPosition() {
    
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

    var sliderHeight = $('#slider-container').height();

    // $('#directionContainer').height(sliderHeight);

        sliderHeight = sliderHeight/2;
    var directionsTop =  $('#rightSlider').height()/2;
        directionsTop = sliderHeight -directionsTop;


    $('.directions').css('margin-top', directionsTop);
}

function sliderNext() { 
    $('#slider-container div:first-child').fadeOut(500)
        .next('div').fadeIn(500)
        .end().appendTo('#slider-container');
    button = 1;
         
}

function sliderBefore() {
    $('#slider-container div:last-child').prependTo('#slider-container').fadeIn(500);
    $('#slider-container div:nth-child(2)').fadeOut();
         
    button = 1;
}

function slider() { 
    if(button === 0 ) {
        $('#slider-container div:nth-child(1)').fadeOut(1000)
             .next('div').fadeIn(1000)
             .end().appendTo('#slider-container');
    } else {
        button = 0;
    }


}
