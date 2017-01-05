function barFeedbackArea(){
	var win_w = $(window).width();
	//获取变量
	// _arrnot 已处理；  _arrdo 总数 _arrvalue完成率
	var _legend='完成率,反馈总数'.split(","),
	_arrcat ='中德高\n端装备制\n造产业园,先进装备\n制造产业园,中法生态城,化工医药\n产业园,商住服\n务聚集区,现代建\n筑产业园,西部新城'.split(","), 
   // _arrcat = '临床学院,生物医学工程系,生物医学系,眼视光系,艺术学院,药学系,药学院,基础医学院'.split(","), 
    
//  _arrvalue=[[1,0,55,0,0,0,5,0],[399,33,445,99,59,60,36,25]],

	_arrvalue = [10,60,91,70,3,8,100],
	
	_arrnot = [10,20,55,70,2,8,36],
	
	_arrdo = [100,33,60,99,59,100,36],
    
    _title='总数：487 完成：201 完成率：41%', 
    
    _unit='百分比',
    
    _barname='条形图名称'; //无用但保留
    
    //控制表格labe的属性
	var attrSeries = 'inside,right'.split(",");
	var barIndex = [1,0];
    var barwidth = [20,5];
    var attrcolor = '#2485EA,#70B3CD'.split(",");
	
	
	var mychats = echarts.init(document.getElementById('J_barFeedbackArea'));
	        
    var  option = {
        	animation:false,
		    title : {
		        text: _title,
		        subtext: "单位："+_unit,
		        x:'left',
		        textStyle:{color:'#000'}
		        
		    },
		    tooltip : {
		        trigger: 'axis',
		        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
		            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
		        },
		        formatter: function (params){
		        	//console.log(params);
        			return params[0].name + '<br/>'                   		
               		+ '已处理' + ' : ' + _arrnot[params[0].dataIndex]+'<br/>'
               		+ '总数' + ' : ' + _arrdo[params[0].dataIndex]+'<br/>'
               		+ params[0].seriesName + ' : ' + params[0].value + '%'+'<br/>'
    			}
		    },
		    legend: {
		    	show : false,
		        data:_legend
		    },
		    toolbox: {
		        show : false,
		        feature : {
		            mark : {show: true},
		            dataView : {show: true, readOnly: false},
		            magicType: {show: true, type: ['line', 'bar']},
		            restore : {show: true},
		            saveAsImage : {show: true}
		        }
		    },
		    calculable : false,
		    grid: {
		        left: '2%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
		    xAxis : [
		        {
		            type : 'value',
		            //axisLabel:{formatter:'{value}'}
		            boundaryGap: [0, 0],
		            max: '100'
		        }
		    ],
		    yAxis : [
		    	{
		            type : 'category',
		            data : _arrcat
		        }
		    ],
			series : [							
			{
	            name:_legend[0],
	            type:'bar',
	            barCategoryGap:'50%',
	            
	            //yAxisIndex:barIndex[0],
       			itemStyle: {
       				normal: {color:attrcolor[0], barBorderRadius:0,
       				label:{show:true, 
       				formatter: function (params) {
       					       					
                        for (var i = 0, l = option.yAxis[0].data.length; i < l; i++) {                             	
                            if (option.yAxis[0].data[i] == params.name) {
                            										
                                return  params.value + '% (' +_arrnot[i]+'/'+_arrdo[i]+')';
                            }
                        }
                   	},
       				}
       				}
       				},
	            data:function(){
	            	var datas =[];
	            	var tem ='';
	            	for(var i=0;i<_arrvalue.length;i++){
	            		if(_arrvalue[i]>=70){
		            		 tem = {
		            			value:_arrvalue[i],
		            			itemStyle : { normal: {label : {position: 'insideRight'}}}
		            		}
	            		}else{
	            			 tem = {
		            			value:_arrvalue[i],
		            			itemStyle : { normal: {label : {position: 'right'}}}
		            		}
	            		}
	            		datas.push(tem);
	            	}
	            	return datas;
	            }()
		    }				
			]

		};
           
	
	// 使用刚指定的配置项和数据显示图表。
    mychats.setOption(option);
}

