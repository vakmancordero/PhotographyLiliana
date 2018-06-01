var homePath = $('#homePath').val();
var idGallery = $('#galleryId').val();

// var myDropzone = new Dropzone($("#addImagesForm").dropzone({ url: homePath + "/admin/galleryClient/" + idGallery +"/upload"}));
//
// myDropzone.on("complete", function(file) {
//     myDropzone.removeFile(file);
// });

Dropzone.options.addImagesForm = {

    paramName: 'image',
    maxFilesize: 30,
    parallelUploads: 1,
    acceptedFiles: '.jpg, .jpeg, .gif, .png',
    addRemoveLinks: true,
    success: function(file, response) {

        var id = response.album_clients_id;
        console.log(file.name);

        file.serverImageId = response.id;

        console.log(response);

        var url1 = homePath + "/images/aplication/clients/" + id + "/app/" + response.path;
        var url2 = homePath + "/images/aplication/clients/" + id + "/computer/" + response.path;

        $('<a/>')
            .append($('<div>')
                .prop({ "style": "background-image: url(" + url1 + ");", 'id': 'photos' })
                .append($('<i>')
                    .prop({ class: 'trash icon', id: 'trash' + response.id })
                    .attr('onclick', "deleteLB(" + response.id + ")")))
            .prop('href', url2)
            .prop('title', response.name)
            .prop('id', 'linkElement')
            .attr('data-gallery', '#blueimp-gallery-links')
            .prependTo($("#links"));

        phothosWidth();

        // $('.dz-preview.dz-processing.dz-image-preview.dz-complete').remove();

    },
    error: function(file, errorMessage, xhr) {

        alert('estas en error');

        // Trigger an error on submit
        // view.onSubmitComplete({
        //     file: file,
        //     xhr: xhr
        // });

        // Allow file to be reuploaded !
        // file.status = Dropzone.QUEUED;
        // this.cancelUpload(file);
        // this.disable();
        // this.uploadFile(file);

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

$(function() {

    $("form.deleteImageForm").on("submit", function(event) {

        event.preventDefault();

        var element = $(this);
        var action = element.attr("action");

        alertify.confirm("Eliminar imagen...", "Está seguro de eliminar la imagen?.",

            function() {

                $.ajax({
                    type: 'GET',
                    url: action,
                    success: function(data) {

                        alertify.success('La imagen ha sido eliminada correctamente!');

                        element = element.parent().parent();

                        element.fadeOut(500, function() {
                            element.remove();
                        });

                    },
                    error: function(error) {

                        this.on("error", function(file, errorMessage) {
                            $.each(dropZone.files, function(i, file) {
                                file.status = Dropzone.QUEUED
                            });

                            $.each(message, function(i, item) {
                                $("#dropzoneErrors .errors ul").append("<li>" + message[i] + "</li>")
                            });
                        });

                        console.log("Error");
                        console.log(error);
                    }
                });

            },
            function() {
                alertify.error('Eliminación cancelada');
            }

        );

    });

});

function restartFailUploads() {
    var dropzoneFilesCopy = dropzone.files.slice(0);
    dropzone.removeAllFiles();
    $.each(dropzoneFilesCopy, function(file) {
        if (file.status === Dropzone.ERROR) {
            file.status = undefined;
            file.accepted = undefined;
        }
        dropzone.addFile(file);
    });
}


// setInterval(function(){
//     $('.dz-preview.dz-processing.dz-image-preview.dz-complete').remove();
// }, 10000);