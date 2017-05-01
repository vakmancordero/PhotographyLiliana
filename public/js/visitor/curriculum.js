/**
 * Created by Sofia on 01/05/2017.
 */

$(function () {
    'use strict'


    var curriculumId = $('#curriculumId').val();
    var homePath = $('#homePath').val();



    $.ajax({
        url: 'fotos/' + curriculumId,
        type: "GET",

        async: true,
    }).done(function (result) {
        var windowWidth = $(window).width();

        result.forEach(function (item, index) {

            var url1 = homePath + "/images/aplication/curriculum/mov/" + item.path;


            if(windowWidth >=1100){
                var url2 = homePath + "/images/aplication/curriculum/computer/" + item.path;
            } else if( windowWidth >=659) {
                var url2 = homePath + "/images/aplication/curriculum/tablet/" + item.path;
            } else {
                var url2 = url1;
            }


            var items = $('<a/>')
                            .append($('<img>')
                                .prop({"src" : url1 }))
                            .prop('href', url2)
                            .prop('title', item.name)
                            .prop('class', 'pint')
                            .attr('data-gallery', '#blueimp-gallery-links')
                            .appendTo($("#links"));

            $grid.append(items)
                .masonry('appended', items);
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



});