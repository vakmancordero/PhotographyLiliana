var photoDelete = 0;

function deleteLB(photoDelete){

    $('#trash'+photoDelete).parents('#linkElement').remove();
    event.preventDefault();
    event.stopPropagation();
    var homePath = $('#homePath').val();
    var Path = homePath + '/admin/blog/upload/deleteImage/' + photoDelete;

    $.ajax({
        url: Path,
        type: "GET",
    }).done(function (result) {
        console.log('Imagen eliminada: ' + result );
    });

}