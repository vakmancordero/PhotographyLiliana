var photoDelete = 0;

function deleteLB(photoDelete){

    $('#trash'+photoDelete).parents('#linkElement').remove();
    event.preventDefault();
    event.stopPropagation();
    var homePath = $('#homePath').val();
    var Path = homePath + '/admin/curriculum/images/' + photoDelete;

    $.ajax({
        url: Path,
        type: "GET",
    });
}
