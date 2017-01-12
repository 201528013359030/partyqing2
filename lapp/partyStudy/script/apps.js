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

var home= {};
home.partial = "../html/temp/home.html";
home.init = function(){
	miniSPA.render("home");
	commonFunction.load_page("#page_innerContent")
}

var partyStudyList= {};
partyStudyList.partial = "../html/temp/partyStudyList.html";
partyStudyList.init = function(){
    miniSPA.render("partyStudyList");
    if($("#page_innerContent")[0]) {

        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            
            if(flag_home){
				var self = this;			    
			    if(self.loading) return;
			    self.loading = true;
			    setTimeout(function() {
			    	setListIteam(page_home);
			        self.loading = false;
			    }, 2000);   //模拟延迟
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

var partyStudyItem= {};
partyStudyItem.partial = "../html/temp/partyStudyItem.html";
partyStudyItem.init = function(){
	
    miniSPA.render("partyStudyItem");
    if($("#page_innerContent")[0]) {

        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            if(flag_home){
                var self = this;
                if(self.loading) return;
                self.loading = true;
                setTimeout(function() {
                    $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
                    self.loading = false;
                }, 2000);   //模拟延迟
            }


        });
    }
}

var partyStudyTasks= {};
partyStudyTasks.partial = "../html/temp/partyStudyTasks.html";
partyStudyTasks.init = function(){
    miniSPA.render("partyStudyTasks");
    if($("#page_innerContent")[0]) {

        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            if(flag_home){
                var self = this;
                if(self.loading) return;
                self.loading = true;
                setTimeout(function() {
                    $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
                    self.loading = false;
                }, 2000);   //模拟延迟
            }


        });
    }
    $('.party-task-finish').click(function(){
        $(this).css('display','none')
        $(this).parent().parent().children('.party-task-finish-img').css('display','block')
    })
}

var partyStudyTasksContent= {};
partyStudyTasksContent.partial = "../html/temp/partyStudyTasksContent.html";
partyStudyTasksContent.init = function(){
    miniSPA.render("partyStudyTasksContent");
    $(document).ready(function(){
        var winWidth = $(window).width();
        $('.party-task-button-box').css('width',winWidth);

    })
}

var partyStudyMaterialSummary= {};
partyStudyMaterialSummary.partial = "../html/temp/partyStudyMaterialSummary.html";
partyStudyMaterialSummary.init = function(){
    miniSPA.render("partyStudyMaterialSummary");
//	miniSPA.render("home");
	page_home=1;
	$("body").css("background-color","#F1F2F4");
	setListIteam(page_home);
	commonFunction.load_page("#page_innerContent");
	
	$("#search_bar").on("click","#search_clear",function(){
		var searchtitle = $("#search_input").val();
//		alert(searchtitle);
		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
		setSearchListIteam(searchtitle);
	})
	$('#search_input').focus(function(){
		$('#search_clear').css('display','block');
		$('#search_cancel').css('display','block');
	})
	
	$('#search_clear').css('display','none');
	$('#search_cancel').css('display','none');
	$('#search_input').blur(function(){
	var searchtitle = $("#search_input").val();
	if(searchtitle){
		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
		setSearchListIteam(searchtitle);
	}
		$('#search_clear').css('display','none');
		$('#search_cancel').css('display','none');
	})
	
    if($("#page_innerContent")[0]) {

        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            
            if(flag_home){
				var self = this;			    
			    if(self.loading) return;
			    self.loading = true;
			    setTimeout(function() {
			    	setListIteam(page_home);
			        self.loading = false;
			    }, 2000);   //模拟延迟
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
    miniSPA.render("partyStudyMaterialContent");
    setContent(partyStudyMaterialContent.parame);
    commonFunction.load_page("#page_innerContent");

}

var partyStudyExperience= {};
partyStudyExperience.partial = "../html/temp/partyStudyExperience.html";
partyStudyExperience.init = function(){
    miniSPA.render("partyStudyExperience");
    if($("#page_innerContent")[0]) {

        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            if(flag_home){
                var self = this;
                if(self.loading) return;
                self.loading = true;
                setTimeout(function() {
                    $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
                    self.loading = false;
                }, 2000);   //模拟延迟
            }


        });
    };
    $(document).on("click", ".party-experience-download-btn", function() {
        $.confirm("您确定要下载两学一做附件文件吗?", "确认下载?", function() {
            $.toast("已经开始下载!");
        }, function() {
            //取消操作
        });
    });
    var g = 0;
    $(document).on("click", ".party-experience-great1", function() {
        var G = parseInt($(this).children('.party-experience-great-num').html());
        if(g==0){
            $(this).children('.party-experience-great-img').attr('src','../images/icon/icon_great2.png')
            $(this).children('.party-experience-great-num').html(G+1).css('color','#cf2629');
            g = 1;
        }
        else{
            $(this).children('.party-experience-great-img').attr('src','../images/icon/icon_great.png')
            $(this).children('.party-experience-great-num').html(G-1).css('color','#999');
            g = 0;
        }
    });
    $('.party-experience-box').click(function(){
        window.onload.href = "#"
    });
    $(document).ready(function(){
        var winWidth = $(window).width();
        $('.party-experience-button-box').css('width',winWidth);

    })
}

