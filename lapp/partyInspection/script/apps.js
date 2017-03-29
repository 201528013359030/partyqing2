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

var partyStudyList= {};
partyStudyList.partial = "../html/temp/partyStudyList.html";
partyStudyList.init = function(){
//    miniSPA.render("partyStudyList");
    /*
     * 实际使用的过程中把代码写到这里
     * 否则js文件会越累计越多
     */
   // miniSPA.appendScript("../script/views/searchBar");
    miniSPA.render("partyStudyList");
    
    partyoid = partyStudyList.parame;
    var name = partyStudyList.parameCon;
    $('#party-study-department_id').html(name);
    page_home=1;
    setListIteamx(page_home,partyoid);
	commonFunction.load_page("#page_innerContent");
	
    if($("#page_innerContent")[0]) {

//        var flag_home = true; //是否继续加载

        $("#tab1").pullToRefresh().on("pull-to-refresh", function() {
            var self = this;
            setTimeout(function() {
                window.location.reload();
                $(self).pullToRefreshDone(); // 重置下拉刷新
            }, 2000);   //模拟延迟
        });

        $("#tab1").infinite().on("infinite", function() { //上拉加载

            console.log("infiniteScroll.html");

            
            if(flag_home){
				var self = this;			    
			    if(self.loading) return;
			    self.loading = true;
			    setTimeout(function() {
			    	setListIteamx(page_home);
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
	    var planid = partyStudyTasks.parame;
	    var name = partyStudyTasks.parameCon; //获取计划名称    
	    $('.party-task-title').html(name);
	    
	   // alert(planid);
	    tasklist(planid,1);
	       $("#search_input").on("input",function(){
	    	
	    	//document.getElementById('search_input').addEventListener('input', function(e){
	    	var searchtitle = $("#search_input").val();
	    		$("#J_listGroup").empty(); //empty() 方法从被选元素移除所有内容，包括所有文本和子节点。 --fyq
	    		$(".pageloading").show();
	    		tasksearch(searchtitle,planid,1);
	    		$(".pageloading").hide();  
	    		$('#search_clear').css('display','none');
	    		$('#search_cancel').css('display','none');
	    	});
	       //任务列表去掉“完成”设置
//	       $(".party-task-finish").on("click",function(){	   	   
//	    	   var obj = this;
//	    	   var id=$(obj).attr("data");
//	    	  // alert(id);
//	    	   taskcomplete(id);
//	   	   });
	       //function finish(id){alert(8);}
	       
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
	            //alert(flag_search);
	  
	            if(flag_home_tasklist){
	                var self = this;
	                if(self.loading) return;
	                self.loading = true;
	                setTimeout(function() {
	                   // $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
	                	tasklist(planid,page_home);
	                	self.loading = false;
	                }, 2000);   //模拟延迟
	            }else  if(flag_search_tasklist){            	
	                var self = this;
	                if(self.loading) return;
	                self.loading = true;
	                setTimeout(function() {
	                   // $("#J_pullContent").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")
	                	var searchtitle = $("#search_input").val();
	                	tasksearch(searchtitle,planid,page_search);
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

var partyLeaderInspection = {};
partyLeaderInspection.partial = "../html/temp/partyLeaderInspection.html";
partyLeaderInspection.init = function(){
    miniSPA.render("partyLeaderInspection");
    
   
    var members = getPartyMember();
   
    var data1 = []; //党支部名称
    var data2 = []; //党支部总人数
    var dataGirls = {};
    var dataBoys = {};
    for(var i=0;i<members.length;i++){
    	
    	data1.push(members[i].name);
    	data2[i] ={
    		"value": (members[i].girls -0) + (members[i].boys -0),
    		"name" : members[i].name
    	}
    	dataBoys[members[i].name] =  members[i].boys;
    	dataGirls[members[i].name] = members[i].girls;
    }   
    
//    console.log("data2:"+JSON.stringify(data2));
//    console.log("dataBoys:"+JSON.stringify(dataBoys));
//    console.log("dataGirls:"+JSON.stringify(dataGirls));

    
    //基于准备好的dom，初始化echarts实例
    var chartPie = echarts.init(document.getElementById('divChartsP'));
    var I = 65;
    var optionP = {
        tooltip: {
        	show:false,
            trigger: 'item',
           
        },
        legend: {
            orient: 'horizontal',
            y: '100%',
            data:data1
        },
        series: [
            {
                name:'访问来源',
                type:'pie',
                selectedMode: 'single',
                radius: [0, '20%'],
//                data:[
//                    {value:18, name:'研发中心'},
//                    {value:20, name:'系统与软件'},
//                    {value:24, name:'智能控制与装备'},
//                    {value:9, name:'信息技术'},
//                    {value:22, name:'系统集成'}
//                ],
                data:data2,
                itemStyle: {
                    normal: {
                        label:{
                            show:false
                        },
                        labelLine:{
                            show:false
                        }
                    }
                }
            },
            {
                name:'访问来源',
                type:'pie',
                radius: ['30%', '45%'],

//                data:[
//                    {value:18, name:'研发中心'},
//                    {value:20, name:'系统与软件'},
//                    {value:24, name:'智能控制与装备'},
//                    {value:9, name:'信息技术'},
//                    {value:22, name:'系统集成'}
//                ],
                
                data:data2,
                itemStyle: {
                    normal: {
                        label:{
                            show:true,
                            formatter: 
//                            	"{a} <\n>{b} : {c} ({d}%)"
                            	function(a,b,c,d){
                                return b+'\n'+'男：'+dataBoys[b]+'  女:'+dataGirls[b];
                               
                            }
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
    chartPie.setOption(optionP);
    var divLegendsP = $('#legendPie');
    var winWidth = $(window).width();

    var legendP = chartPie.chart['pie'].component.legend;
    $(optionP.legend.data).each(function(i, l){
        var color = legendP.getColor(l);
        var labelLegendP = $('<label class="legend">' +
            '<span class="label" style="background-color:'+color+'"></span>'+l+'</label>');
        labelLegendP.mouseover(function(){
            labelLegendP.css('color', color).css('font-weight', 'normal');
        }).mouseout(function(){
            labelLegendP.css('color', '#333').css('font-weight', 'normal');
        }).click(function(){
            labelLegendP.toggleClass('disabled');
            legendP.setSelected(l, !labelLegendP.hasClass('disabled'));
        });
        divLegendsP.append(labelLegendP);
    });

//restore
    chartPie.on('restore', function(param){
        divLegendsP.children('.legend').each(function(i, labelLegendP){
            $(labelLegendP).removeClass('disabled');
        });
    });
    
  // 向数组array对象添加find()方法
 // https://tc39.github.io/ecma262/#sec-array.prototype.find
    if (!Array.prototype.find) {
      Object.defineProperty(Array.prototype, 'find', {
        value: function(predicate) {
         // 1. Let O be ? ToObject(this value).
          if (this == null) {
            throw new TypeError('"this" is null or not defined');
          }

          var o = Object(this);

          // 2. Let len be ? ToLength(? Get(O, "length")).
          var len = o.length >>> 0;

          // 3. If IsCallable(predicate) is false, throw a TypeError exception.
          if (typeof predicate !== 'function') {
            throw new TypeError('predicate must be a function');
          }

          // 4. If thisArg was supplied, let T be thisArg; else let T be undefined.
          var thisArg = arguments[1];

          // 5. Let k be 0.
          var k = 0;

          // 6. Repeat, while k < len
          while (k < len) {
            // a. Let Pk be ! ToString(k).
            // b. Let kValue be ? Get(O, Pk).
            // c. Let testResult be ToBoolean(? Call(predicate, T, « kValue, k, O »)).
            // d. If testResult is true, return kValue.
            var kValue = o[k];
            if (predicate.call(thisArg, kValue, k, o)) {
              return kValue;
            }
            // e. Increase k by 1.
            k++;
          }

          // 7. Return undefined.
          return undefined;
        }
      });
    }
    
    
    //柱状图
    var plans = getPlanComplete();
    var data3 =[];	//党支部 数组格式
    var data4 =[];	//学习计划
    var data5 ={};	//学习计划对应学习任务的完成情况 json格式
    var data6 ={};  //记录所有支部学习任务的信息
    var k=0;
    
//    console.log("2222"+JSON.stringify(plans[0].plans));
//    console.log("2222"+JSON.stringify(plans));
    for(var i = 0; i<plans.length;i++){
    	data3[i] = plans[i].name; //提取支部的名称
    	if(plans[i].plans.status == "0"){
    		var keys = Object.keys(plans[i].plans); //提取学习计划信息的键值
    		for(var j=0;j<keys.length;j++){
    			if(keys[j]!="status"){
    				if(typeof (data4.find(function(title){
    							return title == plans[i].plans[keys[j]].title;
    					})) == 'undefined'){
    					data4[k++] = plans[i].plans[keys[j]].title; //不重复的记录学习计划的名称
    				}
    				if(plans[i].plans[keys[j]].status=="0"){
    					data5[plans[i].plans[keys[j]].title] = plans[i].plans[keys[j]].completePercent ; //学习计划对应学习任务完成情况
    				}else{
    					data5[plans[i].plans[keys[j]].title] = -1 ; //统计特定支部的学习计划无对应的任务
    				}
    			}
    		}
    		data6[plans[i].name] = data5; //记录所有支部学习计划的对应的学习任务信息    		
    		data5 = {};
    	}
    	else{
//    		data4[i++] = 0;
			data6[plans[i].name] = 0; //设置无学习计划党支部的默认值
			
		}
    }
    
    
//    console.log("党组织data3:"+data3);
//    console.log("学习计划data4:"+data4);
//    console.log("党组织学习任务完成情况data6："+JSON.stringify(data6));
//    console.log(data4);
    
    var series = [];  
   
    var data9 = [];
    
    for(var i=0;i<data4.length;i++){
    	
    	var data7 =[0]; //完成情况百分比
    	 var data8 = [];//完成情况描述
    	
    	 for(var j=0;j<data3.length;j++){
    		 if(data6[data3[j]]!=0){
    			 if(data6[data3[j]][data4[i]]!= -1 && data6[data3[j]][data4[i]]!= undefined){
    				 data7[j] = data6[data3[j]][data4[i]];
    				 if(data6[data3[j]][data4[i]]== 0){
    					 data8[j] = '任务未开始';
    				 }else{
    					 data8[j] = data6[data3[j]][data4[i]];
    				 }
    			 }else{
    				 data7[j] =0; 
    				 data8[j] = "";//"无任务" ;  //无任务时不显示  "无任务"  提示		   				
    			 }
    		 }else{
    			 data7[j] = 0; // 无学习计划
    			 data8[j] = " ";//"无学习计划" ; //无学习计划时不显示 "无学习计划" 提示
    		 }    		 
    	 }
    	 data9[i] = data8; 
    	 
    	
    	series[i] ={
            name: data4[i],
            type: 'bar',
//            data: [60, 43, 48, 48]
            data:data7
        }
    	
//    	 console.log('data4['+i+'] '+data4[i]+" data7 "+data7);
    }
    
    
    
//    console.log("series:"+JSON.stringify(series));
////    console.log(" data8 "+data8[0]);
//    console.log(" data9 "+data9);
//    
//    
//    console.log("typeof(data3)"+typeof(data3));
//    console.log("typeof(data4)"+typeof(data4));
//    console.log("typeof(data7)"+typeof(data7));

    
    //基于准备好的dom，初始化echarts实例
    //var chartBar = echarts.init(document.getElementById('chartBar'));
    //指定图标的配置项和数据
    var option = {
        title: {
            show:false
        },
        tooltip: {
            trigger: 'axis',
            position:function(p){   //其中p为当前鼠标的位置
                return [0, p[1] - 10];
            },
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            y: '100%',
//            data: ["两学一做","三严三实","四个全面","计划1","计划2","计划3","计划4","计划5","计划6"]
            data: data4
//             data:tmp4
        },
        calculable : false,//拖拽重新计算功能是否开启
        grid: {
            x:60,
            containLabel: true
        },
        /*
        label:{
            normal:{
                show:false,
                position:'right',
                formatter:function(e){
                	 console.log("seriesIndex"+e.seriesIndex+"dataIndex"+e.dataIndex);
                    var index = e.dataIndex;
                    var ser = e.seriesIndex
                    return data9[ser][index];
                   
                }
            }
        },*/
        yAxis: {
            type: 'category',
//            data: ['信息技术实验室', '系统集成', '智能控制与设备' , '系统与软件','研发中心'],
            data: data3,
            axisLabel : {
                interval : 0,
                formatter : function(params){
                    var newParamsName = "";
                    var paramsNameNumber = params.length;
                    var provideNumber = 4;
                    var rowNumber = Math.ceil(paramsNameNumber / provideNumber);
                    if(paramsNameNumber>8){
                        params = params.substring(0,8)+"..."
                    };
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
        xAxis: {
            axisLabel:{
                interval:0
            },
            type : 'value',
            boundaryGap : [0, 0.01]
        },
        series: series
    };

    $(document).ready(function(){
    	//FastClick.attach(document.body);
    	 var divCharts = document.getElementById('#divCharts');
    });
 
//    var divCharts = $('#divCharts');
    var divLegends = $('<div style=" padding:0 10px; text-align:left;"></div>').appendTo(divCharts);
    var divChart = $('<div class="chart" style="width:100%;" id="chart"></div>').appendTo(divCharts);
    
    var winWidth = $(window).width();
    var data4Length ;
    if(data4.length==0){
    	data4Length = 1;
    }else {
		data4Length = data4.length;
	}
    var height = 80*data3.length+10*data3.length*(data4Length-1);
    if(height<200){
    	height = 200;
    }
    $('.chart').css('height',height).css('width',winWidth);
    //$('.chart').css('height','200').css('width',winWidth);
    var analyticChart = echarts.init(divChart.get(0));
    analyticChart.setOption(option);
//divLegends

    var legend = analyticChart.chart['bar'].component.legend;
// data.legend ['legend1', 'legend2']
    $(option.legend.data).each(function(i, l){
        var color = legend.getColor(l);
        var labelLegend = $('<label class="legend">' +
            '<span class="label" style="background-color:'+color+'"></span>'+l+'</label>');
        labelLegend.mouseover(function(){
            labelLegend.css('color', color).css('font-weight', 'normal');
        }).mouseout(function(){
            labelLegend.css('color', '#333').css('font-weight', 'normal');
        }).click(function(){
            labelLegend.toggleClass('disabled');
            legend.setSelected(l, !labelLegend.hasClass('disabled'));
        });
        divLegends.append(labelLegend);
    });

//restore
    analyticChart.on('restore', function(param){
        divLegends.children('.legend').each(function(i, labelLegend){
            $(labelLegend).removeClass('disabled');
        });
    });
   
    
    //使用刚指定的配置项和数据显示图标。
    //chartBar.setOption(bar);
    analyticChart.on('click', function (param){
        var name=param.name;
        var oid ="";
//        alert(name);
        for(var i=0;i<plans.length;i++){
        	if(plans[i].name == name){
        		oid = plans[i].oid;
        		break;
        	}
        }
//        alert(oid);
        window.location.href="../html/main.html"+window.location.search+"#partyStudyList_"+oid+"_"+encodeURI(name);  
        
    });
    
}