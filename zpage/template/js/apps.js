
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
















