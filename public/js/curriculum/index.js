
$(function () {
    'use strict'

    var divs = $(".ui.segment");

    for (var i = 0; i < divs.length; i++) {

        var div = divs[i];
        var curriculumId = $(div).find(".light_identifier").val();

        $.ajax({
            url: 'getImages',
            type: "GET",
            data: {
                method: 'inicio',
                id: curriculumId
            },
            async: false,
        }).done(function (result) {

            result.forEach(function (item, index) {

                var url1 = "../images/aplication/curriculum/app/" + item.path;
                var url2 = "../images/aplication/curriculum/computer/" + item.path;

                $('<a/>')
                    // .append($('<div>')).append($('<img>').prop('src', url))
                    .append($('<div>').prop({"style" : "background-image: url(" + url1 + ");" , 'id' : 'photos'}))
                    .prop('href', url2)
                    .prop('title', item.name)
                    .attr('data-gallery', '#blueimp-gallery-links_' + curriculumId)
                    .appendTo($("#links_" + curriculumId));

            });


            // $('#blueimp-gallery')
            //     .on('open', function (event) {
            //
            //     })
            //     .on('opened', function (event) {
            //
            //     })
            //     .on('slide', function (event, index, slide) {
            //         console.log("here" + index);
            //     })
            //     .on('slideend', function (event, index, slide) {
            //         // Gallery slideend event handler
            //     })
            //     .on('slidecomplete', function (event, index, slide) {
            //         // Gallery slidecomplete event handler
            //     })
            //     .on('close', function (event) {
            //         // Gallery close event handler
            //     })
            //     .on('closed', function (event) {
            //         // Gallery closed event handler
            //     });

        });
    }
});
