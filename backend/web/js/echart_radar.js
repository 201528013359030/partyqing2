// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById("J_echartThird"));
var maxAssets = 0;
var maxRevenue = 0;
var maxProfit = 0;
var maxRetainedProfits = 0;
var maxEmployees = 0;
// 指定图表的配置项和数据
option = {
	    title: {
	        text: '近十年的数据统计分析',
	        subtext: '纯属虚构',
	        x:'right',
	        y:'bottom'
	    },
	    tooltip: {
	        trigger: 'item',
	        backgroundColor : 'rgba(0,0,250,0.2)'
	    },
	    legend: {
	        data: (function (){
	            var list = [];
	            var myobj=eval(economyInfo);  	            
		        for(var i=0;i<myobj.length;i++){  
		           list.push(myobj[i].ofyear+'');
		           if(parseFloat(myobj[i].assets)>maxAssets){
		        	   maxAssets = myobj[i].assets;
		           }
		           if(parseFloat(myobj[i].revenue)>maxRevenue){
		        	   maxRevenue = myobj[i].revenue;
		           }
		           if(parseFloat(myobj[i].profit)>maxProfit){
		        	   maxProfit = myobj[i].profit;
		           }
		           if(parseFloat(myobj[i].retainedProfits)>maxRetainedProfits){
		        	   maxRetainedProfits = myobj[i].retainedProfits;
		           }
		           if(parseFloat(myobj[i].employees)>maxEmployees){
		        	   maxEmployees = myobj[i].employees;
		           }		    
		        }  
		        //alert(maxAssets);
	            return list;
	        })()
	    },
	    visualMap: {
	        color: ['red', 'yellow']
	    },
	    radar: {
	       indicator : [
	           { text: '资产总额', max: maxAssets},
	           { text: '营业总收入', max: maxRevenue},
	           { text: '利润总额', max: maxProfit},
	           { text: '净利润', max: maxRetainedProfits},
	           { text: '从业人数', max: maxEmployees}
	        ]
	    },
	    series : (function (){
	        var series = [];	        
	        //alert(economyInfo);
	        var myobj=eval(economyInfo);  
	        //alert(myobj.length);
	        for(var i=0;i<myobj.length;i++){  
	           //alert(myobj[i].ofyear+"--"+myobj[i].assets+"--"+myobj[i].revenue+"--"+myobj[i].profit+"--"+myobj[i].retainedProfits+"--"+myobj[i].employees);  
	        }  
	        for(var i=0;i<myobj.length;i++){  
	            series.push({
	                name:'近十年的数据统计分析',
	                type: 'radar',
	                symbol: 'none',
	                itemStyle: {
	                    normal: {
	                        lineStyle: {
	                          width:1
	                        }
	                    },
	                    emphasis : {
	                        areaStyle: {color:'rgba(0,250,0,0.3)'}
	                    }
	                },
	                data:[
	                  {
	                    value:[
	                        myobj[i].assets,
	                        myobj[i].revenue,
	                        myobj[i].profit,
	                        myobj[i].retainedProfits,
	                        myobj[i].employees
	                    ],
	                    name: myobj[i].ofyear + ''
	                  }
	                ]
	            });
	        }
	        return series;
	    })()
	};
// 使用刚指定的配置项和数据显示图表。
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}







