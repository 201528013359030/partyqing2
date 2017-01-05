
function barEquPie(foundtimeJson){
	var myobj=eval(foundtimeJson);
	var datas = new Array();
	var data = [];
	for(var i=0;i<myobj.length;i++){
	   datas[i] = new Array();
	   //alert(myobj[i].statValue);
	   //datas[i].value = parseInt(myobj[i].statValue,10);
	   //datas[i].name = myobj[i].statYear;
	   data[i] = myobj[i].statYear;
	   datas[i] = {
               name : myobj[i].statYear,
               value : parseInt(myobj[i].statValue,10)
           }
	}
	/*var datas =[
                {value:1, name:"2014"},
                {value:1, name:"2013"},
                {value:1, name:"2012"},
                {value:2, name:"2011"},
                {value:1, name:"2008"},
                {value:6, name:"2006"},
                {value:1, name:"2004"},
                {value:1, name:"1999"},
                {value:1, name:"1996"},
            ];*/
	//alert(datas[0].value);
	var mychats = echarts.init(document.getElementById('J_barEquPie'));
	var option = {
    title : {
        text: '企业分布',
        subtext: '单位：个',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
     legend: {
        x : 'center',
        y : 'bottom',
        data:data
    },
    series : [
        {
            name: '企业分布',
            type: 'pie',
            radius : '60%',
            center: ['50%', '43%'],
            label:{normal:{position:'inner'}},
            data:datas,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                
                normal:{label:{show:true,formatter:'{d}%',textStyle:{baseline:'bottom'}},labelLine:{show:true},}
            }
        }
    ]
};
	// 使用刚指定的配置项和数据显示图表。
    mychats.setOption(option);
}

function barEquEType(regtypeJson){
	var myobj=eval(regtypeJson);
	var datas = new Array();
	var categories = new Array();
	var data = [];
	for(var i=0;i<myobj.length;i++){
	   data[i] = new Array();
	   //alert(myobj[i].statValue);
	   //data[i].value = parseInt(myobj[i].statValue,10);
	   //data[i].name = myobj[i].regTypeStr;
	   data[i] = {
               name : myobj[i].regTypeStr,
               value : parseInt(myobj[i].statValue,10)
           }
	   datas[i] = parseInt(myobj[i].statValue,10);
	   categories[i] = myobj[i].regTypeStr;
	}
	//var datas =[1040,82,19];
	//var categories = ["内资","外商投资","港澳台商投资"];
	var mychats = echarts.init(document.getElementById('J_barEquEType'));
	var option = {
    title : {
        text: '经济类型',
        subtext: '单位：个',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    series : [
        {
            name: '经济类型',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            label:{normal:{position:'inner'}},
            /*data:[
                {value:datas[0], name:categories[0]},
                {value:datas[1], name:categories[1]},
                {value:datas[2], name:categories[2]}
            ],*/
            data:data,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{label:{show:true,formatter:'{d}%'},labelLine:{show:true}}
            }
        },
        {
            name: '经济类型',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            label:{normal:{position:'outer'}},
            /*data:[
                {value:datas[0], name:categories[0]},
                {value:datas[1], name:categories[1]},
                {value:datas[2], name:categories[2]}
            ],*/
            data:data,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{label:{show:true,formatter:'{b}:{c}'},labelLine:{show:true}}
            }
        }
    ]
};
	// 使用刚指定的配置项和数据显示图表。
    mychats.setOption(option);
}

function barEquWType(industryJson){
	var myobj=eval(industryJson);
	var datas = new Array();
	var categories = new Array();
	var data = [];
	for(var i=0;i<myobj.length;i++){
	   data[i] = new Array();
	   //alert(myobj[i].statValue);
	   //data[i].value = parseInt(myobj[i].statValue,10);
	   //data[i].name = myobj[i].name;
	   data[i] = {
               name : myobj[i].name,
               value : parseInt(myobj[i].statValue,10)
           }
	   datas[i] = parseInt(myobj[i].statValue,10);
	   categories[i] = myobj[i].name;
	}
	//var datas =[10,82,40];
	//var categories = ["一产","二产","三产"];
	var mychats = echarts.init(document.getElementById('J_barEquWType'));
	var option = {
    title : {
        text: '行业分类',
        subtext: '单位：个',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    series : [
        {
            name: '行业分类',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            label:{normal:{position:'inner'}},
            /*data:[
                {value:datas[0], name:categories[0]},
                {value:datas[1], name:categories[1]},
                {value:datas[2], name:categories[2]}
            ],*/
            data:data,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{label:{show:true,formatter:'{d}%'},labelLine:{show:true}}
            }
        },
        {
            name: '行业分类',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            label:{normal:{position:'outer'}},
            /*data:[
                {value:datas[0], name:categories[0]},
                {value:datas[1], name:categories[1]},
                {value:datas[2], name:categories[2]}
            ],*/
            data:data,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{label:{show:true,formatter:'{b}:{c}'},labelLine:{show:true}}
            }
        }
    ]
};
	// 使用刚指定的配置项和数据显示图表。
    mychats.setOption(option);
}

function barEquScale(scaleJson){
	var myobj=eval(scaleJson);
	var datas = new Array();
	var categories = new Array();
	var data = [];
	for(var i=0;i<myobj.length;i++){
	   data[i] = new Array();
	   //alert(myobj[i].statValue);
	   //data[i].value = parseInt(myobj[i].statValue,10);
	   //data[i].name = myobj[i].scaleStr;
	   data[i] = {
               name : myobj[i].scaleStr,
               value : parseInt(myobj[i].statValue,10)
           }
	   datas[i] = parseInt(myobj[i].statValue,10);
	   categories[i] = myobj[i].scaleStr;
	}
	//var datas =[9,13,7,82];
	//var categories = ["微型","中型","大型","小型"];
	var mychats = echarts.init(document.getElementById('J_barEquScale'));
	var option = {
    title : {
        text: '企业规模',
        subtext: '单位：个',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    series : [
        {
            name: '企业规模',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            label:{normal:{position:'inner'}},
            /*data:[
                {value:datas[0], name:categories[0]},
                {value:datas[1], name:categories[1]},
                {value:datas[2], name:categories[2]},
                {value:datas[3], name:categories[3]}
            ],*/
            data:data,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{label:{show:true,formatter:'{d}%'},labelLine:{show:true}}
            }
        },
        {
            name: '企业规模',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            label:{normal:{position:'outer'}},
            /*data:[
                {value:datas[0], name:categories[0]},
                {value:datas[1], name:categories[1]},
                {value:datas[2], name:categories[2]},
                {value:datas[3], name:categories[3]}
            ],*/
            data:data,
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                normal:{label:{show:true,formatter:'{b}:{c}'},labelLine:{show:true}}
            }
        }
    ]
};
	// 使用刚指定的配置项和数据显示图表。
    mychats.setOption(option);
}