function barFeedbackPeople(){
	var win_w = $(window).width();
	//获取变量
	// _arrnot 已处理；  _arrdo 总数 _arrvalue完成率
	var _legend='完成率,反馈总数'.split(","),
	_arrcat ='王大锤,王毅,常万全,刘国胜,傅一波,张万,杨权'.split(","), 
   
	_arrvalue = [10,60,91,70,3,8,100],
	
	_arrnot = [10,20,55,70,2,8,36],
	
	_arrdo = [100,33,60,99,59,100,36],
	
	_arrJson = [{"中德":"2/10"},{"中法":"8/10"},{"化工医药":"8/10"},{"商住":"8/10"},{"现代建筑":"8/10"},{"西部新城":"8/10"},{"先进装备":"8/10"}],
    
    //'中德高\n端装备制\n造产业园,先进装备\n制造产业园,中法生态城,化工医药\n产业园,商住服\n务聚集区,现代建\n筑产业园,西部新城'
    
    _title='政府人员工作量统计', 
    
    _unit='百分比',
    
    _barname='条形图名称'; //无用但保留
    
//  for(var i=0,l=_arrJson.length;i<l;i++){
//	    for(var key in _arrJson[i]){
//	        console.log(key+':'+_arrJson[i][key]);
//	    }
//	 }
    
    
    //控制表格labe的属性
	var attrSeries = 'inside,right'.split(",");
	var barIndex = [1,0];
    var barwidth = [20,5];
    var attrcolor = '#2485EA,#70B3CD'.split(",");
	var mychats = echarts.init(document.getElementById('J_barFeedbackPeople'));
	
	var  option = {
        	animation:false,
		    title : {
		        text: _title,
		        subtext: "单位："+_unit,
		        x:'left',
		        textStyle:{color:'#000'}
		        
		    },
		    tooltip : {
		        trigger: 'axis',
		        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
		            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
		        },
//		        position:function(p){
//		        	return [win_w-120,30];
//		        },
		        formatter: function (params){
		        	
		        	var otherValue = "";
		        	var keys = params[0].dataIndex;
		        	
		        	for(var key in _arrJson[keys]){
				        console.log(key+':'+_arrJson[keys][key]);
				        otherValue+=key+':'+_arrJson[keys][key]+'<br/>';
				    }
		        	
		        	//console.log(params);
        			return params[0].name + '<br/>'                   		
               		+ '已处理' + ' : ' + _arrnot[params[0].dataIndex]+'<br/>'
               		+ '总数' + ' : ' + _arrdo[params[0].dataIndex]+'<br/>'
               		+ params[0].seriesName + ' : ' + params[0].value + '%'+'<br/>'+otherValue;
    			}
		    },
		    legend: {
		    	show : false,
		        data:_legend
		    },
		    toolbox: {
		        show : false,
		        feature : {
		            mark : {show: true},
		            dataView : {show: true, readOnly: false},
		            magicType: {show: true, type: ['line', 'bar']},
		            restore : {show: true},
		            saveAsImage : {show: true}
		        }
		    },
		    calculable : false,
		    grid: {
		        left: '2%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
		    xAxis : [
		        {
		            type : 'value',
		            //axisLabel:{formatter:'{value}'}
		            boundaryGap: [0, 0],
		            max: '100'
		        }
		    ],
		    yAxis : [
		    	{
		            type : 'category',
		            data : _arrcat
		        }
		    ],
			series : [							
			{
	            name:_legend[0],
	            type:'bar',
	            barCategoryGap:'50%',
	            
	            //yAxisIndex:barIndex[0],
       			itemStyle: {
       				normal: {color:attrcolor[0], barBorderRadius:0,
       				label:{show:true, 
       				formatter: function (params) {
       					       					
                        for (var i = 0, l = option.yAxis[0].data.length; i < l; i++) {                             	
                            if (option.yAxis[0].data[i] == params.name) {
                            										
                                return  params.value + '% (' +_arrnot[i]+'/'+_arrdo[i]+')';
                            }
                        }
                   	},
       				}
       				}
       				},
	            data:function(){
	            	var datas =[];
	            	var tem ='';
	            	for(var i=0;i<_arrvalue.length;i++){
	            		if(_arrvalue[i]>=70){
		            		 tem = {
		            			value:_arrvalue[i],
		            			itemStyle : { normal: {label : {position: 'insideRight'}}}
		            		}
	            		}else{
	            			 tem = {
		            			value:_arrvalue[i],
		            			itemStyle : { normal: {label : {position: 'right'}}}
		            		}
	            		}
	            		datas.push(tem);
	            	}
	            	return datas;
	            }()
		    }				
			]

		};
	
	// 使用刚指定的配置项和数据显示图表。
    mychats.setOption(option);
}