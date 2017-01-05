var J_pmsListLimit = 14,
	J_pmsListOffset = 0,
	J_pmsExtraLimit = 1000,
	J_pmsExtraOffset = 0,
	J_pmsHisLimit = 1000,
	J_pmsHisOffset = 0,
	J_pmInfoFlag = false,
	J_pmTab2Flag = false,
	J_pmTab3Flag = false,
	J_pmsListFlag = true;

//例子，获取数据函数
function getPmsList(limit, offset, search) {

	var arr = {
		"auth_token": sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid": sessionStorage.getItem("NATIVE_UID"),
		"limit": limit,
		"offset": offset,
		"search": search
	};

	var results = commonFun.getJsonResult("company.list.get", arr);
 
	if(/error/.test(results)) {
		$.toast("获取企业列表有异常，请重试", "cancel");
		console.log("获取   方法名   报错：" + results);
		return false;
	} 
			//无数据
	else   if(J_pmsListOffset==0&&search==""&&results.length < 1) {
		 
						var nodata = commonFun.dataEmpty("nodata", "没有相关数据", "没有相关数据信息");
						$("#J_innerContent").html(nodata);
						return false;
					}
					else {

		//如果是最后一页,不允许下拉刷新
 
		if(results.length < limit) {
			$(".resultEnd").css("display", "none");
			 
			J_pmsListFlag = false;
		} else {
			J_pmsListFlag = true;
		}
 
		return results
	}

}

//例子，根据数据做数据渲染
function renderPmsList(results) {
	var tpl = $("#tpl_pmsList").html();
	var html = [];

	for(var i = 0; i < results.length; i++) {

		var _html = tpl
			 
			.replace(/\{cName\}/g, commonFun.changetNull(results[i].cName))
			.replace(/\{ofIndustry\}/g, commonFun.changetNull(results[i].ofIndustryStr))
			.replace(/\{id\}/g, results[i].id)
			//.replace( /\{username\}/g,results[i].creator );
		html.push(_html);

	}
	J_pmsListOffset = J_pmsListOffset + results.length;
	console.log("J_pmsListOffset", J_pmsListOffset);
	return html;
}

function setPmsList(id, search) {

	var limit = eval(id + "Limit"),
		offset = eval(id + "Offset");
	var results = getPmsList(limit, offset, search);
	var html = renderPmsList(results);
	$(".page_innerContent #" + id).append(html);
	//隐藏加载进度条

}

//企业信息
function getPmInfo(id, eid) {

	var arr = {
		"auth_token": sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid": sessionStorage.getItem("NATIVE_UID"),
		"id": id,
		"limit": 1,
		"offset": 0,
		"eid": eid

	};

	var results = commonFun.getJsonResult("company.get", arr);
 
	if(results==false) {
 
		J_pmInfoFlag = true;

		return false;
	} 
			//无数据
	else   if(results.length < 1) {
		 
						var nodata = commonFun.dataEmpty("nodata", "没有相关数据", "没有相关数据信息");
						$("#J_innerContent").html(nodata);
						return false;
					}
	else {
		return results
	}

}

//企业信息，根据数据做数据渲染
function renderPmInfo(results) {

	var tpl_pmInfo = $("#tpl_pmInfo").html();
	var html = [];
	var strStart = "";

	 
	var _html_pmInfo = tpl_pmInfo
		.replace(/\{cName\}/g,  commonFun.changetNull(results[0].cName))

		
		
		.replace(/\{foundingTime\}/g,  results[0].foundingTime)
		//.replace( /\{count\}/g,results.count )

	html.push(_html_pmInfo);

	return html;
}

