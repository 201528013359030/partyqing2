var J_projMineLimit = 14,
	J_projAllLimit = 14,
	J_projOtherLimit = 14,
	J_searchLimit = 14,
	J_projMineOffset = 0,
	J_projAllOffset = 0,
	J_projOtherOffset = 0,
	J_searchOffset = 0,
	J_projMineFlag = true,
	J_projAllFlag = true,
	J_projOtherFlag = true,
	J_searchFlag = true;
var isOnline = true;
var projName = "",
	dirName = "",
	fileName = "";

var projIsFirst = true,
	docIsFirst = true;

var logIsFirst = true,
	logLimit = 14,
	logOffset = 0;

//首页设置项目列表
function setProjList( id ){
	
	var type = "",
		limit = eval( id+"Limit" ),
		offset = eval( id+"Offset" );
	
	//console.log(limit);
	
	if( /Mine/.test(id) ){
		type = "mine";
	}else if( /All/.test(id) ){
		type = "all";
	}else{
		type = "public";
	}
	//获取项目列表 页面输出
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"type":type,
		"limit":limit,
		"offset":offset
	};
	var results = commonFun.getJsonResult( "project.list.get",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取project.list.get报错："+results);
		return false;
	}
	
	//页面暂无
	if(projIsFirst){
		if(results.length<1){
			var nodata = commonFun.dataEmpty("nodata","暂无项目","还没有相关项目");
			$("#"+id).html( nodata );
			return false;
		}
		projIsFirst = false;
	}
	
		
	//如果有内容则存储在本地
	/*	 
	var str_infos = JSON.stringify(infos);
	var str_64_infos = base64encode(utf16to8(str_infos));
	console.log("FirstVisit str_infos:"+str_infos);
	NativeInteractive.appCacheStore({"keys":id,"datas":str_64_infos}); 
	*/
	//判断取值是否是最后一页，
	if(results.length<limit){
		$("."+id+"End").css("display","none");
		$("."+id+"End").html('');
		if( /Mine/.test(id) ){
			J_projMineFlag = false;
			//console.log("J_projMineFlag:"+J_projMineOffset);
		}else if( /All/.test(id) ){
			J_projAllFlag = false;
			//console.log("J_projAllFlag:"+J_projAllOffset);
		}
		
	}else{
		$("."+id+"End").css("display","block");
		$("."+id+"End").html('<div class="infinite-preloader"></div>正在加载...');
				
	}
		
	//渲染页面
	var tpl_proj = $("#tpl_proj").html();
	var html = [];
	
	for( var i=0; i<results.length; i++ ){
		var isTrue = false;
		var iscreator = results[i].creator==sessionStorage.getItem("NATIVE_UID")?true:false; 
		if( iscreator||results[i].pPublic=="1" ){
			isTrue = true;
		}
		var _html = tpl_proj
		.replace( /\{pID\}/g,results[i].pID )
		.replace( /\{pName\}/g,results[i].pName )
		.replace( /\{creatorName\}/g,results[i].creatorName )
		.replace( /\{createTime\}/g,results[i].approveTime )
		.replace( /\{creatorstatus\}/g,isTrue?"":commonTxt["projMsg_status"+results[i].pStatus] )
		.replace( /\{proj_status\}/g,isTrue?getProjStatus(results[i].pStatus,results[i].pID):"" );
		html.push(_html);
	}
	
	$("#"+id).append( html.join("") );
	
	if( /Mine/.test(id) ){
		J_projMineOffset = J_projAllOffset+limit;
		//console.log("J_projMineOffset:"+J_projMineOffset);
	}else if( /All/.test(id) ){
		J_projAllOffset = J_projAllOffset+limit;
		//console.log("J_projAllOffset:"+J_projAllOffset);
	}
	
	
}
//显示项目状态
function getProjStatus( status,pid ){
	var status = status;
	
	var html = "";
	switch(status){
	case "0":
	  html = '<a href="javascript:void(0);" class="weui_btn weui_btn_mini weui_btn_gray J_btnStatus" data-projId="'+pid+'">'+commonTxt["pro_status"+status]+'</a>';
	  break;
	case "1":
	html = '<a href="javascript:void(0);" class="weui_btn weui_btn_mini weui_btn_primary J_btnStatus" data-projId="'+pid+'">'+commonTxt["pro_status"+status]+'</a>';
	break;
	case "2":
	html = '<a href="javascript:void(0);" class="weui_btn weui_btn_mini weui_btn_yellow J_btnStatus" data-projId="'+pid+'">'+commonTxt["pro_status"+status]+'</a>';
	break;
	case "3":
	html = '<a href="javascript:void(0);" class="weui_btn weui_btn_mini weui_btn_gray J_btnStatus" data-projId="'+pid+'">'+commonTxt["pro_status"+status]+'</a>';
	  break;
	default:
	  break;
	}
	
	return html;
}
//更新项目状态 传值 pID  pStatus
function projUpdateStatus(pID,status){
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"pID":pID,
		"pStatus":status
	};
	var results = commonFun.getJsonResult( "project.update",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取project.update报错："+results);
		return false;
	}
	return results.success==1?true:false;
}
//更新文档状态 
function docUpdateStatus(dID,status){
	var arr = {
		"dID":dID,
		"status":status,
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID")
	};
	var results = commonFun.getJsonResult( "document.update",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("document.update报错："+results);
		return false;
	}
	return results.success==1?true:false;
}
//更新项目评分
function docUpdateScore(dID,star){
	var arr = {
		"dID":dID,
		"dScore":star,
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID")
	};
	var results = commonFun.getJsonResult( "document.update",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("document.update报错："+results);
		return false;
	}
	return results.success==1?true:false;
}

