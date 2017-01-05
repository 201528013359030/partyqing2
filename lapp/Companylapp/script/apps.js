var commonTxt = {
	"nodata": "暂无数据",
	"nodata_sub": "暂时没有相应的信息",
	"noweb": "网络连接失败",
	"noweb_sub": "网络链接失败，请价差您的网络设置！"
}

var noweb = {};
noweb.partial = "../html/temp/noweb.html";
noweb.init = function() {
	console.log('网址不存在');
}

var notfound = {};
notfound.partial = "../html/temp/404.html";
notfound.init = function() {
	console.log('网址不存在');
}

var home = {};
home.partial = "../html/temp/home.html";
home.init = function() {
	commonFun.setTitle("企业信息");
		var url = window.location;
	var usertype = getPermission();

 if(usertype==1||usertype==2)
	{url = url + "#list";window.location.replace(url);}
   else if(usertype==3)	{url = url + "#scontent";window.location.replace(url);}
   else{
   		var nodata = commonFun.dataEmptyError("nodata", "您无权限", "请联系管理员");
				$("#J_innerContent").html(nodata);
   }
   
// url = url + "#list"
//window.location.replace(url);
 
}

var list = {};
list.partial = "../html/temp/list.html";
list.init = function() {

	//初始化时搜索框为空
	var search = "";
	miniSPA.render("list");
	//初始化信息
	commonFun.setTitle("企业列表");
	$(".resultEnd").css("display", "none");
	J_pmsListOffset = 0;
	//生成页面

	$(".page_innerContent #J_pmsList").empty();
	setPmsList("J_pmsList", search);
 
	commonFun.load_page("#page_innerContent"); //loading加载

	if($("#page_innerContent")[0]) {

		J_pmsListFlag = true; //是否继续加载

		$("#tab1").pullToRefresh().on("pull-to-refresh", function() {
			var self = this;
			J_pmsListOffset = 0;
			setTimeout(function() {
				window.location.reload();
				$(self).pullToRefreshDone(); // 重置下拉刷新
			}, 2000); //模拟延迟
		});

		$("#tab1").infinite().on("infinite", function() {

			console.log("infiniteScroll.html");

			if(J_pmsListFlag) {
				 
				var self = this;
				if(self.loading) return;
				//$("#search_input").val("");
				$(".resultEnd").css("display", "block");
					 
				self.loading = true;
				inps = $("#search_input").val();

				setTimeout(function() {
					//此处处理加载更多内容
					//获取更多
				 

					setPmsList("J_pmsList", inps);
					//$("#J_pmsList").append("<p>在此例子中，每一个tab都包含个字的代码块，在修改时，要对应修改例如#tab1, #tab2, #tab3等相关类，切记</p>")

					self.loading = false;
				}, 2000); //模拟延迟
			}

		});
		//搜索
		$("#search_input").bind("input propertychange", function() {

			inps = $("#search_input").val();
			$("#J_pmsList").html("");
			 
			commonFun.load_page("#page_innerContent"); //loading加载
			J_pmsListOffset = 0;
			setPmsList("J_pmsList", inps);

		});

		//取消
		$("#search_cancel").click(function() {
			 
			$("#search_input").val("");
			$("#J_pmsList").html("");
			commonFun.load_page("#page_innerContent"); //loading加载
			J_pmsListOffset = 0;
			setPmsList("J_pmsList", "");

		});

		$("#search_clear").click(function() {

			$("#search_input").val("");
		 $("#J_pmsList").html("");

			commonFun.load_page("#page_innerContent"); //loading加载
			J_pmsListOffset = 0;
			setPmsList("J_pmsList", "");

		});

	}

}

//政府用户,企业详细页
var content = {};
content.partial = "../html/temp/Pminfo.html";
content.init = function() {
	miniSPA.render("content");
 
	commonFun.setTitle("企业详细信息");
	commonFun.load_page("#page_innerContent"); //loading加载
	//标志
   
	//tab1
	var id = content.parame;
 
	$("#pmInfo").empty();
	$("#pmInfo").css("display", "block");
	$("#tab1").empty();

	setPmInfo(id, "");
	//tab2
	setPmTab2(id);
	//tab3
	setPmTab3(id);

}

//企业用户,企业详细页
var scontent = {};
scontent.partial = "../html/temp/Pminfo.html";
scontent.init = function() {
	miniSPA.render("content");
	commonFun.setTitle("企业详细信息");
	commonFun.load_page("#page_innerContent"); //loading加载
	//标志

	//tab1
	var id = content.parame;
 
	$("#pmInfo").empty();
	$("#pmInfo").css("display", "block");
	$("#tab1").empty();

	setPmInfo("", "");
	//tab2
	setPmTab2("");
	//tab3
	setPmTab3("");

}

//测试页
var index = {};
index.partial = "../html/temp/index.html";
index.init = function() {
	miniSPA.render("index");

}