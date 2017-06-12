var homePath = $('#homePath').val();

Dropzone.options.addImagesForm = {

    paramName: 'image',
    maxFilesize: 30,
    parallelUploads:1,
    acceptedFiles: '.jpg, .jpeg, .gif, .png',
    addRemoveLinks: true,
    success: function(file, response){
        console.log(file.name);

        file.serverImageId = response.id;

        console.log(response);

        console.log(file.name);

        file.serverImageId = response.id;

        console.log(response);

        var url1 = homePath + "/images/aplication/curriculum/app/" + response.path;
        var url2 = homePath + "/images/aplication/curriculum/computer/" + response.path;

        $('<a/>')
            .append($('<div>')
                .prop({"style" : "background-image: url(" + url1 + ");" , 'id' : 'photos'})
                .append($('<i>')
                    .prop({class:'trash icon' , id:'trash'+response.id})
                    .attr('onclick', "deleteLB("+response.id+")")))
            .prop('href', url2)
            .prop('title', response.name)
            .prop('id', 'linkElement')
            .attr('data-gallery', '#blueimp-gallery-links')
            .prependTo($("#links"));

        phothosWidth();

        $('.dz-preview.dz-processing.dz-image-preview.dz-complete').remove();

    },
    removedfile: function(file) {

        $.ajax({
            type: 'GET',
            url: '/admin/curriculum/images/' + file.serverImageId,
            success: function(data) {
                toastr.success('La imagen ha sido eliminada correctamente')
            },
            error: function(data) {
                console.log("Error");
                console.log(data);
            }
        });

        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }

};

$(function () {

    $("form.deleteImageForm").on("submit", function(event) {

        event.preventDefault();

        var element = $(this);
        var action = element.attr("action");

        alertify.confirm("Eliminar imagen...", "Está seguro de eliminar la imagen?.",

            function(){

                $.ajax({
                    type: 'GET',
                    url: action,
                    success: function(data) {

                        alertify.success('La imagen ha sido eliminada correctamente!');

                        element = element.parent().parent();

                        element.fadeOut(500, function(){
                            element.remove();
                        });

                    },
                    error: function(data) {
                        console.log("Error");
                        console.log(data);
                    }
                });

            },
            function(){
                alertify.error('Eliminación cancelada');
            }

        );

    });

});


setInterval(function(){
    $('.dz-preview.dz-processing.dz-image-preview.dz-complete').remove();
}, 10000);