//生成项目首页，生成 项目文档  日志  简介 
function setProjHome( pID ){
	var pPublics = "";
	var results = getProInfo( pID );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取setProjHome报错："+results);
		return false;
	}
	
	var pstatus =commonTxt["projMsg_status"+results.pStatus];
	//alert(pstatus);
	var pnames = results.pName+"("+pstatus+")";
	$("#J_projName").html(pnames);
	//projName = results.pName;
	
	var tpl_projMsg = $("#tpl_projMsg").html();
	var html = "";
	
	html = tpl_projMsg
		.replace( /\{pID\}/g,results.pID )
		.replace( /\{pPublic\}/g,sessionStorage.getItem("NATIVE_UID")==results.creator?"1":"0" )
		.replace( /\{projMsg_status\}/g,commonTxt["projMsg_status"+results.pStatus] )
		.replace( /\{memberCount\}/g,results.memberCount );
		
	pPublics = sessionStorage.getItem("NATIVE_UID")==results.creator?"1":"0";	
	$("#J_porjMsg").html( html );
	//sessionStorage.getItem("NATIVE_UID")==results.creator
	if( sessionStorage.getItem("NATIVE_UID")==results.creator ){
		$("#page_innerContent #J_btnStatus").css("display","flex");
		$("#page_innerContent #J_btnCustom").css("display","none");
		
	}else{
		$("#page_innerContent #J_btnStatus").css("display","none");
		$("#page_innerContent #J_btnCustom").css("display","flex");
		
	}
	if( results.pPublic=="是" ){
		$("#page_innerContent #ispublicMem").css("display","none");
		$("#tab3,#J_tabContact").css("display","none");
	}else{
		$("#page_innerContent #ispublicMem").css("display","flex");
	}
	
	
	//调用项目文档 
	getProjDoc( "subdir.get",pID,"" );
	//调用获取日志
	getProjInfo( pID,"" );
	setPorjMember( pID,pPublics );
	
}

