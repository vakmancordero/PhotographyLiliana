$(document).ready(function(){
   phothosWidth();
});

function phothosWidth() {
    var photoWidth = $('#photos').width();
    $('#photos').css('height' , photoWidth);
}
