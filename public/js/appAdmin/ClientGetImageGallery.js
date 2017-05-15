$(function () {

    var curriculumId = $('#galleryId').val();
    var homePath = $('#homePath').val();

    $.ajax({
        url: homePath + '/admin/galleryClient/' + curriculumId + '/getImages',
        type: "GET",
        async: true,
    }).done(function (result) {

        result.forEach(function (item, index) {

            var url1 = homePath + "/images/aplication/clients/app/" + item.path;
            var url2 = homePath + "/images/aplication/clients/computer/" + item.path;

            $('<a/>')
                .append($('<div>')
                    .prop({"style" : "background-image: url(" + url1 + ");" , 'id' : 'photos'})
                    .append($('<i>')
                        .prop({class:'trash icon' , id:'trash'+item.id})
                        .attr('onclick', "deleteLB("+item.id+")")))
                .prop('href', url2)
                .prop('title', item.name)
                .prop('id', 'linkElement')
                .attr('data-gallery', '#blueimp-gallery-links')
                .appendTo($("#links"));

        });

        phothosWidth();

    });

});

/**
 * Created by Sofia on 15/05/2017.
 */