//生成 项目简介页面
function setProjDetail( pID ){
	var results = getProInfo( pID );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取"+method+"报错："+results);
		return false;
	}
	//$("#J_projName").html( projName );
	var tpl_projDetail = $("#tpl_projDetail").html();
	var html = "";
	html = tpl_projDetail
		.replace( /\{pNum\}/g,results.pNum )
		.replace( /\{wDay\}/g,results.wDay+"天" )
		.replace( /\{prName\}/g,results.prName )
		.replace( /\{creatorName\}/g,results.creatorName )
		.replace( /\{creatorPhone\}/g,results.creatorPhone )
		.replace( /\{fLocation\}/g,results.fLocation?results.fLocation:"暂无" )
		.replace( /\{mSource\}/g,results.mSource )
		.replace( /\{approveTime\}/g,results.approveTime )
		.replace( /\{pKind\}/g,results.pKind )
		.replace( /\{cName\}/g,results.cName )
		.replace( /\{pQuota\}/g,results.pQuota==0?0:(results.pQuota+"万元") )
		.replace( /\{rQuota\}/g,results.rQuota==0?0:(results.rQuota+"万元") )
		.replace( /\{aQuota\}/g,results.aQuota==0?0:(results.aQuota+"万元") )
		.replace( /\{pType\}/g,results.pType )
		.replace( /\{pPublic\}/g,results.pPublic )
		.replace( /\{memo\}/g,results.memo );
	
	$("#J_projInfos").html( html );
	
}

//获取项目基本信息
function getProInfo( pID ){
	//获取项目基本信息
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"pID":pID
	};
	var results = commonFun.getJsonResult( "project.get",arr );
	return results;
}

//获取项目文档
function getProjDoc( method,pID,sID ){
	//获取数据
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"pID":pID,
		"psID":sID
	};
	var results = commonFun.getJsonResult( method,arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取"+method+"报错："+results);
		return false;
	}
	
	//$("#J_projName").html( projName );	
	
	var data_dir = results.dir,
		data_file = results.file;
	var tpl_dir = $("#tpl_dir").html(),
		tpl_file = $("#tpl_file").html();
	var html_dir = [],
		html_file = [];
		
	if(data_dir.length>0){
		for( var i=0;i<data_dir.length;i++){
			var type_icon = getFileType(data_dir[i].fType);
			var iteam = tpl_dir
				.replace( /\{sID\}/g,data_dir[i].sID )
				.replace( /\{fType\}/g,'<img src="../images/icon/icon_file.jpg" alt="" style="width:20px;margin-right:5px;display:block">' )
				.replace( /\{pID\}/g,data_dir[i].pID )
				.replace( /\{sName\}/g,data_dir[i].sName );
			html_dir.push(iteam);
		}
		if( $("#J_dirName")[0] ){
			$("#J_dirName").html(data_dir[0].psName);
		}
		
	}
	if(data_file.length>0){
		for( var i=0;i<data_file.length;i++){
			
			var iteam = tpl_file
				.replace( /\{pID\}/g,data_file[i].pID )
				.replace( /\{dID\}/g,data_file[i].dID )
				.replace( /\{creatorName\}/g,data_file[i].uName?data_file[i].uName:"未知" )
				.replace( /\{fType\}/g,'<img src="../images/icon/icon_document.jpg" alt="" style="width:20px;margin-right:5px;display:block">' )
				.replace( /\{dName\}/g,data_file[i].dName )
				.replace( /\{createTime\}/g,data_file[i].updateTime )
				.replace( /\{docStatus\}/g, commonTxt["doc_status"+data_file[i].status] );
			html_dir.push(iteam);
		}
		if( $("#J_dirName")[0] ){
			$("#J_dirName").html(data_file[0].psName);
		}
		
	}
	$("#J_projDocList").append(html_dir.join(""));
	$("#J_projDocList").append(html_file.join(""));
	
	if( data_file.length==0&&data_dir.length==0 ){
		var nodata = commonFun.dataEmpty("nodata","暂无文档","还没有相关文档");
		$("#page_innerContent #J_projDocList").html( nodata );
	}
	
}
//生成文档详细页面
function setProjDoc( pID,dID ){
	
	//获取文档信息
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"pID":pID,
		"dID":dID
	};
	var results = commonFun.getJsonResult( "document.get",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取document.get报错："+results);
		return false;
	}
	
	
	//显示页面
	var tpl_doc = $("#tpl_doc").html(),
		tpl_docOp = $("#tpl_docOp").html(),
		tpl_currfile = $("#tpl_currfile").html(),
		tpl_file = $("#tpl_file").html();
	var html = "",
		html_op="",
		html_currfile = "",
		html_file = [];
	//显示操作
	if( sessionStorage.getItem("NATIVE_UID")==results.creator ){
		html_op = tpl_docOp
			.replace( /\{dID\}/g,results.dID )
			.replace( /\{status\}/g,commonTxt["docMsg_status"+results.status] );
	}
	
	//显示分数	
	
	fileName = results.dName;
	
	html = tpl_doc
		.replace( /\{pName\}/g,results.pName )
		.replace( /\{pStatus\}/g,commonTxt["projMsg_status"+results.pStatus] )
		.replace( /\{dName\}/g,results.dName )
		.replace( /\{dID\}/g,results.dID )
		.replace( /\{pID\}/g,results.pID )
		.replace( /\{docop\}/g,html_op);
	
	if(results.file){
		var type_icon = getFileType(results.file.fType);
		
		var ver = results.file.ver?" (v"+results.file.ver+")":"";
		
		//console.log(results.file.fType);
		html_currfile = tpl_currfile
			.replace( /\{fUrl\}/g,results.file.fUrl )
			.replace( /\{fName\}/g,results.file.fName +ver )
			.replace( /\{fSize\}/g,results.file.fSize )
			.replace( /\{fID\}/g,results.file.fID )
			.replace( /\{creatorName\}/g,results.file.creatorName )			
			.replace( /\{createTime\}/g,results.file.createTime );
		html = html
			.replace( /\{filecurrList\}/g,html_currfile );
		
		
	}
	
	$("#page_innerContent").html(html);
	getProjInfo_new( pID,dID );
	if(!results.file){
		
		var nodata = commonFun.dataEmpty("nodata","暂无文件","还没有上传文件");		
		$("#page_innerContent #J_currFile").html( nodata );
		$("#page_innerContent #J_Files").html("");
	}else{
		//显示历史文档
		setDocHistory_sub( dID );
	}
	
	
}


