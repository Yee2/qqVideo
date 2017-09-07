
// 设置左侧导航高度
var topbarPadding = $(".am-topbar").css("padding-top");
var leftHeight = $(document).height()-$(".am-topbar").height();
$(".con-left").css("height", leftHeight - 2 * parseInt(topbarPadding) +"px");


// 左侧导航点击收缩效果
$(".con-left>ul>li>a").click(function(){
	$(this).css("color", "#0e90d2").siblings().css("color", "#fff");
	var changClass = $(this).find("span").prop("class");
	if(changClass == "am-icon-caret-right"){
		$(this).find("span").removeClass(changClass).addClass("am-icon-caret-down");
		$(this).siblings("ul").show();
	}else{
		$(this).find("span").removeClass(changClass).addClass("am-icon-caret-right");
		$(this).siblings("ul").hide();
	}
	
	// 左侧导航点击显示效果
	$(".con-left a").click(function(){
		$(".con-left a").css("color", "#fff");
		$(this).css("color", "#0e90d2").parent().parent().siblings().css("color", "#0e90d2");
	});
	
});
