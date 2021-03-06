
$(function () {

    var blogId = $('#blogId').val();
    var blogName = $('#blogName').val();
    var homePath = $('#homePath').val();

    $.ajax({
        url: homePath + '/admin/blog/upload/getImages/' + blogId,
        type: "GET",
        data: {
            id: blogId
        },
        async: true,

    }).done(function (result) {

        result.forEach(function (item, index) {

            var url1 = homePath + "/images/aplication/blog/app/" + item.path;
            var url2 = homePath + "/images/aplication/blog/computer/" + item.path;

            $('<a/>')
                .append($('<div>')
                    .prop({"style" : "background-image: url(" + url1 + ");" , 'id' : 'photos'})
                    .append($('<i>')
                        .prop({class:'trash icon' , id:'trash'+item.id})
                        .attr('onclick', "deleteLB("+item.id+")")))
                .prop('href', url2)
                .prop('title', blogName)
                .prop('id', 'linkElement')
                .attr('data-gallery', '#blueimp-gallery-links')
                .appendTo($("#links"));

        });

        phothosWidth();
    });

});

