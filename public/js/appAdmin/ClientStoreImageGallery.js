Dropzone.options.addImagesForm = {

    paramName: 'image',
    maxFilesize: 20,
    acceptedFiles: '.jpg, .jpeg, .gif, .png, .bmp',
    addRemoveLinks: true,
    success: function(file, response){
        console.log(file.name);

        file.serverImageId = response.id;

        console.log(response);
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
