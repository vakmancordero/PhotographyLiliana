$(document).ready(function(){
    var ventana_ancho = $(window).width();
    var ventana_alto = $(window).height();
    var sliderCount = $("#slider-container img").length;
    
    
    $('#slider-container').css('height' , ventana_alto );
    
    $('#slider-container div:gt(0)').hide();
    setInterval(function(){
        
      $('#slider-container div:first-child').fadeOut(1000)
         .next('div').fadeIn(1000)
         .end().appendTo('#slider-container');
 
    }, 4000);    
});
