
var J_echartwords = echarts.init(document.getElementById("J_echartwords"));

option = {
	title: {
        text: '高频词统计'
    },
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : ['融资', '信息化', '商务分析', '营销', '法律法规', '上市', '专利', '大众创业', '投资', '智能化'],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'频次',
            type:'bar',
            barWidth: '60%',
            data:[980, 850, 700, 680, 600, 570, 555, 520, 515, 400]
        }
    ]
};


// 使用刚指定的配置项和数据显示图表。
if (option && typeof option === "object") {
    J_echartwords.setOption(option, true);
}

