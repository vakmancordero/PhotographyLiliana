var app1 = new Vue({
    el: "#app1",
    data: {
        id: undefined,
        photos: [],
        limit: 0,
        selected: 0,
        url: ""
    }
});


$(function() {



    app1.id = $('#galleryId').val();
    app1.limit = $('#galleryLimit').val();
    var homePath = $('#homePath').val();

    $.ajax({
        url: app1.id + "/getImages",
        type: "GET",
        async: true,
    }).done(function(result) {

        var windowWidth = $(window).width();



        var items = [];

        result.forEach(function(item, index) {

            var url1 = homePath + "/images/aplication/clients/mov/" + item.path;
            //var url2 = homePath + "/images/aplication/clients/computer/" + item.path;

            // items.push($('<div/>')

            //     .append($('<div>')
            //         .prop("style", "background-image: url(" + url1 + ")")
            //         .attr('onclick', "openShow(" + item.id + ")")
            //     )
            //     .append($('<i>')
            //         .prop({ "class": "heart icon" })
            //         .prop({ "id": "heart" })
            //         .attr('onclick', "selectPhoto(" + item.id + ")")
            //     )
            //     .prop('class', 'pint')
            //     .appendTo($("#links"))
            // );

        });

        var $grid = $('#links').masonry();

        $grid.imagesLoaded(function() {

            $grid.masonry();

            $grid.masonry('appended', items);

        });


        app1._data.limit = parseInt(app1._data.limit);
        app1._data.photos = result;
        app1.url = homePath + "/images/aplication/clients/mov/";
        console.log(app1);
    });

});


function selectPhoto(id) {

    for (var i = 0; i < photos.length; i++) {

        if (photos[i].id == id) {

            if (limit)
                photos[i].select = !photos[i].select;
            console.log(photos[i].select);
        }

    }
}

$(document).ready(function() {

    $('#links').on("click", "i#heart", function() {
        $(this).toggleClass('active');
    });

});