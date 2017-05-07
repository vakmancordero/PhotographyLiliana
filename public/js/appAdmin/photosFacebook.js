$( window ).resize(function() {
    phothosWidth();
});

function phothosWidth() {
    var photoWidth = $('#photos').width();
    $('.photoContainer a ').height(photoWidth);
}

