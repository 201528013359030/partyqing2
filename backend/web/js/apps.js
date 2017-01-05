
$(document).ready(function(){
	
	//日期插件
	if($(".form_datetime").eq(0)){
		$(".form_datetime").datepicker({
			language:  'cn',			
			format: 'yyyy-mm-dd',
			todayBtn: "linked",
			clearBtn: true,
			orientation: "auto right"
		});
	}
	
	if($(".swiper-container").eq(0)){
		var swiper = new Swiper('.swiper-container', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true
	        
	    });
	}
    
    
	
	
	
});

function showAlert(icon,text ){
    
    var html = '<div class="J_alert">' 
        +'<div class="bg"></div>'
        +'<div class="alertInner">'
        +'<p><i class="'+icon+' alertIcon"></i></p>'
        +'<p class="name">'+text+'</p>'
        +'</div>'
        +'</div>';

    $("body").append(html);
    setTimeout(function(){
            $(".J_alert").fadeOut(500);
            //$(".J_alert").remove();
            },700);

}

if($(".menuList").eq(0)){
	$(".iteam_parent").on("click",function(){
		$(".menu_children").css("display","none");
		var obj = this;
		$(obj).next(".menu_children").css("display","block");
	});
	
	$(".iteam_chd").on("click",function(){
		var obj = this;
		var value = $(obj).html();
		$("#J_inputHangye").val(value);		
		$(".menu_children").css("display","none");
		$("#J_hangye").modal("hide");
	});
		
}

if($(".searchType").eq(0)){
	var titleCon = $("#J_titleCon");
	$(document).on("click",".searchType .iteam",function(){
		var obj = this;
		var cls = $(obj).attr("class");
		var html = $(obj).prop("outerHTML");
				
		if(/curr/.test(cls)){
			$(obj).attr("class","iteam");
			var type_id = $(obj).attr("data-typeid");
			$("#J_titleCon .iteam").each(function(){
				var iteam = this;
				var data_typeid = $(iteam).attr("data-typeid");
				if(type_id==data_typeid){
					$(iteam).remove();
				}
			});
			
		}else{
			
			$(obj).attr("class","iteam curr");
			titleCon.append(html);
		}
				
	});
	$(document).on("click","#J_titleCon .iteam",function(){
		var obj = this;
  		var type_id = $(obj).attr("data-typeid");
		
		$(".searchType .iteam").each(function(){
			var iteam = this;
			var data_typeid = $(iteam).attr("data-typeid");
			
			if(type_id==data_typeid){
				$(iteam).attr("class","iteam");
			}
		});
		$(obj).remove();
		
	});
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