//返回文件图标
function getFileType( type ){
	var html="";
	switch(true){
		case /cad/.test(type)==true:
		  html = "cad";
		  break;
		case /doc/.test(type)==true:
		  html = "doc";
		  break;
		case /jpg|jpeg|png|gif/.test(type)==true:
		  html = "jpg";
		  break;
		case /pdf/.test(type)==true:
		  html = "pdf";
		  break;
		case /xls/.test(type)==true:
		  html = "xls";
		  break;
		default :
			html = "txt";
			break;
	}
		
	return html;
}

//生成文档历史页面
function setDocHistory_sub( dID ){
	
	//获取数据
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"dID":dID
	};
	var results = commonFun.getJsonResult( "file.history.get",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取document.get报错："+results);
		return false;
	}
	
	var tpl_file = $("#tpl_file").html();
	var html = [];
	
	$("#J_projName").html( projName );
	$("#J_fileName").html( fileName );
	
	if(results.length<2){
		$("#page_innerContent #J_Files").html("");
	}else{
		for( var i=1; i<results.length; i++ ){
			//var type_icon = getFileType(results[i].fType);
			var ver = results[i].ver?" (v"+results[i].ver+")":"";
			var _html = tpl_file
				.replace( /\{fUrl\}/g,results[i].fUrl )
				.replace( /\{fName\}/g,results[i].fName+ver )
				.replace( /\{fSize\}/g,results[i].fSize )
				.replace( /\{fID\}/g,results[i].fID )
				.replace( /\{creatorName\}/g,results[i].createName )			
				.replace( /\{createTime\}/g,results[i].createTime );
			
			html.push(_html);
		}
		
		$("#page_innerContent #J_Files").html(html);
	}
	
}

