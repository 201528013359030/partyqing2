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

dataMap.dataGDP = dataFormatter({
    //max : 60000,
    2016:[16251.93,11307.28,24515.76,11237.55,14359.88,22226.7,10568.83],
    2015:[14113.58,9224.46,20394.26,9200.86,11672,18457.27,8667.58],
    2014:[12153.03,7521.85,17235.48,7358.31,9740.25,15212.49,7278.75],
    2013:[11115,6719.01,16011.97,7315.4,8496.2,13668.58,6426.1],
    2012:[9846.81,5252.76,13607.32,6024.45,6423.18,11164.3,5284.69],
    2011:[8117.78,4462.74,11467.6,4878.61,4944.25,9304.52,4275.12],
    2010:[6969.52,3905.64,10012.11,4230.53,3905.03,8047.26,3620.27,5513.7]
});

dataMap.dataPI = dataFormatter({
    //max : 4000,
    2016:[136.27,159.72,2905.73,641.42,1306.3,1915.57,1277.44],
    2015:[124.36,145.58,2562.81,554.48,1095.28,1631.08,1050.15],
    2014:[118.29,128.85,2207.34,477.59,929.6,1414.9,980.57],
    2013:[112.83,122.58,2034.59,313.58,907.95,1302.02,916.72],
    2012:[101.26,110.19,1804.72,311.97,762.1,1133.42,783.8],
    2011:[88.8,103.35,1461.81,276.77,634.94,939.43,672.76],
    2010:[88.68,112.38,1400,262.42,589.56,882.41,625.61]
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

dataMap.dataEstate = dataFormatter({
    //max : 3600,
    2016:[1074.93,411.46,918.02,224.91,384.76,876.12,238.61],
    2015:[1006.52,377.59,697.79,192,309.25,733.37,212.32],
    2014:[1062.47,308.73,612.4,173.31,286.65,605.27,200.14],
    2013:[844.59,227.88,513.81,166.04,273.3,500.81,182.7],
    2012:[821.5,183.44,467.97,134.12,191.01,410.43,153.03],
    2011:[658.3,156.64,397.14,117.01,136.5,318.54,131.01],
    2010:[493.73,122.67,330.87,106,98.75,256.77,112.29]
});

dataMap.dataFinancial = dataFormatter({
    //max : 3200,
    2016:[2215.41,756.5,746.01,519.32,447.46,755.57,207.65],
    2015:[1863.61,572.99,615.42,448.3,346.44,639.27,190.12],
    2014:[1603.63,461.2,525.67,361.64,291.1,560.2,180.83],
    2013:[1519.19,368.1,420.74,290.91,219.09,455.07,147.24],
    2012:[1302.77,288.17,347.65,218.73,148.3,386.34,126.03],
    2011:[982.37,186.87,284.04,169.63,108.21,303.41,100.75],
    2010:[840.2,147.4,213.47,135.07,72.52,232.85,83.63,35.03]
});
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById("J_echartThird"));
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
            data: ['第一产业', '第二产业', '第三产业', 'GDP', '金融', '房地产'],
            selected: {
                'GDP': false, '金融': false, '房地产': false
            }
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
                name: 'GDP（万元）'
            }
        ],
        series: [
            {name: 'GDP', type: 'bar'},
            {name: '金融', type: 'bar'},
            {name: '房地产', type: 'bar'},
            {name: '第一产业', type: 'bar'},
            {name: '第二产业', type: 'bar'},
            {name: '第三产业', type: 'bar'},
            {
                name: 'GDP占比',
                type: 'pie',
                center: ['88%', '25%'],
                radius: '28%'
            }
        ]
    },
    options: [
        {
            title: {text: '2010铁西(开发区)宏观经济指标'},
            series: [
                {data: dataMap.dataGDP['2010']},
                {data: dataMap.dataFinancial['2010']},
                {data: dataMap.dataEstate['2010']},
                {data: dataMap.dataPI['2010']},
                {data: dataMap.dataSI['2010']},
                {data: dataMap.dataTI['2010']},
                {data: [
                    {name: '第一产业', value: dataMap.dataPI['2010sum']},
                    {name: '第二产业', value: dataMap.dataSI['2010sum']},
                    {name: '第三产业', value: dataMap.dataTI['2010sum']}
                ]}
            ]
        },
        {
            title : {text: '2011铁西(开发区)宏观经济指标'},
            series : [
                {data: dataMap.dataGDP['2011']},
                {data: dataMap.dataFinancial['2011']},
                {data: dataMap.dataEstate['2011']},
                {data: dataMap.dataPI['2011']},
                {data: dataMap.dataSI['2011']},
                {data: dataMap.dataTI['2011']},
                {data: [
                    {name: '第一产业', value: dataMap.dataPI['2011sum']},
                    {name: '第二产业', value: dataMap.dataSI['2011sum']},
                    {name: '第三产业', value: dataMap.dataTI['2011sum']}
                ]}
            ]
        },
        {
            title : {text: '2012铁西(开发区)宏观经济指标'},
            series : [
                {data: dataMap.dataGDP['2012']},
                {data: dataMap.dataFinancial['2012']},
                {data: dataMap.dataEstate['2012']},
                {data: dataMap.dataPI['2012']},
                {data: dataMap.dataSI['2012']},
                {data: dataMap.dataTI['2012']},
                {data: [
                    {name: '第一产业', value: dataMap.dataPI['2012sum']},
                    {name: '第二产业', value: dataMap.dataSI['2012sum']},
                    {name: '第三产业', value: dataMap.dataTI['2012sum']}
                ]}
            ]
        },
        {
            title : {text: '2013铁西(开发区)宏观经济指标'},
            series : [
                {data: dataMap.dataGDP['2013']},
                {data: dataMap.dataFinancial['2013']},
                {data: dataMap.dataEstate['2013']},
                {data: dataMap.dataPI['2013']},
                {data: dataMap.dataSI['2013']},
                {data: dataMap.dataTI['2013']},
                {data: [
                    {name: '第一产业', value: dataMap.dataPI['2013sum']},
                    {name: '第二产业', value: dataMap.dataSI['2013sum']},
                    {name: '第三产业', value: dataMap.dataTI['2013sum']}
                ]}
            ]
        },
        {
            title : {text: '2014铁西(开发区)宏观经济指标'},
            series : [
                {data: dataMap.dataGDP['2014']},
                {data: dataMap.dataFinancial['2014']},
                {data: dataMap.dataEstate['2014']},
                {data: dataMap.dataPI['2014']},
                {data: dataMap.dataSI['2014']},
                {data: dataMap.dataTI['2014']},
                {data: [
                    {name: '第一产业', value: dataMap.dataPI['2014sum']},
                    {name: '第二产业', value: dataMap.dataSI['2014sum']},
                    {name: '第三产业', value: dataMap.dataTI['2014sum']}
                ]}
            ]
        },
        {
            title : {text: '2015铁西(开发区)宏观经济指标'},
            series : [
                {data: dataMap.dataGDP['2015']},
                {data: dataMap.dataFinancial['2015']},
                {data: dataMap.dataEstate['2015']},
                {data: dataMap.dataPI['2015']},
                {data: dataMap.dataSI['2015']},
                {data: dataMap.dataTI['2015']},
                {data: [
                    {name: '第一产业', value: dataMap.dataPI['2015sum']},
                    {name: '第二产业', value: dataMap.dataSI['2015sum']},
                    {name: '第三产业', value: dataMap.dataTI['2015sum']}
                ]}
            ]
        },
        {
            title : {text: '2016铁西(开发区)宏观经济指标'},
            series : [
                {data: dataMap.dataGDP['2016']},
                {data: dataMap.dataFinancial['2016']},
                {data: dataMap.dataEstate['2016']},
                {data: dataMap.dataPI['2016']},
                {data: dataMap.dataSI['2016']},
                {data: dataMap.dataTI['2016']},
                {data: [
                    {name: '第一产业', value: dataMap.dataPI['2016sum']},
                    {name: '第二产业', value: dataMap.dataSI['2016sum']},
                    {name: '第三产业', value: dataMap.dataTI['2016sum']}
                ]}
            ]
        }
    ]
};
// 使用刚指定的配置项和数据显示图表。
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}







