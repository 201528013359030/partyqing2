var SERVER_IP = sessionStorage.getItem("SERVER_IP"), // 获取url?后面的参数serverIp
														// --fyq
	NATIVE_UID = sessionStorage.getItem("NATIVE_UID");// 获取url后面的参数uid --fyq
	NATIVE_AUTH_TOKEN = sessionStorage.getItem("NATIVE_AUTH_TOKEN"); // 获取url后面的参数auth_token
																		// --fyq

var urlbase = SERVER_IP+"/partyqingx/backend/web/index.php"
var limit_home = 15,
	limit_rank = 15; // 与服务器规定最多显示多少条，死的
var page_home = 1,
	page_rank = 1; // 翻页 第几页
var flag_home = true,
	flag_rank = true; // true 可以继续翻页； false 不能继续翻页
var CURRCOUNT = 0,
	END_CURRCOUNT = 0; // currcount 答题 End_currcount查看错题

var bh = $(window).height();
if(bh<480){
    $('body').addClass('xs-screen');
}

function getJsonResult(arr){
	var result =commonFunction.getJsonResult(arr);// 返回值为数组 --fyq
	return result.d;
}

// 获取各个学习计划完成情况
function getPlanComplete(){
	
	var info = {
			"uid":NATIVE_UID,
			"auth_token":NATIVE_AUTH_TOKEN
	}
	info = JSON.stringify(info);// 将参数字符串化 --fyq;

	var arr = {
		"url":urlbase+"?r=leaderinspection/api&method=LeaderInspection.plan.complete",
		"arr":{"info":info},
		"type":"post"
	};
	// 获取数据
	var getPlans = commonFunction.getJsonResult(arr);// 返回值为数组 --fyq

//	console.log("getPlans:"+JSON.stringify(getPlans));
	if( /error/.test(getPlans) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取专题getList报错："+getPlans);
		return false;
	}
	if(getPlans.status == "-1"){
		$("#divCharts").attr({"class":"empty"});
		$("#divCharts").html("暂无");
		return false;
//		$.toast(getPlans.message,"cancel");
//		console.log("获取专题getList报错："+getPlans);
//		return false;
	}
	
	return getPlans.message; //返回json格式的message信息
	
	
}


//获取各支部党员人数
function getPartyMember(){
	
	var info = {
			"uid":NATIVE_UID,
			"auth_token":NATIVE_AUTH_TOKEN
	}
	info = JSON.stringify(info);// 将参数字符串化 --fyq;

	var arr = {
		"url":urlbase+"?r=leaderinspection/api&method=LeaderInspection.party.member",
		"arr":{"info":info},
		"type":"post"
	};
	// 获取数据
	var getMember = commonFunction.getJsonResult(arr);// 返回值为数组 --fyq
	
//	console.log("getMember:"+JSON.stringify(getMember));
	
	if(/erro/.test(getMember)){
		$.toast("有异常，请返回重试","cancel");
		console.log("获取专题getList报错："+getMember);
		return false;
	}
	
	if(getMember.status == "-1"){
		$("#legendPie").attr({"class":"empty"});
		$("#legendPie").html("暂无");
		return false;
//		$.toast(getMember.message,"cancel");
//		console.log("获取专题getList报错："+getMember);
//		return false;
	}
	
	return getMember.message; //返回json格式的message信息
}