//生成文档历史页面
function setDocHistory( dID ){
	
	//获取数据
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"dID":dID
	};
	var results = commonFun.getJsonResult( "file.history.get",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取document.get报错："+results);
		return false;
	}
	console.log(results);
	var tpl_file = $("#tpl_file").html();
	var html = [];
	
	$("#J_projName").html( projName );
	$("#J_fileName").html( fileName );
	
	for( var i=1; i<=results.length; i++ ){
		var type_icon = getFileType(results[i].fType);
		
		var _html = tpl_file
			.replace( /\{fUrl\}/g,results[i].fUrl )
			.replace( /\{fName\}/g,results[i].fName )
			.replace( /\{fSize\}/g,results[i].fSize )
			.replace( /\{fID\}/g,results[i].fID )
			.replace( /\{creatorName\}/g,results[i].createName )
			.replace( /\{fType\}/g,'<img src="../images/icon/icon_'+type_icon+'.jpg" style="width:40px;">' )
			.replace( /\{createTime\}/g,results[i].createTime );
		
		html.push(_html);
	}
	
	$("#J_docHistory").html( html.join("") );
	
	if(results.length<2){
		var nodata = commonFun.dataEmpty("nodata","暂无历史版本","还没有历史版本");
		$("#page_innerContent #J_docHistory").html( nodata );
	}
	
}

//生成项目成员列表
function setPorjMember( pID,pPublic ){
	//$("#J_projName").html(projName);
	//获取数据
	var results = getMemberList( pID );
	
	//判断是否显示管理sessionStorage.getItem("NATIVE_UID")==creator
	if( pPublic=="1" ){
		$(".contact_op").css("display","block");
		$(".viewer_op").css("display","block");
	}
	
	if(results.submitter){
		var data_contact = results.submitter;
		setConatct(data_contact,".contact_list","contact");
	}
	if(results.viewer){
		var data_viewer = results.viewer;
		setConatct(data_viewer,".viewer_list","viewer");
	}
}

//获取成员列表
function getMemberList( pID ){
	//获取数据
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"pID":pID
	};
	var results = commonFun.getJsonResult( "project.contact.get",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取project.contact.get报错："+results);
		return false;
	}
	
	return results;	
}

//生成联系人列表
function setConatct( data,ele,inpName ){
	
	var tpl_member = $("#tpl_member").html();
	var html_data = [];
	if(data){		
		for( var i=0;i<data.length;i++ ){
			var src = data[i].imgurl?data[i].imgurl:"../images/icon_male.png";
			var iteam = tpl_member
				.replace( /\{name\}/g,data[i].name )
				.replace( /\{department\}/g,data[i].departmentname )
				.replace( /\{inpName\}/g,inpName )
				.replace( /\{uid\}/g,data[i].uid )
				.replace( /\{phone\}/g,data[i].phone )
				.replace( /\{userFace\}/g,'<img src="'+src+'" class="pic img_rounded">' );
			html_data.push(iteam);
		}
	}
	
	$(ele).html( html_data.join("") );
}

//编辑成员 添加与删除
function updateMember( pID,ele,arr_uid,obj,inpName ){
	
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"pID":pID
	};
	arr[ele] = JSON.stringify(arr_uid);
	var results = commonFun.getJsonResult( "project.update",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取project.update报错："+results);
		return false;
	}
	
	var getAllMember = getMemberList( pID );
	//alert(JSON.stringify(getAllMember));
	setConatct( getAllMember[ele],obj,inpName );
	
	return results.success==1?true:false;		
}

//添加联系人用户
function addContactMember(){
	NativeInteractive.selectContacts({"maxCount":99,"tag":"uid","callback":"OnaddContactMember"});
	//OnaddContactMember();
}

function OnaddContactMember(datas){
	var status = datas.result.status,
		params = datas.result.params;
	//alert(JSON.stringify(params));
	//var pID = projMember.parame;	
	var pID = projHome.parame;
	
	if(status==0){
		var getContact = commonFun.getInputNotChecked("contact");
		var num = params.contactCount;
		var contact = [];
		for( var i=0; i<num; i++ ){
			var iteam = params.contacts[i].contactInfo.uid;
			contact.push(iteam);
		}
		var unique = $.unique(getContact.concat(contact));
		
		//修改联系人
		
		var isaddContact = updateMember( pID,"submitter",unique,".contact_list","contact" );
		if(isaddContact){
			$.toast("联系人已添加");
		}else{
			$.toast("操作失败，请退出重试","cancel");
		}
	}

}