var partyStudyQuestionSummary= {};
partyStudyQuestionSummary.partial = "../html/temp/partyStudyQuestionSummary.html";
partyStudyQuestionSummary.init = function(){
    miniSPA.render("partyStudyQuestionSummary");
    
    if($("#page_innerContent")[0]) {

        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            if(flag_home){
                var self = this;
                if(self.loading) return;
                self.loading = true;
                setTimeout(function() {
                    $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
                    self.loading = false;
                }, 2000);   //模拟延迟
            }


        });
    };

}

var partyStudyExperienceContent = {};
partyStudyExperienceContent.partial = "../html/temp/partyStudyExperienceContent.html";
partyStudyExperienceContent.init = function(){
    miniSPA.render("partyStudyExperienceContent");
    if($("#page_innerContent")[0]) {

        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() {

            console.log("infiniteScroll.html");

            if(flag_home){
                var self = this;
                if(self.loading) return;
                self.loading = true;
                setTimeout(function() {
                    $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
                    self.loading = false;
                }, 2000);   //模拟延迟
            }


        });
    };
    $(document).ready(function(){
        var winWidth = $(window).width();
        $('.party-experience-button-box').css('width',winWidth);
        $('.party-experience-comment-content').css('width',winWidth-70)

    })
    $(document).on("click", ".party-experience-download-btn", function() {
        $.confirm("您确定要下载两学一做附件文件吗?", "确认下载?", function() {
            $.toast("已经开始下载!");
        }, function() {
            //取消操作
        });
    });
    var g = 0;
    $(document).on("click", ".party-experience-comment-content1-2", function() {
        var G = parseInt($(this).children('.party-experience-comment-great').html());
        if(g==0){
            $(this).children('.party-experience-comment-great-img').attr('src','../images/icon/icon_great2.png')
            $(this).children('.party-experience-comment-great').html(G+1).css('color','#cf2629');
            g = 1;
        }
        else{
            $(this).children('.party-experience-comment-great-img').attr('src','../images/icon/icon_great.png')
            $(this).children('.party-experience-comment-great').html(G-1).css('color','#999');
            g = 0;
        }
    });
}

var partyStudyWriteComment = {};
partyStudyWriteComment.partial = "../html/temp/partyStudyWriteComment.html";
partyStudyWriteComment.init = function(){
    miniSPA.render("partyStudyWriteComment");
    $(document).ready(function(){
        var winWidth = $(window).width();
        var winHeight = $(window).height();
        $('.party-task-button-box').css('width',winWidth);
        $('.party-write-comment').css('height',winHeight-140);
        window.onresize = function(){
            var winWidth = $(window).width();
            var winHeight = $(window).height();
            $('.party-task-button-box').css('width',winWidth);
            $('.party-write-comment').css('height',winHeight-140);
        };
        $('.party-write-comment').focus(function(){
            $(this).html(null).css('color','#666');
        })
    })
}
var partyStudyWriteExperience = {};
partyStudyWriteExperience.partial = "../html/temp/partyStudyWriteExperience.html";
partyStudyWriteExperience.init = function(){
    miniSPA.render("partyStudyWriteExperience");
    $(document).ready(function(){
        var winWidth = $(window).width();
        $('.party-task-button-box').css('width',winWidth);
        window.onresize = function(){
            var winWidth = $(window).width();
            $('.party-task-button-box').css('width',winWidth);
        };
        $('.party-write-experience').focus(function(){
            $(this).html(null).css('color','#666');
        })
    })
}

