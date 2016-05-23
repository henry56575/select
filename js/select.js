
function preview(img, selection) {
    if (!selection.width || !selection.height)
        return;

    $('#x').val(parseInt(selection.x1/6));
    $('#y').val(parseInt(selection.y1/3));
    $('#w').val(parseInt(selection.width/6));
    $('#h').val(parseInt(selection.height/3));    
}

$(function () {
    $('#myImg').imgAreaSelect({  handles: true,
        fadeSpeed: 200, onSelectChange: preview });
});