//企业信息，根据数据做数据渲染
function renderPmTab1(results) {
	var tpl_tab1 = $("#tpl_tab1").html();
	var html = [];

	var _html_tab1 = tpl_tab1
		.replace(/\{regMark\}/g,  commonFun.changetNull(results[0].regMark))
			.replace(/\{legalRep\}/g,  commonFun.changetNull(results[0].legalRep))
		.replace(/\{space\}/g,  commonFun.changetNull(results[0].space))
		.replace(/\{production\}/g,  commonFun.changetNull(results[0].production))
		.replace(/\{employees\}/g,  commonFun.changetNull(results[0].employees))
		.replace(/\{typeStr\}/g,  commonFun.changetNull(results[0].typeStr))
		.replace(/\{position\}/g,  commonFun.changetNull(results[0].position))
        .replace(/\{industryClassStr\}/g,  commonFun.changetNull(results[0].industryClassStr))
        .replace(/\{ofIndustryStr\}/g,  commonFun.changetNull(results[0].ofIndustryStr))
        .replace(/\{statusStr\}/g,  commonFun.changetNull(results[0].statusStr))
        .replace(/\{scaleStr\}/g,  commonFun.changetNull(results[0].scaleStr))
        .replace(/\{domainStr\}/g,  commonFun.changetNull(results[0].domainStr))
        .replace(/\{localRegionStr\}/g,  commonFun.changetNull(results[0].localRegionStr))
        .replace(/\{publicContacts\}/g,  commonFun.changetNull(results[0].publicContacts))
        .replace(/\{publicPhone\}/g,  commonFun.changetNull(results[0].publicPhone))
        .replace(/\{shortName\}/g,  commonFun.changetNull(results[0].shortName))
        .replace(/\{publicEmail\}/g,  commonFun.changetNull(results[0].publicEmail))
        .replace(/\{publicUrl\}/g,  commonFun.changetNull(results[0].publicUrl))
             .replace(/\{regTypeStr\}/g,  commonFun.changetNull(results[0].regTypeStr))

			   .replace(/\{assets\}/g,  commonFun.changetNull(results[0].assets))
  .replace(/\{debts\}/g,  commonFun.changetNull(results[0].debts))
   .replace(/\{investments\}/g,  commonFun.changetNull(results[0].investments))
    .replace(/\{taxes\}/g,  commonFun.changetNull(results[0].taxes))
			.replace(/\{ccName\}/g,  commonFun.changetNull(results[0].cName))			 
		   
			 
			  
		//.replace( /\{username\}/g,results[i].creator );
	html.push(_html_tab1);

	return html;
}
//政府用户获取企业信息
function setPmInfo(id, eid) {
	J_pmInfoFlag = false;

	var results = getPmInfo(id, eid);
	var html_pmInfo = renderPmInfo(results);
	$("#pmInfo").append(html_pmInfo);
	var html_tab1 = renderPmTab1(results);
	$("#tab1").append(html_tab1);
	J_pmInfoFlag = true;

	//隐藏加载进度条
	if(J_pmInfoFlag == true && J_pmTab2Flag == true && J_pmTab3Flag == true) $(".resultEnd").css("display", "none");

}
//企业信息
function getPmTab2(id) {

	var arr = {
		"auth_token": sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid": sessionStorage.getItem("NATIVE_UID"),
		"limit": J_pmsExtraLimit,
		"offset": J_pmsExtraOffset,
		"id": id
	 
	};

	var results = commonFun.getJsonResult("company.extra.get", arr);

	if(/error/.test(results)) {
		$.toast("获取企业详细信息有异常，请重试", "cancel");
		console.log("获取   方法名   报错：" + results);
		J_pmTab2Flag = true;

		return false;
	} else {
		return results
	}

}
//企业信息，根据数据做数据渲染
function renderPmTab2(results) {

	var tpl_pmTab2 = $("#tpl_pmTab2").html();
	var _html_pmTab2 = [];

	for(var i = 0; i < results.length; i++) {

		var _html = tpl_pmTab2
			.replace(/\{type\}/g, results[i].type)
			.replace(/\{ofyear\}/g, results[i].ofyear)
			.replace(/\{value\}/g, results[i].value)

		_html_pmTab2.push(_html);
	}

	return _html_pmTab2;
}