var partyLeaderInspection = {};
partyLeaderInspection.partial = "../html/temp/partyLeaderInspection.html";
partyLeaderInspection.init = function(){
    miniSPA.render("partyLeaderInspection");
    //基于准备好的dom，初始化echarts实例
    var chartPie = echarts.init(document.getElementById('chartPie'));
    var I = 65;
    var pie = {
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b}: {c} ({d}%)"
        },
        legend: {
            orient: 'horizontal',
            x: 'left',
            data:['研发中心', '系统与软件', '智能控制与装备', '信息技术', '系统集成']
        },
        series: [
            {
                name:'访问来源',
                type:'pie',
                selectedMode: 'single',
                radius: [0, '20%'],

                label: {
                    normal: {
                        position: 'inner'
                    }
                },
                label: {
                    normal: {
                        show: false
                    }
                },
                labelLine: {
                    normal: {
                        show: false
                    }
                },
                data:[
                    {value:18, name:'研发中心'},
                    {value:20, name:'系统与软件'},
                    {value:24, name:'智能控制与装备'},
                    {value:9, name:'信息技术'},
                    {value:22, name:'系统集成'}
                ]
            },
            {
                name:'访问来源',
                type:'pie',
                radius: ['30%', '45%'],

                data:[
                    {value:18, name:'研发中心'},
                    {value:20, name:'系统与软件'},
                    {value:24, name:'智能控制与装备'},
                    {value:9, name:'信息技术'},
                    {value:22, name:'系统集成'}
                ],
                itemStyle: {
                    normal: {
                        label:{
                            show:true,
                            formatter: '{b}\n{d}'
                        },
                        labelLine:{
                            show:true,
                            length:2
                        }
                    }
                }
            }
        ]
    };
    //使用刚指定的配置项和数据显示图标。
    chartPie.setOption(pie);



    //基于准备好的dom，初始化echarts实例
    var chartBar = echarts.init(document.getElementById('chartBar'));
    //指定图标的配置项和数据
    var bar = {
        title: {
            show:false,
            text: 'ECharts 入门示例'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            left: 0,
            top: '20',
            data: ['两学一做','三严三实','四个全面']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            axisLabel:{
                interval:0
            },
            type : 'value',
            boundaryGap : [0, 0.01]
        },
        label:{
            normal:{
                show:true,
                position:'right'
            }
        },
        yAxis: {
            type: 'category',
            data: ['信息技术实验室', '系统集成', '智能控制与设备' , '系统与软件','研发中心'],
            axisLabel : {
                interval : 0,
                formatter : function(params){
                    var newParamsName = "";
                    var paramsNameNumber = params.length;
                    var provideNumber = 4;
                    var rowNumber = Math.ceil(paramsNameNumber / provideNumber);
                    if (paramsNameNumber > provideNumber) {
                        for (var p = 0; p < rowNumber; p++) {
                            var tempStr = "";
                            var start = p * provideNumber;
                            var end = start + provideNumber;
                            if (p == rowNumber - 1) {
                                tempStr = params.substring(start, paramsNameNumber);
                            } else {
                                tempStr = params.substring(start, end) + "\n";
                            }
                            newParamsName += tempStr;
                        }

                    } else {
                        newParamsName = params;
                    }
                    return newParamsName
                }

            }
        },
        series: [
            {
                name: '两学一做',
                type: 'bar',
                data: [60, 43, 48, 48, 70]
            },
            {
                name: '三严三实',
                type: 'bar',
                data: [48, 48, 60, 60, 100]
            },
            {
                name: '四个全面',
                type: 'bar',
                data: [58, 54, 65, 53, 80]
            }
        ]
    };
    //使用刚指定的配置项和数据显示图标。
    chartBar.setOption(bar);
    chartBar.on('click', function (param){
        var name=param.name;
        window.location.href="main.html#partyStudyList";

    });
}

var partyCultivating = {};
partyCultivating.partial = "../html/temp/partyCultivating.html";
partyCultivating.init = function(){
    miniSPA.render("partyCultivating");
    $('.party-member-content').hide();
    $('.party-member-content').eq(0).show();
    $('.party-member-head').click(function(){
        var h = $(this).data('open');
        if(h==1){
            $(this).next('.party-member-content').slideUp();
            $(this).data('open','0');
        }
        else{
            $(this).next('.party-member-content').slideDown();
            $(this).data('open','1');
        }
    });
    $('.party-activist-box').click(function(){
        window.location.href = 'main.html#partyCultivatingContent'
    })
}

var partyCultivatingContent = {};
partyCultivatingContent.partial = "../html/temp/partyCultivatingContent.html";
partyCultivatingContent.init = function(){
    miniSPA.render("partyCultivatingContent");

}

var partyDuesAssistant = {};
partyDuesAssistant.partial = "../html/temp/partyDuesAssistant.html";
partyDuesAssistant.init = function(){
    miniSPA.render("partyDuesAssistant");

}

var partyDuesHistory = {};
partyDuesHistory.partial = "../html/temp/partyDuesHistory.html";
partyDuesHistory.init = function(){
    miniSPA.render("partyDuesHistory");

}


var homeQuestion= {};
//home.partial = "../html/temp/partyStudyQuestionSummary.html";
homeQuestion.partial = "../html/tempQuestion/home.html";
homeQuestion.init = function(){
	miniSPA.render("homeQuestion");
	page_home=1;
	$("body").css("background-color","#F1F2F4");
	setQuestionListIteam(page_home);
	commonFunction.load_page("#page_innerContent");
	
	$("#search_bar").on("click","#search_clear",function(){
		var searchtitle = $("#search_input").val();
//		alert(searchtitle);
		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
		setQuestionSearchListIteam(searchtitle);
	})
	
	$('#search_input').focus(function(){
		$('#search_clear').css('display','block');
		$('#search_cancel').css('display','block');
	})
	
	$('#search_input').blur(function(){
		var searchtitle = $("#search_input").val();
		if(searchtitle){
			$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
			setQuestionSearchListIteam(searchtitle);
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
		    }, 2000);   //模拟延迟
	    });
	    
	    $("#tab1").infinite().on("infinite", function() { //无限加载 --fyq
	    	
			console.log("infiniteScroll.html");
			
			if(flag_home){
				var self = this;			    
			    if(self.loading) return;
			    self.loading = true;
			    setTimeout(function() {
			    	setQuestionListIteam(page_home);
			        self.loading = false;
			    }, 2000);   //模拟延迟
			}
			
		    
	    });
	}    
	    
}

var examine= {};
examine.partial = "../html/tempQuestion/examine.html";
examine.init = function(){
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