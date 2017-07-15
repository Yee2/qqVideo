/**
 * Created by root on 2017/7/9.
 */
$(document).ready(function () {
    $(document).pjax('a', '.main')
    $.goup({
        trigger: 100,
        bottomOffset: 50,
        locationOffset: 300,
        title: '返回顶部',
        titleAsText: true
    });
});