//添加联系人用户
function addViewerMember(){
	NativeInteractive.selectContacts({"maxCount":99,"tag":"uid","callback":"OnaddViewerMember"});
	//OnaddViewerMember();
}

function OnaddViewerMember(datas){
	var status = datas.result.status,
		params = datas.result.params;
	
	//var pID = projMember.parame;
	var pID = projHome.parame;
	if(status==0){
		var getViewer = commonFun.getInputNotChecked("viewer");
		var num = params.contactCount;
		var viewer = [];
		for( var i=0; i<num; i++ ){
			var iteam = params.contacts[i].contactInfo.uid;
			viewer.push(iteam);
		}
		var unique = $.unique(getViewer.concat(viewer));
		//修改联系人
		var isaddContact = updateMember( pID,"viewer",unique,".viewer_list","viewer" );
		if(isaddContact){
			$.toast("联系人已添加");
		}else{
			$.toast("操作失败，请退出重试","cancel");
		}
	}

}


//获取项目日志,获取文档日志，dID文档id 如果获取项目传空即可
function getProjInfo_new( pID,dID ){
	
	//获取
	var arr = {
			"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
			"uid":sessionStorage.getItem("NATIVE_UID"),
			"pID":pID,
			"limit":logLimit,
			"offset":logOffset
		};
	if(dID){
		arr["dID"] = dID;
	}
	
	var results = commonFun.getJsonResult( "log.list",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取log.list报错："+results);
		return false;
	}
	
	var tpl_infoBox = $("#tpl_infoBox").html(),
		tpl_info = $("#tpl_info").html();
	var html = [];
	
//	if( $("#J_projName")[0] ){
//		$("#J_projName").html( results.pName );
//	}
//	if( $("#J_fileName")[0] ){
//		$("#J_fileName").html( results.dName );
//	}
	
	var logs = results.list;
	
	if(logIsFirst){
		if(logs.length==0){
			var nodata = commonFun.dataEmpty("nodata","暂无日志","还没有相关日志");
			$("#page_innerContent #J_projInfoList").html( nodata );
			$("#page_innerContent #J_logMore").css("display","none");
			return false;
		}
		logIsFist = false;
	}
	
	if( logs.length>0 ){
		for( var i=0; i<logs.length; i++ ){
			
			var fileName = "",
				texts = "",
				content = "",
				files = "",
				ver = logs[i].ver?" (v"+logs[i].ver+")":"";
			
			if(logs[i].fUrl){
				fileName = logs[i].fName,
				texts = logs[i].text;			
				content = texts.replace(fileName,"");
				
				files = '<a href="javascript:void(0)" class="JC_download" data-furl="'+logs[i].fUrl+'" data-fname="'+logs[i].fName+'" data-size="'+logs[i].fSize+'" data-fID="'+logs[i].fID+'"><i class="fa_icon_clip app_cell_icon"></i> '+fileName+ver+' &darr;</a>';
			}else{
				content = logs[i].text;
			}			
			
			var iteam = tpl_info
				.replace( /\{createTime\}/g,logs[i].time )
				.replace( /\{content\}/g,content )
				.replace( /\{files\}/g,logs[i].fUrl?files:"" );
			html.push(iteam);
		}
		$("#page_innerContent #J_projInfoList").css("display","block");
		$("#page_innerContent #J_projInfoList ul").append( html.join("") );
		if(logs.length<logLimit){
			$("#page_innerContent #J_logMore").css("display","none");
		}else{
			logOffset = logOffset + logLimit;  
		}
	}else{
		$("#page_innerContent #J_logMore").css("display","none");
	}
	
}


