/**
 * Created by root on 2017/9/4.
 */
$(function(){
    move($('a.am-btn-default').data('index'))
    /*$('a[pjax="false"]').click(function(e){
        e.preventDefault()
        $('#iframeVideo').attr('src', $(this).data('href'))
        $('title').text($(this).attr('title'))
        history.pushState({}, '', $(this).prop('href'))
        $(this).siblings().addClass('am-btn-secondary').removeClass('am-btn-default')
        $(this).removeClass('am-btn-secondary').addClass('am-btn-default')
        move($(this).data('index'))
    })*/
})
function move(index) {
    var btnWidth = $('a.am-btn-default').width()
    $('#videoGroup').scrollLeft((btnWidth+2*index)*index)
}