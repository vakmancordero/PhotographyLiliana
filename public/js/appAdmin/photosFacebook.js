$(document).ready(function(){
   phothosWidth();
});

$( window ).resize(function() {
    phothosWidth();
});

function phothosWidth() {
    var photoWidth = $('#photos').width();
    $('#photoContainer div').height(photoWidth);
}