//获取项目日志,获取文档日志，dID文档id 如果获取项目传空即可
function getProjInfo( pID,dID ){
	
	//获取
	var arr = {
			"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
			"uid":sessionStorage.getItem("NATIVE_UID"),
			"pID":pID,
			"limit":logLimit,
			"offset":logOffset
		};
	if(dID){
		arr["dID"] = dID;
	}
	
	var results = commonFun.getJsonResult( "log.list",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取log.list报错："+results);
		return false;
	}
	
	var tpl_info = $("#tpl_info").html();
	var html = [];
	
	if( $("#J_projName")[0] ){
		$("#J_projName").html( results.pName );
	}
	if( $("#J_fileName")[0] ){
		$("#J_fileName").html( results.dName );
	}
	
	var logs = results.list;
	
	if(logIsFirst){
		if(logs.length==0){
			var nodata = commonFun.dataEmpty("nodata","暂无日志","还没有相关日志");
			$("#J_projInfoList").html( nodata );
			$("#J_logMore").css("display","none");
			return false;
		}
		logIsFist = false;
	}
	
	if( logs.length>0 ){
		for( var i=0; i<logs.length; i++ ){
			
			var fileName = "",
				texts = "",
				content = "",
				files = "",
				ver = logs[i].ver?" (v"+logs[i].ver+")":"";;
			
			if(logs[i].fUrl){
				fileName = logs[i].fName,
				texts = logs[i].text;			
				content = texts.replace(fileName,"");
				
				files = '<a href="javascript:void(0)" class="JC_download" data-furl="'+logs[i].fUrl+'" data-fname="'+logs[i].fName+'" data-size="'+logs[i].fSize+'" data-fID="'+logs[i].fID+'"><i class="fa_icon_clip app_cell_icon"></i> '+fileName+ver+' &darr;</a>';
			}else{
				content = logs[i].text;
			}			
			
			var iteam = tpl_info
				.replace( /\{createTime\}/g,logs[i].time )
				.replace( /\{content\}/g,content )
				.replace( /\{files\}/g,logs[i].fUrl?files:"" );
			html.push(iteam);
		}
		$("#J_projInfoList ul").append( html.join("") );
		if(logs.length<logLimit){
			$("#J_logMore").css("display","none");
		}else{
			logOffset = logOffset + logLimit;  
		}
	}else{
		$("#J_logMore").css("display","none");
	}
	
}
//添加日志
function addLog(content,pID,dID,fID){
	
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"creator":sessionStorage.getItem("NATIVE_UID"),
		"pID":pID,
		"content":content
	};
	if(dID){
		arr["dID"] = dID;
		arr["fID"] = fID;
	}
	var results = commonFun.getJsonResult( "log.add",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取log.add报错："+results);
		return false;
	}
	
}
//下载

//下载文档处理
function download( obj,pID,dID ){
	
	var ele = $(obj),
		fSize = ele.attr("data-size"),
	    fName = ele.attr("data-fName"),
	    fUrl = ele.attr("data-fUrl"),
	    fID = ele.attr("data-fID");
	var useragent = sessionStorage.getItem("USER_AGENT");
	if(useragent=="AN"){ 
		var parameter = {		
			"extras":fSize+","+fName+","+fUrl+","+fID+","+pID+","+dID
		};
		NativeInteractive.requestFingerprintCheck(parameter);
	}else{
		downLoadFile(fSize,fName,fUrl,fID,pID,dID);
	}
//	$.showPics(" ","fingerprint");
//	$(".weui_loading").parent().addClass("lg_loading");
//	
//	var ele = $(obj);
//	var timestamp=new Date().getTime();
//	var size = commonFun.getB( ele.attr("data-size") );
//	var parameter = {"fileName":ele.attr("data-fName"),
//		"fileID":timestamp,
//		"taskID":timestamp+1,
//		"size":size,
//		"path": sessionStorage.getItem("SERVER_IP")+"/"+ele.attr("data-fUrl"),
//		"isAutoDownload":0,
//		"isAutoPreView":0		
//	};
//	
//	$(".weui_loading").on("click",function(){
//			//console.log(parameter);
//		$.hideLoading();
//		addLog("下载文件 "+ele.attr("data-fName"),pID,dID,ele.attr("data-fID"));
//		//alert( sessionStorage.getItem("SERVER_IP")+"/"+ele.attr("data-fUrl") );
//		
//		NativeInteractive.download(parameter);
//	});
	

}

