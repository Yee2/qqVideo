/**
 * Created by root on 2017/7/9.
 */
$(document).ready(function () {
    $(document).pjax('a', '.main')
    $('[title="站长统计"]').toggle()
    loadImg()
    $(document).on('pjax:complete', function (e) {
        loadImg()
    })
});
function loadImg() {
    var imgMap = $('img[_src]')
    $.each(imgMap, function(index, item){
        var img = new Image()
        img.src = $(item).attr('_src')
        img.onload = function() {
            $(item).attr('src',$(item).attr('_src'))
        }
    })
}