/**
 * Created by root on 2017/7/9.
 */
$(document).ready(function () {
    $(document).pjax('a:not(a[pjax="false"])', '.main')
    $('[title="站长统计"]').toggle()
    loadImg()
    $(document).on('pjax:complete', function (e) {
        loadImg()
    })
    $('a[data-name="buttomBtn"]').click(function(){
        $(this).siblings('a').removeClass('am-btn-primary').addClass('am-btn-secondary');
        $(this).addClass('am-btn-primary');
    })
    $('#searchForm').submit(function (e) {
        e.preventDefault()
        var text = $('#search-input').val()
        window.location.href = "/s/"+ text.replace('/','').replace('\\', '')
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