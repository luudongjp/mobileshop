$(document).ready(function (e) {
    if($item['visibleOnHome'] == 1){
        $('check-in').prop('checked', true);
        debugger
    } else{
        $('check-in').prop('checked', false);
    }
})

$('#formUpdageBanner').submit(function (e) {
    var countEmpty = 0;
    for (var j = 0; j < numberBanners; j++) {
        if ($('.cb-' + j).prop('checked') == true) {
            countEmpty += 1;
        } else {
            countEmpty += 0;
        }
    }
    if (countEmpty == 0) {
        e.preventDefault();
        alert('Banner homepage không được bỏ trống !');
    }
})