//获取首页列表
function setListIteamx(page,partyoid){
//	var info ="{\"limit\":\"20\",\"offset\":\"0\",\"valid\":\"1\",\"uid\":\"6@3\",\"planid\":\"2\",\"p\":\""+page+"\"}";
	var info = {
			"uid":NATIVE_UID,
			"token":NATIVE_AUTH_TOKEN,
			"p":page,
			"partyoid":partyoid
	}
	info = JSON.stringify(info);//将参数字符串化 --fyq;
	var arr = {
		"url":urlbase+"?r=edu/api&method=edu.list.get",
		"arr":{"info":info},
		"type":"post"
	};
	//获取数据
	var getList = commonFunction.getJsonResult(arr);//返回值为数组 --fyq
	if( /error/.test(getList) ){
//		alert("22"+getList);
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取专题getList报错："+getList);
		return false;
	}	
	//生成页面
	var tpl_list = $("#tpl_list_iteam").html();
	var html = [];
	var display = " ";
	if(getList.role == "1"){
		var el, iteam;
		el = document.getElementById('banner');
		iteam = document.createElement('div');
		iteam.className = 'party-study-department';
		iteam.innerHTML  = getList.partyname;
		el.appendChild(iteam, el.childNodes[0]);
	}	
	sessionStorage.setItem("UID_ROLE",getList.role);
	for( var i=0; i<getList.list.length; i++ ){
		if(getList.list[i].flag == "1"){  //正在进行
			pic1 = "party-study-ongoing.png";
			pic2 = "";
		}else if(getList.list[i].flag == "2"){ //未开始
			pic1 = "party-study-notStart.png";
			pic2 = "party-study-notStart";
		}else if(getList.list[i].flag == "3"){ //已结束
			pic1 = "party-study-finished.png";
			pic2 = "party-study-list3f";
		}
		
		getList.list[i].title = getList.list[i].title.replace(/\"/g,"&quot;");
		var html_iteam = tpl_list
			.replace( /\{id\}/g,getList.list[i].id )
			.replace( /\{plan-title\}/g,encodeURI(getList.list[i].title) )
			.replace( /\{title\}/g,getList.list[i].title )
			.replace( /\{readd\}/g,getList.list[i].readd )
			.replace( /\{percent\}/g,getList.list[i].percent)
			.replace( /\{pic1\}/g,pic1)
			.replace( /\{pic2\}/g,pic2);
		
		html.push(html_iteam); //push()	向数组的末尾添加一个或更多元素，并返回新的长度。 --fyq
	}
	
	//append()	向匹配元素集合中的每个元素结尾插入由参数指定的内容。 --fyq
	//join()	把数组的所有元素放入一个字符串。元素通过指定的分隔符进行分隔。 --fyq
	$("#J_listGroup").append( html.join('') ); 
	if(getList.role == "3"){
		$(".party-study-list3").hide();
	}
	//$(selector).html(content) html() 方法返回或设置被选元素的内容 (inner HTML)。	如果该方法未设置参数，则返回被选元素的当前内容。
	//当使用该方法返回一个值时，它会返回第一个匹配元素的内容。当使用该方法设置一个值时，它会覆盖所有匹配元素的内容
	
	console.log("getList.count:"+getList.count);
	console.log("limit_home:"+limit_home);
	console.log("getList.list.length:"+getList.list.length);
	
	
	//判断显示是否可以继续加载下一页
	//先算一下一共有几页
	var totalpage = Math.ceil(getList.count/limit_home);
	//如果数据小于limit 则不能继续翻页 下拉加载
	if( getList.list.length<limit_home||getList.count==1||totalpage==page_home ){
		$(".resultEnd").hide();
		$(".resultEnd_nodata").show();
		flag_home = false;
	}else{
		flag_home = true;
		page_home++;
	}	
	
	console.log("flag_home:"+flag_home)
}


function tasklist(planid,page){
	var info = {
			"uid":NATIVE_UID,
			"token":NATIVE_AUTH_TOKEN,
			"planid":planid,
			"p":page,
			//"limit":5,
	}
	info = JSON.stringify(info);//将参数字符串化 --fyq;
	/*************获取学习任务列表***************/
	var arr = {
		"url":urlbase+"?r=edutask/api&method=edutask.list.get",
		"arr":{"info":info},
		"type":"post"
	};
	//获取数据
	var getList = commonFunction.getJsonResult(arr);
	
	console.log("moudle：tasklist()："+JSON.stringify(getList));
	
	if( /error/.test(getList) ){
//		alert("22"+getList);
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取专题getList报错："+getList);
		return false;
	}
//	console.log("getList.list.length:"+getList.list.length);
	if(getList.list.length==0){
		$(".resultEnd").hide();
		$(".resultEnd_nodata").show();
		$("#J_listGroup").attr({"class":"empty"});
		$("#J_listGroup").html("暂无");
		return false;
	}
	
	var tpl_list = $("#tpl_list_iteam").html();
	var html = [];
	var display="";
	var finish="";
		
	for( var i=0; i<getList.list.length; i++){
		if(getList.list[i].pic){}else{getList.list[i].pic="../images/temp/party-study-task1.png";}				
		if(getList.list[i].time){
			var time0=getList.list[i].time.split(" ");	
		    time0=time0[0];
		}else{var time0="";}	
		if(getList.list[i].isend== 1){ 
			finish="party-task-finished";
		}else{
			finish="";
			}
		var html_iteam = tpl_list
		.replace( /\{id\}/g,getList.list[i].id )
		.replace( /\{title\}/g,getList.list[i].title )
		.replace( /\{readd\}/g,getList.list[i].readd )
		.replace( /\{content\}/g,getList.list[i].content)
		.replace( /\{pic\}/g,getList.list[i].pic)
		.replace( /\{time\}/g,time0)
		.replace( /\{finish\}/g,finish)
		.replace( /\{display\}/g,display);
	   html.push(html_iteam); 		
	 }
	$("#J_listGroup").append( html.join('') ); 
	//如果数据小于limit 则不能继续翻页 下拉加载
	flag_search_tasklist = false;
	if( getList.list.length<limit_home){
		$(".resultEnd").hide();
		$(".resultEnd_nodata").show();
		flag_home_tasklist = false;
	}else{
		$(".resultEnd").show();
		$(".resultEnd_nodata").hide();
		flag_home_tasklist = true;
		page_home++;
	}
}


//首页列表页面中搜索
function tasksearch(searchtitle,planid,page){
	var info = {
			"uid":NATIVE_UID,
			"token":NATIVE_AUTH_TOKEN,
			"searchcontent":searchtitle,
			"planid":planid,
			"p":page,
	}
	info = JSON.stringify(info);//将参数字符串化 --fyq;
	var arr = {
		"url":urlbase+"?r=edutask/api&method=edutask.list.search",
		"arr":{"info":info},
		"type":"post"
	};
	//获取数据
	var getList = commonFunction.getJsonResult(arr);//返回值为数组 --fyq
	if( /error/.test(getList) ){
//		alert("22"+getList);
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取专题getList报错："+getList);
		return false;
	}
	//console.log("getList"+JSON.stringify(getList));
//	return ;			
	//生成页面
	var tpl_list = $("#tpl_list_iteam").html();
	var html = [];
	var display = "";
	var finish="";
	for( var i=0; i<getList.list.length; i++){
		if(getList.list[i].pic){
		}else{getList.list[i].pic="../images/temp/party-study-task1.png";}
		if(getList.list[i].isend=="1"){ 
			finish="party-task-finished";
			display="none";
		}else{
			finish="";
			display="";}
//		if(getList.role=="3"){display="none";finish="";}
		if(getList.list[i].time){
			var time0=getList.list[i].time.split(" ");	
		    time0=time0[0];
		}else{var time0="";}
		var html_iteam = tpl_list
		.replace( /\{id\}/g,getList.list[i].id )
		.replace( /\{title\}/g,getList.list[i].title )
		.replace( /\{readd\}/g,getList.list[i].readd )
		.replace( /\{content\}/g,getList.list[i].content)
		.replace( /\{pic\}/g,getList.list[i].pic)
		.replace( /\{time\}/g,time0)
		.replace( /\{finish\}/g,finish)
		.replace( /\{display\}/g,display);
		//.replace( /\{matertype\}/g,getList.list[i].matertype||"学习材料" );		
	//alert(html_iteam);	
	   html.push(html_iteam); 
		
	 }
	
	//append()	向匹配元素集合中的每个元素结尾插入由参数指定的内容。 --fyq
	//join()	把数组的所有元素放入一个字符串。元素通过指定的分隔符进行分隔。 --fyq
	$("#J_listGroup").append( html.join('') ); 
	
	//$(selector).html(content) html() 方法返回或设置被选元素的内容 (inner HTML)。	如果该方法未设置参数，则返回被选元素的当前内容。
	//当使用该方法返回一个值时，它会返回第一个匹配元素的内容。当使用该方法设置一个值时，它会覆盖所有匹配元素的内容		
	//判断显示是否可以继续加载下一页
	//先算一下一共有几页
	//var totalpage = Math.ceil(getList.length/limit_home);
	//如果数据小于limit 则不能继续翻页
	flag_home_tasklist = false;
	if( getList.list.length<limit_home){
	//if( getList.list.length<4){
		$(".resultEnd").hide();
		$(".resultEnd_nodata").show();
		flag_search_tasklist = false;
	}else{
		$(".resultEnd").show();
		$(".resultEnd_nodata").hide();
		flag_search_tasklist = true;
		page_search++;		
	}	
}


//任务完成设置
function taskcomplete(id){
	var info = {
			"uid":NATIVE_UID,
			"token":NATIVE_AUTH_TOKEN,
			"taskid":id
	}
	info = JSON.stringify(info);
	var arr = {
		"url":urlbase+"?r=edutask/api&method=edutask.task.complete",
		"arr":{"info":info},
		"type":"post"
	};
	//获取数据
	var getList = commonFunction.getJsonResult(arr);//返回值为数组 --fyq
	if( /error/.test(getList) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("提交任务完成："+getList);
		return false;
	}
//	console.log("getList"+JSON.stringify(getList));
}







