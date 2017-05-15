var photoDelete = 0;

function deleteLB(photoDelete){

    $('#trash'+photoDelete).parents('#linkElement').remove();
    event.preventDefault();
    event.stopPropagation();

    var Path = $('#homePath').val() + '/admin/galleryClient/deleteImage/' + photoDelete;

    $.ajax({
        url: Path,
        type: "GET",
    }).done(function (result) {
        console.log('Imagen eliminada: ' + result );
    });

}