function setPmTab2(id) {
	J_pmTab2Flag = false;

	var results = getPmTab2(id);

	var html_pmTab2 = renderPmTab2(results);
	 
	$("#pmTab2").append(html_pmTab2);
	J_pmTab2Flag = true;

	//隐藏加载进度条
	if(J_pmInfoFlag == true && J_pmTab2Flag == true && J_pmTab3Flag == true);

}
//企业信息
function getPmTab3(id) {

	var arr = {
		"auth_token": sessionStorage.getItem("NATIVE_AUTH_TOKEN"),
		"uid": sessionStorage.getItem("NATIVE_UID"),
		"limit": J_pmsHisLimit,
		"offset": J_pmsHisOffset,
		"id": id
 
	};

	var results = commonFun.getJsonResult("company.his.get", arr);

	if(/error/.test(results)) {
		$.toast("获取企业历史信息有异常，请重试", "cancel");
		console.log("获取   方法名   报错：" + results);
		J_pmTab3Flag = true;

		return false;
	} else {
		return results
	}

}
//企业信息，根据数据做数据渲染
function renderPmTab3(results) {
	var tpl_pmTab3 = $("#tpl_pmTab3").html();
	var _html_pmTab3 = [];

	for(var i = 0; i < results.length; i++) {
	 
		var _html = tpl_pmTab3
			.replace(/\{foundingTime\}/g, results[i].foundingTime)
			//.replace( /\{updateOperator\}/g,results[i].updateOperator )
			.replace(/\{cName\}/g, results[i].cName)
				.replace(/\{regMark\}/g,  commonFun.changetNull(results[0].regMark))
		.replace(/\{legalRep\}/g,  commonFun.changetNull(results[0].legalRep))
		.replace(/\{space\}/g,  commonFun.changetNull(results[0].space))
		.replace(/\{production\}/g,  commonFun.changetNull(results[0].production))
		.replace(/\{employees\}/g,  commonFun.changetNull(results[0].employees))
		.replace(/\{typeStr\}/g,  commonFun.changetNull(results[0].typeStr))
		.replace(/\{position\}/g,  commonFun.changetNull(results[0].position))
        .replace(/\{industryClassStr\}/g,  commonFun.changetNull(results[0].industryClassStr))
        .replace(/\{ofIndustryStr\}/g,  commonFun.changetNull(results[0].ofIndustryStr))
        .replace(/\{statusStr\}/g,  commonFun.changetNull(results[0].statusStr))
        .replace(/\{scaleStr\}/g,  commonFun.changetNull(results[0].scaleStr))
        .replace(/\{domainStr\}/g,  commonFun.changetNull(results[0].domainStr))
        .replace(/\{localRegionStr\}/g,  commonFun.changetNull(results[0].localRegionStr))
        .replace(/\{publicContacts\}/g,  commonFun.changetNull(results[0].publicContacts))
        .replace(/\{publicPhone\}/g,  commonFun.changetNull(results[0].publicPhone))
        .replace(/\{shortName\}/g,  commonFun.changetNull(results[0].shortName))
        .replace(/\{publicEmail\}/g,  commonFun.changetNull(results[0].publicEmail))
        .replace(/\{publicUrl\}/g,  commonFun.changetNull(results[0].publicUrl))
             .replace(/\{regTypeStr\}/g,  commonFun.changetNull(results[0].regTypeStr))
 .replace(/\{assets\}/g,  commonFun.changetNull(results[0].assets))
  .replace(/\{debts\}/g,  commonFun.changetNull(results[0].debts))
   .replace(/\{investments\}/g,  commonFun.changetNull(results[0].investments))
    .replace(/\{taxes\}/g,  commonFun.changetNull(results[0].taxes))
  
					
		_html_pmTab3.push(_html);
	}

	return _html_pmTab3;
}

function setPmTab3(id) {
	J_pmTab3Flag = false;

	var results = getPmTab3(id);
	var html_pmTab3 = renderPmTab3(results);
 
	$("#tab3").append(html_pmTab3);
	J_pmTab3Flag = true;

	//隐藏加载进度条
	if(J_pmInfoFlag == true && J_pmTab2Flag == true && J_pmTab3Flag == true);

}

//例子，获取数据函数
function getPermission() {
 
var str="uid="+sessionStorage.getItem("NATIVE_UID");
	var results = commonFun.getJsonResultBykeyvalue("user.identity", str);

	if(/error/.test(results)) {
		$.toast("获取权限有异常，请重试", "cancel");
		console.log("获取   方法名   报错：" + results);
		 return false;
	}else if(results.type==null)
	{
		var nodata = commonFun.dataEmptyError("nodata", "获取权限失败", "请点击按钮重新获取");
				$("#J_innerContent").html(nodata);
	}else {
		return results.type;
	}

	 
}