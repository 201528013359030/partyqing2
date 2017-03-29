var noweb = {};
noweb.partial = "../html/temp/noweb.html";
noweb.init = function(){
    console.log('网址不存在');
}

var notfound = {};
notfound.partial = "../html/temp/404.html";
notfound.init = function(){
    console.log('网址不存在');
}


var partyStudyMaterialSummary= {};
partyStudyMaterialSummary.partial = "../html/temp/partyStudyMaterialSummary.html";
partyStudyMaterialSummary.init = function(){
	 var planid = partyStudyMaterialSummary.parame;
   
	$("#page-title").html("资料汇总");
    miniSPA.render("partyStudyMaterialSummary");
//	miniSPA.render("home");
	page_home=1;
	$("body").css("background-color","#F1F2F4");
	setMaterialListIteam(page_home,planid);
	commonFunction.load_page("#page_innerContent");
	
	//单击搜索按钮进行搜索
//	$("#search_bar").on("click","#search_clear",function(){
//		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
//		$(".pageloading").show();
//		var searchtitle = $("#search_input").val();
////		alert(searchtitle);
//		setMaterialSearchListIteam(searchtitle,planid);
//		$(".pageloading").hide();
//	})
	
	//输入内容实时搜索
	$("#search_input").on("input",function(){
		
		var searchtitle;
		$(".resultEnd").show();
		$(".resultEnd_nodata").hide();
		page_home=1;
		 searchtitle = $("#search_input").val();	
		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
//		alert(searchtitle);		
		setMaterialSearchListIteam(searchtitle,planid,page_home);
	});
	
	
//	$('#search_input').focus(function(){
//		$('#search_clear').css('display','block');
//		$('#search_cancel').css('display','block');
//	})
//	
//	$('#search_clear').css('display','none');
//	$('#search_cancel').css('display','none');
	
	//焦点离开时自动搜索
	$('#search_input').blur(function(){
		
	var searchtitle = $("#search_input").val();
	page_home=1;
	if(searchtitle){
		$(".resultEnd").show();
		$(".resultEnd_nodata").hide();
		
		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
		$(".pageloading").show();
		setMaterialSearchListIteam(searchtitle,planid,page_home);
		$(".pageloading").hide();
	}else{
		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
		setMaterialListIteam(page_home,planid);
	}
		$('#search_clear').css('display','none');
		$('#search_cancel').css('display','none');
	})
	
    if($("#page_innerContent")[0]) {

//        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 1);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            
//            alert(flag_home)
            if(flag_home){
				var self = this;			    
			    if(self.loading) return;
			    self.loading = true;
			    var searchtitle = $("#search_input").val();
			    setTimeout(function() {
			    	if(searchtitle){
			    		setMaterialSearchListIteam(searchtitle,planid,page_home);
			    	}else{
			    		setMaterialListIteam(page_home,planid);
			    	}
			        self.loading = false;
			    }, 1);   //模拟延迟
			}
//            if(flag_home){
//                var self = this;
//                if(self.loading) return;
//                self.loading = true;
//                setTimeout(function() {
//                    $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
//                    self.loading = false;
//                }, 2000);   //模拟延迟
//            }


        });
    }
}

var partyStudyMaterialContent = {};

partyStudyMaterialContent.partial = "../html/temp/partyStudyMaterialContent.html";
partyStudyMaterialContent.init = function(){
	$("#page-title").html("资料汇总");
    miniSPA.render("partyStudyMaterialContent");
    setContent(partyStudyMaterialContent.parame);
    commonFunction.load_page("#page_innerContent");
    countmaterialid = partyStudyMaterialContent.parame;
    planid = partyStudyMaterialContent.parameCon;
    setCount(countmaterialid,planid); // 参数为资料id和资料所属的planid
    
    //统计阅读时长
    intervalid=clearInterval(intervalid);
    intervalid=setInterval("go()", 5000);//1000=1s
    isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器
    isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端 !!将对应的类型转换为Boolean，!!b指的是将b转换为boolea值  				//去两次非是因为将b转换位boolean值后取了一次非，所以得到的值正好相反，再取一次反回来
    API.init();  
    if(isAndroid==true){
    	//alert(33);
    	setTimeout(function(){
    		//获取客户信息
    		var op = {
    			       "name": "StartSystemEventMonitor",
    			       "callback": "OnStartSystemEventMonitorCb",
    			       "params": {
    			           "systemEventType":"systemCall,screenLock,appBackground"       
    			        }
    			};
    			    //alert(JSON.stringify(op));
    			    API.send_tonative(op);
    	},200);
    }
    	
    
    //js限制图片最大宽度
    /*$(document).ready(function(){
        var winWidth = $(window).width();
        var a = $('#party-task-content').children('p').children('img').length,
	        m = $('#party-task-content').children('p').children('img').length;
	    $('img').load(function(){
	        if(!--a){
	            // 图片加载完成
	            for(var n=0; n<m; n++){
	                var b = $('#party-task-content').children('p').children('img').eq(n).width();
	                if(b>300){
	                    $('#party-task-content').children('p').children('img').eq(n).css('width','100%')
	                }
	            }
	        }
	    });

        var a = $('.party-task-content').children('p').children('img').length;
        for(var n=0; n<a; n++){
            var b = $('.party-task-content').children('p').children('img').eq(n).width();
            if(b>300){
            	$('.party-task-content').children('p').children('img').eq(n).removeAttr('width').removeAttr('height');
                $('.party-task-content').children('p').children('img').eq(n).css('width','100%').css('height','auto');
            }
        }
    })*/



}

