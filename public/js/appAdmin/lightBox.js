$(document).keyup(function(e) {

    if (e.keyCode == 27) { // escape key maps to keycode `27`
        closeModal();
    }

    else if(e.keyCode == 37) {
        plusSlides(-1);
    }
    else if(e.keyCode == 39) {
        plusSlides(1);
    }
});




function openModal() {
    $('#myModal').css('display' , "block");
}

function closeModal() {
    $('#myModal').css('display' ,"none");
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

var ventanaWidth = $(window).width();

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = $(".mySlides");
    var dots = $(".demo");
    var captionText = $("#caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove('activeLight');
    }


    slides[slideIndex-1].classList.add("activeLight");
    var slidesWidth = $(".activeLight").height();
    if (slidesWidth <= ventanaWidth) {
        $('.modal-content').css({ 'height': '90%', 'width' : 'auto'});
    } else {
        $('.modal-content').css({ 'height': 'auto', 'width' : '90%'});
        $('.activeLight img').css({ 'height': 'auto', 'width' : '100%'});
    }
}


function ajustLightbox(){
    var ventanaWidth = $(window).width();
}