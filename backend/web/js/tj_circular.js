var myChart = echarts.init(document.getElementById("J_echartThird"));


myChart.showLoading();
$.get('js/les-miserables-1.gexf', function (xml) {
        myChart.hideLoading();

        var graph = echarts.dataTool.gexf.parse(xml);
        var categories = [];
        categories[0] = {name:'制造业'};
        categories[1] = {name:'金融业'};
        categories[2] = {name:'建筑业'};
        categories[3] = {name:'科学研究和技术服务器业'};
        categories[4] = {name:'交通运输、仓储和邮政业'};
        categories[5] = {name:'房地产业'};
        categories[6] = {name:'批发和零售业'};
        categories[7] = {name:'住宿和餐饮业'};
graph.nodes.forEach(function (node) {
    node.itemStyle = null;
    node.value = node.symbolSize;
    node.symbolSize /= 1.5;
    node.label = {
        normal: {
            show: node.symbolSize > 10
        }
    };
    node.category = node.attributes.modularity_class;
});
option = {
        title: {
            text: '企业关系分析',
            subtext: 'Circular layout',
            top: 'bottom',
            left: 'right'
        },
        tooltip: {},
        legend: [{
            // selectedMode: 'single',
            data: categories.map(function (a) {
                return a.name;
            })
        }],
        animationDurationUpdate: 1500,
        animationEasingUpdate: 'quinticInOut',
        series : [
            {
                name: '企业关系分析',
                type: 'graph',
                layout: 'circular',
                circular: {
                    rotateLabel: true
                },
                data: graph.nodes,
                links: graph.links,
                categories: categories,
                roam: true,
                label: {
                    normal: {
                        position: 'right',
                        formatter: '{b}'
                    }
                },
                lineStyle: {
                    normal: {
                        color: 'source',
                        curveness: 0.3
                    }
                }
            }
        ]
    };

    myChart.setOption(option);
}, 'xml');
