heightEverithing();
$(document).ready(function(){

    moveBlog();

});



function getImages() {
    var gallery = $('#blogGal').val();

    if (gallery == 1) {

        var blogId = $('#blogId').val();
        var homePath = $('#homePath').val();

        $.ajax({
            url: homePath + '/blogGallery/' + blogId,
            type: "GET",

        }).done(function (result) {




            result.forEach(function (item, index) {





                if (pantallaWidth >= 1100) {
                    var url1 = homePath + "/images/aplication/blog/tablet/" + item.path;
                    var url2 = homePath + "/images/aplication/blog/computer/" + item.path;
                } else if (windowWidth >= 659) {
                    var url1 = homePath + "/images/aplication/blog/tablet/" + item.path;
                    var url2 = homePath + "/images/aplication/blog/tablet/" + item.path;
                } else {
                    var url1 = homePath + "/images/aplication/blog/mov/" + item.path;
                    var url2 = homePath + "/images/aplication/blog/mov/" + item.path;
                }

                 var nuevo = $('<a/>')
                                .append($('<img>')
                                    .prop({"src": url1}))
                                .prop('href', url2)
                                .prop('title', 'Blog')
                                .attr('data-gallery', '#blueimp-gallery-links')
                                .appendTo($("#links"));

                nuevo.imagesLoaded(function(){
                    heightEverithing();
                });

            });

        });
    }//If gallery exist

}

var pantallaWidth = $(window).width();

function moveBlog(){

    if(pantallaWidth >= 900) {
        var landingHeight = $('#landing').height() / 2;

        $("#blogContent").animate({
            top: landingHeight

        }, 1000, function () {
            getImages();
        });
    }
}

function heightEverithing(){

    $('.everything').height($('#blogContent').height());

}