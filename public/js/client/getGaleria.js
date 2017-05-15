$(function () {



    var galeriaId = $('#galleryId').val();
    var homePath = $('#homePath').val();

    $.ajax({
        url: galeriaId + "/getImages",
        type: "GET",
        async: true,
    }).done(function (result) {

        var windowWidth = $(window).width();

        var items = [];

        result.forEach(function (item, index) {

            console.log(item);

            var url1 = homePath + "/images/aplication/clients/mov/" + item.path;

            if (windowWidth >= 800) {

                var url2 = homePath + "/images/aplication/clients/computer/" + item.path;

            } else {

                var url2 = url1;

            }

            items.push($('<a/>')
                .append($('<img>')
                    .prop({"src" : url1 }))
                .prop('href', url2)
                .prop('title', item.name)
                .prop('class', 'pint')
                .attr('data-gallery', '#blueimp-gallery-links')
                .appendTo($("#links"))
            );

        });

        var $grid = $('#links').masonry();

        $grid.imagesLoaded(function () {

            $grid.masonry();

            $grid.masonry('appended', items);

        });

    });

});
