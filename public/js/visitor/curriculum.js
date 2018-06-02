/**
 * Created by Sofia on 01/05/2017.
 */

$(function() {

    'use strict'

    var curriculumId = $('#curriculumId').val();
    var homePath = $('#homePath').val();

    $.ajax({
        url: 'fotos/' + curriculumId,
        type: "GET",
        async: true,
    }).done(function(result) {

        var windowWidth = $(window).width();

        var items = [];

        result.forEach(function(item, index) {

            var url1 = homePath + "/images/aplication/curriculum/mov/" + item.path;

            if (windowWidth >= 1100) {

                var url2 = homePath + "/images/aplication/curriculum/computer/" + item.path;

            } else if (windowWidth >= 659) {

                var url2 = homePath + "/images/aplication/curriculum/tablet/" + item.path;

            } else {

                var url2 = url1;

            }

            items.push($('<a/>')
                .append($('<img>')
                    .prop({ "src": url1 }))
                .prop('href', url2)
                .prop('title', item.name)
                .prop('class', 'pint')
                .attr('data-gallery', '#blueimp-gallery-links')
                .appendTo($("#links"))
            );

        });

        var $grid = $('#links').masonry();

        $grid.imagesLoaded(function() {

            $grid.masonry();

            $grid.masonry('appended', items);

        });

    });

});

$(window).load(function() {
    moveAlbum();
});

function moveAlbum() {


    $("#albumContent").animate({
        top: '75vh'

    }, 1500, function() {

        // getImages(0);
    });


}