var homeQuestion= {};
//home.partial = "../html/temp/partyStudyQuestionSummary.html";
homeQuestion.partial = "../html/tempQuestion/home.html";
homeQuestion.init = function(){
	var planid = homeQuestion.parame;
	$("#page-title").html("学习测评");
//	$("#page-title").attr({"style":"display: block"});
	miniSPA.render("homeQuestion");
	page_home=1;
	$("body").css("background-color","#F1F2F4");
	setQuestionListIteam(page_home,planid);
	commonFunction.load_page("#page_innerContent");
	
	//单击搜索按钮
//	$("#search_bar").on("click","#search_clear",function(){
//		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
//		$(".pageloading").show();
//		var searchtitle = $("#search_input").val();
////		alert(searchtitle);		
//		setQuestionSearchListIteam(searchtitle,planid);
//		$(".pageloading").hide();
//	})
	
	//输入内容实时搜索
	$("#search_input").on("input",function(){
//		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
//		$(".pageloading").show();
//		var searchtitle = $("#search_input").val();
		$(".resultEnd").show();
		$(".resultEnd_nodata").hide();
		page_home=1;
		var searchtitle;		
		 searchtitle = $("#search_input").val();	
		$("#J_listGroup").empty();
//		alert(searchtitle);		
		setQuestionSearchListIteam(searchtitle,planid,page_home);
//		$(".pageloading").hide();
	});
//	$('#search_input').focus(function(){
//		$('#search_clear').css('display','block');
//		$('#search_cancel').css('display','block');
//	})
	
	//焦点离开时自动搜索
	$('#search_input').blur(function(){
		var searchtitle = $("#search_input").val();
		page_home=1;
		
		if(searchtitle){
			$(".resultEnd").show();
			$(".resultEnd_nodata").hide();
			
			$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
			$(".pageloading").show();
			setQuestionSearchListIteam(searchtitle,planid,page_home);
			$(".pageloading").hide();
			
		}else{
			$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
			setQuestionListIteam(page_home,planid);
		}
		$('#search_clear').css('display','none');
		$('#search_cancel').css('display','none');
	})
	
	if($("#page_innerContent")[0]) {
		$("#tab1").pullToRefresh().on("pull-to-refresh", function() {
		    var self = this;		    
		    setTimeout(function() {
		      	window.location.reload();
		        $(self).pullToRefreshDone(); // 重置下拉刷新
		    }, 1);   //模拟延迟
	    });
	    
	    $("#tab1").infinite().on("infinite", function() { //无限加载 --fyq
	    	
			console.log("infiniteScroll.html");
			
			if(flag_home){
				var self = this;			    
			    if(self.loading) return;
			    self.loading = true;
			    var searchtitle = $("#search_input").val();
			    setTimeout(function() {
			    	if(searchtitle){
			    		setQuestionSearchListIteam(searchtitle,planid,page_home);
			    	}else{
			    		setQuestionListIteam(page_home,planid);
			    	}
			        self.loading = false;
			    }, 1);   //模拟延迟
			}
			
		    
	    });
	}    
	    
}

var examine= {};
examine.partial = "../html/tempQuestion/examine.html";
examine.init = function(){
	$("#page-title").html("学习测评");
	miniSPA.render("examine");
	var bankid = examine.parame;
	
	$("body").css("background-color","#F1F2F4");
	//初始化设置：隐藏loading
	commonFunction.load_page("#page_innerContent");
	//初始化答题页面
	setExamine(bankid);
		
	$("#page_innerContent").on("click","#J_restar",function(){
		
		$.confirm(commonTiptext.confirm_restar_con,commonTiptext.confirm_restar_title,function(){
			//$.toast("重新开始答题");
			window.location.href = "#begin_"+bankid+"_1";
		}, function() {
			//取消操作
		});
	});
	$("#page_innerContent").on("click","#J_continue",function(){
		window.location.href = "#begin_"+bankid;
	});
		
}

