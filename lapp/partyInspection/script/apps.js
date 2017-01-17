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
    miniSPA.render("partyStudyList");
    /*
     * 实际使用的过程中把代码写到这里
     * 否则js文件会越累计越多
     */
   // miniSPA.appendScript("../script/views/searchBar");
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
        alert(name);
        window.location.href="main.html#partyStudyList";

    });
}