function downLoadFile(fSize,fName,fUrl,fID,pID,dID){
	//alert(obj+pID+dID);
	//var ele = obj;
	var timestamp=new Date().getTime();
	var size = commonFun.getB( fSize );
	var parameter = {"fileName":fName,
		"fileID":timestamp,
		"taskID":timestamp+1,
		"size":size,
		"path": sessionStorage.getItem("SERVER_IP")+"/"+fUrl,
		"isAutoDownload":0,
		"isAutoPreView":0		
	};
	
	addLog("下载文件 "+fName,pID,dID,fID);		
	NativeInteractive.download(parameter);
	
}

function OnRequestFingerprintCheckCb(datas){
	var status = datas.result.status,
		params = datas.result.params;
	
	var extras = datas.request.params.extras;
	var arr_extras = extras.split(",");
	//alert("OnRequestFingerprintCheckCb:"+JSON.stringify(datas)+arr_extras[0]+"&"+arr_extras[1]+"&"+arr_extras[2]);
	//alert(params.resultCode);
	if(/^1/.test(params.resultCode)){
		
		switch (params.resultCode){
			
			case 1001:
				$.toast("指纹验证失败","text");
				break;
			case 1002:
				//$.toast("您取消了指纹验证","text");
				break;
			default:
				//$.toast(params.resultCode,"text");
				downLoadFile(arr_extras[0],arr_extras[1],arr_extras[2],arr_extras[4],arr_extras[5],arr_extras[6]);
				break;
		}
		
	}
	
}

function OnDownloadCb(datas){
	var status = datas.result.status,
		params = datas.result.params;
	
	//这里做一个演示，把数据转成字符串在页面弹出
	var str_para = JSON.stringify(params);
	
	//alert("download回调函数OnDownloadCb:"+str_para);
}

function setSearchList( content ){
	
	var type = "search",
		limit = J_searchLimit,
		offset = J_searchOffset;
	
	//获取项目列表 页面输出
	var arr = {
		"auth_token":sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid":sessionStorage.getItem("NATIVE_UID"),
		"type":type,
		"limit":limit,
		"offset":offset,
		"search":{"pName":content}
	};
	var results = commonFun.getJsonResult( "project.list.get",arr );
	if( /error/.test(results) ){
		$.toast("有异常，请返回重试", "cancel");
		console.log("获取project.list.get报错："+results);
		return false;
	}
	
	//页面暂无
	if(results.length<1){
		var nodata = commonFun.dataEmpty("nodata","没有找到相关项目","还没有相关项目");
		$("#J_searchBox").html( nodata );
		return false;
	}
		
	//判断取值是否是最后一页，
	if(results.length<limit){
		$(".J_searchBoxEnd").css("display","none");
		$(".J_searchBoxEnd").html('');
		J_searchFlag = false;
		
	}else{
		$(".J_searchBoxEnd").css("display","block");
		$(".J_searchBoxEnd").html('<div class="infinite-preloader"></div>正在加载...');
				
	}
		
	//渲染页面
	var tpl_proj = $("#tpl_proj").html();
	var html = [];
	
	for( var i=0; i<results.length; i++ ){
		
		var iscreator = results[i].creator==sessionStorage.getItem("NATIVE_UID")?true:false; 
		
		var _html = tpl_proj
		.replace( /\{pID\}/g,results[i].pID )
		.replace( /\{pName\}/g,results[i].pName )
		.replace( /\{creatorName\}/g,results[i].creatorName )
		.replace( /\{createTime\}/g,results[i].approveTime )
		.replace( /\{proj_status\}/g,iscreator?getProjStatus(results[i].pStatus,results[i].pID):"" );
		html.push(_html);
	}
	
	$("#J_searchBox").append( html.join("") );
	J_searchOffset = J_searchOffset + limit;
		
}


















