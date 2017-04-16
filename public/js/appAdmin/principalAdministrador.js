$('#toggle').click(function(){
    $('.ui.sidebar').sidebar('toggle');
});

sidebarVisible();

$(document).ready(function(){

});

$( window ).resize(function() {
    sidebarVisible();
});


function sidebarVisible() {
    var windowidth = $(window).width();

    if (windowidth < 768) {
        $('#idMenu').removeClass('visible').addClass('right');
    } else if(windowidth >=768){
        $('#idMenu').removeClass('right').addClass('visible');
    }
}