var begin= {};
begin.partial = "../html/tempQuestion/begin.html";
begin.init = function(){
	$("#page-title").html("学习测评");
	miniSPA.render("begin");
	var setting = {};
	var bankid = begin.parame,
		bank_count = begin.parameCon;
	//alert(bankid);
	$("body").css("background-color","#fff");
	commonFunction.load_page("#page_innerContent");
	
	//初始化开始答题
	
	if( bank_count ){
		setting = {"id":bankid,"new":bank_count};
	}else{
		setting = {"id":bankid}
	}
	setBegin(setting);
	
	/*
	 * 因为有模版所以要带着父元素 切记 
	 */
	$("#page_innerContent").on("change","input[name='duty']",function(){
		var value = $("input[name='duty']:checked").val();
		if(value){
			$("#page_innerContent #J_btn_submit").attr("class","weui_btn weui_btn_primary");
		}else{
			$("#page_innerContent #J_btn_submit").attr("class","weui_btn weui_btn_default weui_btn_disabled");
		}
	});
	
	$("#page_innerContent").on("click","#J_btn_submit",function(){
		var obj = this,
			cls = $(this).attr("class");
		if(/weui_btn_primary/.test(cls)){
			$("#page_innerContent input[name='duty']").attr("disabled","true");
			var arr ={
				"uid":NATIVE_UID,
				"auth_token":NATIVE_AUTH_TOKEN,
				"paperid":begin.data.paperId,
				"questionid":$(obj).attr("data-questionid"),
				"answer":getInputOption()
			}	
			//var str = JSON.stringify(arr);
			begin.answer = getInputOption();
			//提交答案
			sendQuestion(arr);
		}
	});
	
	$("#page_innerContent").on("click","#J_btn_next",function(){
		console.log(begin.data + CURRCOUNT);
		setBeginIteam(begin.data.questions[CURRCOUNT]);
	});
	
	$("#page_innerContent").on("click","#J_btn_half_finish",function(){
		$.confirm(commonTiptext.confirm_finish_half_con, commonTiptext.confirm_finish_half_title,function(){
			submitQuestion(begin.data.paperId);			
		}, function() {
		//取消操作
		});
	});
	
	$("#page_innerContent").on("click","#J_btn_finish",function(){
		submitQuestion(begin.data.paperId);
	});
}

var finish= {};
finish.partial = "../html/tempQuestion/finish.html";
finish.init = function(){
	$("#page-title").html("学习测评");
	miniSPA.render("finish");
	var paperId = finish.parame;
	$("body").css("background-color","#FDFDFD");
	commonFunction.load_page("#page_innerContent");
	//初始化开始答题
	setFinish(paperId);
	$("#page_innerContent").on("click","#J_restar",function(){
		var bankid = $(this).attr("data-bankid");
		window.location.replace("#examine_"+bankid);
	});
	$("#page_innerContent").on("click","#J_overview",function(){
		var bankid = $(this).attr("data-bankid");
		window.location.replace("#overview_"+bankid);
	});
	

}


var overview= {};
overview.partial = "../html/tempQuestion/overview.html";
overview.init = function(){
	$("#page-title").html("学习测评");
	miniSPA.render("overview");
	var bankid = overview.parame;
	END_CURRCOUNT = 0;
	$("body").css("background-color","#fff");
	commonFunction.load_page("#page_innerContent");
	setOverview(bankid);
	var max = overview.data.count;
	$("#page_innerContent").on("click","#J_prev",function(){
		if(END_CURRCOUNT==0){
			$.toast("已是第一题了", "cancel");
		}else{
			END_CURRCOUNT--;
			var data = overview.data.list[END_CURRCOUNT];
			setEndIteam(data);
		}
		
	});
	$("#page_innerContent").on("click","#J_next",function(){
		if(END_CURRCOUNT==(max-1)){
			$.toast("已是最后一题", "cancel");
		}else{
			END_CURRCOUNT++;
			var data = overview.data.list[END_CURRCOUNT];
			setEndIteam(data);
		}
	});
	//alert(bankid);
	$("#page_innerContent").on("click","#J_goback",function(){
		var obj = this;
		var examid = $(obj).attr("data-bankid");
		window.location.replace("#examine_"+examid);
	});
}

var ranking= {};
ranking.partial = "../html/tempQuestion/ranking.html";
ranking.init = function(){
	$("#page-title").html("学习测评");
	miniSPA.render("ranking");
	
	page_rank = 1;
	var bankid = ranking.parame;
	$("body").css("background-color","#fff");
	commonFunction.load_page("#page_innerContent");
	setRanking(bankid,page_rank);
	if($("#page_innerContent")[0]) {
		$("#tab1").pullToRefresh().on("pull-to-refresh", function() {
		    var self = this;
		    
		    setTimeout(function() {
		      	window.location.reload();
		        $(self).pullToRefreshDone(); // 重置下拉刷新
		    }, 2000);   //模拟延迟
	    });
	    
	    $("#tab1").infinite().on("infinite", function() {	    	
			console.log("infiniteScroll.html");
			
			if(flag_rank){
			    var self = this;			    
			    if(self.loading) return;
			    self.loading = true;
			    setTimeout(function() {
			    	//formID 在lappmod.js中进行全局变量赋值
			    	setRanking(bankid,page_rank);
			        self.loading = false;
			    }, 2000);   //模拟延迟		    
		    }
	    });
	}  
}