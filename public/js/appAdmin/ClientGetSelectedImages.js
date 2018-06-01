$(function() {

    var curriculumId = $('#galleryId').val();
    var homePath = $('#homePath').val();

    $.ajax({
        url: homePath + '/admin/galleryClient/' + curriculumId + '/getImagesSelected',
        type: "GET",
        async: true,
    }).done(function(result) {

        result.forEach(function(item, index) {

            var id = item.album_clients_id;
            var url1 = homePath + "/images/aplication/clients/" + id + "/app/" + item.path;
            var url2 = homePath + "/images/aplication/clients/" + id + "/computer/" + item.path;

            $('<a/>')
                .append($('<div>')
                    .prop({ "style": "background-image: url(" + url1 + ");", 'id': 'photos' }))
                .prop('href', url2)
                .prop('title', item.path)
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