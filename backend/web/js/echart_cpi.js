var dataMap = {};
function dataFormatter(obj) {
//  var pList = ['北京','天津','河北','山西','内蒙古','辽宁','吉林','黑龙江','上海','江苏','浙江','安徽','福建','江西','山东','河南','湖北','湖南','广东','广西','海南','重庆','四川','贵州','云南','西藏','陕西','甘肃','青海','宁夏','新疆'];
    var pList= ["中德高端装备制造产业园" ,"先进装备制造产业园" ,"中法生态城", "化工医药产业园", "商住服务聚集区" ,"现代建筑产业园", "西部新城"];
    
    var temp;
    for (var year = 2010; year <= 2016; year++) {
        var max = 0;
        var sum = 0;
        temp = obj[year];
        for (var i = 0, l = temp.length; i < l; i++) {
            max = Math.max(max, temp[i]);
            sum += temp[i];
            obj[year][i] = {
                name : pList[i],
                value : temp[i]
            }
        }
        obj[year + 'max'] = Math.floor(max / 100) * 100;
        obj[year + 'sum'] = sum;
    }
    return obj;
}


dataMap.dataPI = dataFormatter({
    //max : 4000,
    2016:[136.27,159.72,2905.73,641.42,1306.3,1915.57,1277.44],
    2015:[124.36,145.58,2562.81,554.48,1095.28,1631.08,1050.15],
    2014:[118.29,128.85,2207.34,477.59,929.6,1414.9,980.57],
    2013:[112,122,2034,313,907,1302,916],
    2012:[101,110,1804,311,762,1133,783],
    2011:[88,103,1461,276,634,939,672],
    2010:[88,112,200,262,589,882,625]
});

dataMap.dataSI = dataFormatter({
    //max : 26600,
    2016:[3752.48,5928.32,13126.86,6635.26,8037.69,12152.15,5611.48],
    2015:[3388.38,4840.23,10707.68,5234,6367.69,9976.82,4506.31],
    2014:[2855.55,3987.84,8959.83,3993.8,5114,7906.34,3541.92],
    2013:[2626.41,3709.78,8701.34,4242.36,4376.19,7158.84,3097.12],
    2012:[2509.4,2892.53,7201.88,3454.49,3193.67,5544.14,2475.45],
    2011:[2191.43,2457.08,6110.43,2755.66,2374.96,4566.83,1915.29],
    2010:[2026.51,2135.07,5271.57,2357.04,1773.21,3869.4,1580.83]
});

dataMap.dataTI = dataFormatter({
    //max : 25000,
    2016:[12363.18,5219.24,8483.17,3960.87,5015.89,8158.98,3679.91],
    2015:[10600.84,4238.65,7123.77,3412.38,4209.03,6849.37,3111.12],
    2014:[9179.19,3405.16,6068.31,2886.92,3696.65,5891.25,2756.26],
    2013:[8375.76,2886.65,5276.04,2759.46,3212.06,5207.72,2412.26],
    2012:[7236.15,2250.04,4600.72,2257.99,2467.41,4486.74,2025.44],
    2011:[5837.55,1902.31,3895.36,1846.18,1934.35,3798.26,1687.07],
    2010:[4854.33,1658.19,3340.54,1611.07,1542.26,3295.45,1413.83]
});



// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById("J_echartCPI"));
// 指定图表的配置项和数据
option = {
    baseOption: {
        timeline: {
            // y: 0,
            axisType: 'category',
            // realtime: false,
            // loop: false,
            autoPlay: false,
            // currentIndex: 2,
            playInterval: 1000,
            // controlStyle: {
            //     position: 'left'
            // },
            data: [
                '2010-01-01','2011-01-01',
                {
                    value: '2012-01-01',
                    tooltip: {
                        formatter: '{b} GDP达到一个高度'
                    },
                    symbol: 'diamond',
                    symbolSize: 16
                },
                '2013-01-01', '2014-01-01','2015-01-01',
                {
                    value: '2016-01-01',
                    tooltip: {
                        formatter: function (params) {
                            return params.name + 'GDP达到又一个高度';
                        }
                    },
                    symbol: 'diamond',
                    symbolSize: 18
                },
            ],
            label: {
                formatter : function(s) {
                    return (new Date(s)).getFullYear();
                }
            }
        },
        title: {
            subtext: '数据来自国家统计局'
        },
        tooltip: {},
        legend: {
            x: 'right',
            data: ['内资企业', '港、澳、台商投资企业', '外商投资企业'],
           
        },
        calculable : true,
        grid: {
            top: 80,
            bottom: 100
        },
        xAxis: [
            {
                'type':'category',
                'axisLabel':{'interval':0},
                'data':[
                    "中德高端装备制造产业园" ,"\n先进装备制造产业园" ,"中法生态城", "\n化工医药产业园", "商住服务聚集区" ,"\n现代建筑产业园", "西部新城"
                ],
                splitLine: {show: false}
            }
        ],
        yAxis: [
            {
                type: 'value',
                name: '企业（个）'
            }
        ],
        series: [
            {name: '内资企业', type: 'bar'},
            {name: '港、澳、台商投资企业', type: 'bar'},
            {name: '外商投资企业', type: 'bar'},
            
        ]
    },
    options: [
        {
            title: {text: '2010铁西企业分布'},
            series: [
                {data: dataMap.dataPI['2010']},
                {data: dataMap.dataSI['2010']},
                {data: dataMap.dataTI['2010']}
            ]
        },
        {
            title : {text: '2011铁西企业分布'},
            series : [
                {data: dataMap.dataPI['2011']},
                {data: dataMap.dataSI['2011']},
                {data: dataMap.dataTI['2011']}
            ]
        },
        {
            title : {text: '2012铁西企业分布'},
            series : [
                {data: dataMap.dataPI['2012']},
                {data: dataMap.dataSI['2012']},
                {data: dataMap.dataTI['2012']}
            ]
        },
        {
            title : {text: '2013铁西企业分布'},
            series : [
                {data: dataMap.dataPI['2013']},
                {data: dataMap.dataSI['2013']},
                {data: dataMap.dataTI['2013']}
            ]
        },
        {
            title : {text: '2014铁西企业分布'},
            series : [
                {data: dataMap.dataPI['2014']},
                {data: dataMap.dataSI['2014']},
                {data: dataMap.dataTI['2014']}
            ]
        },
        {
            title : {text: '2015铁西企业分布'},
            series : [
                {data: dataMap.dataPI['2015']},
                {data: dataMap.dataSI['2015']},
                {data: dataMap.dataTI['2015']}
            ]
        },
        {
            title : {text: '2016铁西企业分布'},
            series : [
                {data: dataMap.dataPI['2016']},
                {data: dataMap.dataSI['2016']},
                {data: dataMap.dataTI['2016']}
            ]
        }
    ]
};
// 使用刚指定的配置项和数据显示图表。
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}







