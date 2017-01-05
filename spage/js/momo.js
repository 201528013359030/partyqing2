var wH = $(window).height();
var wW = $(window).width(); 
function contextHeight() {
	 var top = 73;
	 var bottom = 58;
	//浏览器高度小于900，则main_bottom高度改为38px
	 if(document.documentElement.clientHeight<900){
			$(".main_bottom").css("height","38px")
			$(".main_bottom_copyright").find("p").addClass("fl mt8 mr5");
			bottom=38;
	} else {
		$(".main_bottom").css("height","58px")
		$(".main_bottom_copyright").find("p").removeClass("fl mt8 mr5");
		bottom=58;
	}
	 var height = wH - top -bottom;
	 document.getElementById("iframe_center").style.height = height+"px";
	 document.getElementById("iframe_center").style["overflow-y"] = "scroll";
	 document.getElementById("iframe_left_div").style.height = document.documentElement.clientHeight - top + "px";
	 
	wH = $(window).height();
	wW = $(window).width();
 }

var menuBarSize = 6;
var menuBarStart = 1;
var menuBarEnd = menuBarSize;
var menus = $("#top_nav_content .top_nav_content_item");

// 注册点击左侧箭头的事件
function turnLeft(num) {
	if(menuBarStart > num) {
		menuBarStart = menuBarStart - num;
	} else {
		menuBarStart = 1;
	}
	if(menuBarEnd > (menuBarSize + num)) {
		menuBarEnd = menuBarEnd - num;
	} else {
		menuBarEnd = menuBarSize;
	}
	setTopSubnav();
	var mainObj = document.getElementById("top_nav_content");
	//alert($("#top_nav_content").scrollLeft());
	if(mainObj.scrollLeft > 0) {
		var nowLocal = 0;
		nowLocal = $("#top_nav_content").scrollLeft() - 96 * num;
		$("#top_nav_content").animate({
			"scrollLeft": nowLocal + "px"
		}, "fast");
	}
}
// 注册点击右侧箭头的事件
function turnRight(num) {
	if(menuBarStart <= (menus.length - menuBarSize)) {
		menuBarStart = menuBarStart + num;
	}
	if(menuBarEnd < menus.length) {
		menuBarEnd = menuBarEnd + num;
	}
	setTopSubnav();
	var mainObj = document.getElementById("top_nav_content");
	if((mainObj.scrollWidth - mainObj.scrollLeft) > 575) {
		var nowLocal = 0;
		nowLocal = $("#top_nav_content").scrollLeft() + 96 * num;
		$("#top_nav_content").animate({
			"scrollLeft": nowLocal + "px"
		}, "fast");
	}
}
// 给快捷菜单赋值
function setTopSubnav() {
	var ulNode = "";
	$.each(menus, function(index, menu) {
		index = index + 1;
		if(index < menuBarStart) {
			ulNode += '<li><a href="javaScript:void(0);" rel="/oaIndex' + menu.tabRel + '&appLogicId=' + menu.tabSign + '" onclick="leftQuick(this)" id="q' + index + '" name="' + menu.tabSign + '" ><span id="dh' + (index + 1) + '">' + menu.tabName + '</span></a></li>';
		}

		if(index > menuBarEnd) {
			ulNode += '<li><a href="javaScript:void(0);" rel="/oaIndex' + menu.tabRel + '&appLogicId=' + menu.tabSign + '" onclick="leftQuick(this)" id="q' + index + '" name="' + menu.tabSign + '" ><span id="dh' + (index + 1) + '">' + menu.tabName + '</span></a></li>';
		}
	});

	$("#topSubnav").html(ulNode);
	//alert(ulNode);
}

