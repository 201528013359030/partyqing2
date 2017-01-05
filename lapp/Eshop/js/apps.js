
$(document).ready(function(){
	var page=1;
  if(window.location.href.indexOf("givenList.html")!=-1)page=2;
  else if(window.location.href.indexOf("needList.html")!=-1)page=3;
  console.log("page"+page);
	switch(page)
	{
	//首页
	case 1:
		//获取店铺基本信息
		var arr = {
				"auth_token": commonFun.get_param("auth_token"),
				"uid": commonFun.get_param("uid"),
				"limit": 1,
				"offset": 1,
				"id": commonFun.get_param("id"),
				"detail": "1" 
			 
			};
	 
			var results = commonFun.getJsonResult("esinfo.list.get", arr,"comloading");
		 console.log(results);
			if(/error/.test(results)) {
				$.toast("获取店铺信息异常，请重试", "cancel");
				console.log("获取   方法名   报错：" + results);
				
		 
				return false;
			} 
					//无数据
			else   if(results!=null&&results!='null'&&results.length < 1) {
				                 
				                	 
								var nodata = commonFun.dataEmpty("nodata", "没有相关数据", "没有相关数据信息");
								$("#comloading").html(nodata);
							
						 
				                 
				             
								return false;
							}
							else { 
								 var url = location.search; //获取url中"?"符后的字串
								 $(document).attr("title",results[0].cName+"-企业微门户");
								$("productsuphref").attr("href","/");
									$("#cName").text(commonFun.changetNull(results[0].cName));
									if(results[0].Imagetrueurl!="images/eshop/banner.png")
										{
									$("#Imageurl").attr("src","../../../../"+commonFun.changetNull(results[0].Imagetrueurl));
										}
									else
										{
										$("#Imageurl").attr("src","../images/banner.png");
										}
								    $("#Intro").text(commonFun.changetNull(results[0].Intro));
								    $("#publicContacts").text(commonFun.changetNull(results[0].publicContacts));
								    $("#phone").text(commonFun.changetNull(results[0].phone));
								    $("#publicPhone").text(commonFun.changetNull(results[0].publicPhone));
								    $("#publicEmail").text(commonFun.changetNull(results[0].publicEmail));
								    $("#position").text(commonFun.changetNull(results[0].position));
								    $("#publicUrl").text(commonFun.changetNull(results[0].publicUrl));
								   
	                                if(results[0].photos)
	                                	{
	                                	
	                                	 var photourls=JSON.parse(results[0].photos);
	     								var tpl = $("#tpl_photo").html();
	     							 
	     								var html = [];
									for(var i = 0; i < photourls.length; i++) {

										var _html = tpl
											 
											//.replace(/\{surl\}/g, commonFun.changetNull(results[0].offline_ip)+commonFun.changetNull(photourls[i].path))
											//.replace(/\{lurl\}/g, commonFun.changetNull(results[0].offline_ip)+commonFun.changetNull(photourls[i].path))
										 .replace(/\{surl\}/g, "../../../../"+commonFun.changetNull(photourls[i].path))
										 .replace(/\{lurl\}/g, "../../../../"+commonFun.changetNull(photourls[i].path))
								 
										html.push(_html);
								 
									}
								 
									$("#photos").append(html);
									
									
										
										
							 
							}
	                                

									//获取供应信息
									var arr2 = {
											"auth_token": commonFun.get_param("auth_token"),
											"uid": commonFun.get_param("uid"),
											"limit": 5,
											"offset": 0,
											"eid": commonFun.get_param("id"),
											 
										 
										};

										var results2 = commonFun.getJsonResult("productsup.list.get", arr2,null);
								 
										if(/error/.test(results2)) {
										 
											//return false;
										} 
												//无数据
										else   if(results2==''||results2==null||results2=='null'||results2.length < 1) {
											 
															 
															//return false;
														}
														else { 
															var html2= [];
															var tpl2 = $("#tpl_productsuplist").html();
															for(var i = 0; i < results2.length; i++) {
																
																var small_url="../images/default_qi.jpg";
															
														          if(results2[i].image)
								                                	{
														        	  var imagearr=JSON.parse(results2[i].image);
														        	  small_url=imagearr['small_url'];
								                                	
								                                	 
								                                	}
																
																var _html2 = tpl2
																.replace(/\{Id\}/g, commonFun.changetNull(results2[i].Id))
																 
																	.replace(/\{small_url\}/g, commonFun.changetNull(small_url))
																	.replace(/\{title\}/g, commonFun.changetNull(results2[i].title))
																 
															 
																html2.push(_html2);
																
															}
														
															$("#goodsList").append(html2);
								         
															    
														 
														  
								}
										  var url=window.location.href;
										 
										  var n1 = url.length;//地址的总长度
										  var n2 = url.indexOf("#");//取得#号的位置
										
										  if(n2!=-1)
										  {var remove = url.substr(n2, n1-n2);//从#号后面的内容
									 
										  url=url.replace(remove,"");
									 
										  }
										 
										//获取需求信息
											var arr3 = {
													"auth_token": commonFun.get_param("auth_token"),
													"uid": commonFun.get_param("uid"),
													"limit": 5,
													"offset": 0,
													"eid": commonFun.get_param("id"),
													 
												 
												};

												var results3 = commonFun.getJsonResult("productreq.list.get", arr3,null);
											 
												if(/error/.test(results3)) {
													 
													//return false;
												} 
														//无数据
												else   if(results3==''||results3==null||results3=='null'||results3.length < 1) {
												
													 
																	//return false;
																}
																else { 
																 
																	var html3= [];
																	var tpl3 = $("#tpl_productreqlist").html();
																	for(var i = 0; i < results3.length; i++) {
																		
																		var small_url="../images/default_qi.jpg";
																 
																          if(results3[i].image)
										                                	{
																        	  var imagearr=JSON.parse(results3[i].image);
																        	  small_url=imagearr['path'];
										                                	
										                                	 
										                                	}
																		
																		var _html3 = tpl3
																		.replace(/\{Id\}/g, commonFun.changetNull(results3[i].Id))
																		 
																			.replace(/\{small_url\}/g, commonFun.changetNull(small_url))
																			.replace(/\{title\}/g, commonFun.changetNull(results3[i].title))
																		 
																	 
																		html3.push(_html3);
																		
																	}
																
																	$("#goodsreqList").append(html3);
										         
																	    
																 
																  
										}
												  var url=window.location.href;
												 
												  var n1 = url.length;//地址的总长度
												  var n2 = url.indexOf("#");//取得#号的位置
												
												  if(n2!=-1)
												  {var remove = url.substr(n2, n1-n2);//从#号后面的内容
											 
												  url=url.replace(remove,"");
											 
												  }
												 
												  
										$("#givenMsghref").attr("href",url.replace("company.html","givenList.html"));
										$("#needMsghref").attr("href",url.replace("company.html","needList.html"));
								    var map = new BMap.Map("mapcontainer");
								    map.centerAndZoom("沈阳", 12);
								    map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
								    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

								    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
								    map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
								    map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开

								    var localSearch = new BMap.LocalSearch(map);
								    localSearch.enableAutoViewport(); //允许自动调节窗体大小
								    //map.clearOverlays();//清空原来的标注
									var keyword =commonFun.changetNull(results[0].cName);
								    localSearch.setSearchCompleteCallback(function (searchResult) {
								        var poi = searchResult.getPoi(0);
								        if(poi == "undefined") return;
								        //document.getElementById("result_").value = poi.point.lng + "," + poi.point.lat;
								        map.centerAndZoom(poi.point, 13);
								        var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));  // 创建标注，为要查询的地方对应的经纬度
								        map.addOverlay(marker);
								        //var content = document.getElementById("text_").value + "<br/><br/>经度：" + poi.point.lng + "<br/>纬度：" + poi.point.lat;
								        var infoWindow = new BMap.InfoWindow("<p style='font-size:14px;'>" + keyword + "</p>");
								        marker.addEventListener("click", function () { this.openInfoWindow(infoWindow); });
								        marker.openInfoWindow(infoWindow);
								        // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
								    });
								    localSearch.search(keyword);
								    var economyInfo = '<?php echo $economyInfo ?>';
								$("#main").css("display","block");
								$("#comloading").css("display", "none");
							  
	}
			
	  break;

	   
	     
	    
	case 2:
		  //供应列表页
		  //设置导航
		  var url=window.location.href;
		  var n1 = url.length;//地址的总长度
		  var n2 = url.indexOf("#");//取得#号的位置
		  if(n2!=-1)
		  {var remove = url.substr(n2, n1-n2);//从#号后面的内容
		  url=url.replace(remove,"");
		  }
			$("#companyhref").attr("href",url.replace("givenList.html","company.html"));
			$("#companyhref2").attr("href",url.replace("givenList.html","company.html"));
			$("#providerhref").attr("href",url.replace("givenList.html","company.html"));
			
			$("#aboutUshref").attr("href",url.replace("givenList.html","company.html")+"#aboutUs");
			$("#givenMsghref").attr("href",url.replace("givenList.html","company.html")+"#givenMsg");
			$("#needMsghref2").attr("href",window.location.href);
			$("#needMsghref").attr("href",url.replace("givenList.html","company.html")+"#needMsg");
			$("#comanyPichref").attr("href",url.replace("givenList.html","company.html")+"#comanyPic");
			$("#contactUshref").attr("href",url.replace("givenList.html","company.html")+"#contactUs");
		
			 
			//获取供应信息
			var arr = {
					"auth_token": commonFun.get_param("auth_token"),
					"uid": commonFun.get_param("uid"),
					"limit": 10,
					"offset": 0,
					"eid": commonFun.get_param("id"),
					 
				 
				};

				var results = commonFun.getJsonResult("productsup.list.get", arr,null);
		 
				if(/error/.test(results)) {
				 
					return false;
				} 
						//无数据
				else   if(results!=''&&results2!=null&&results!='null'&&results.length < 1) {
					 
									 
									return false;
								}
								else { 
									 $(document).attr("title",results[0].provider+"-企业微门户");
							 
									$("#provider").text(results[0].provider);
									var html= [];
									var tpl = $("#tpl_productsuplist").html();
									for(var i = 0; i < results.length; i++) {
										
										var small_url="../images/default_qi.jpg";
									
								          if(results[i].image)
		                                	{
								        	  var imagearr=JSON.parse(results[i].image);
								        	  small_url=imagearr['small_url'];
		                                	
		                                	 
		                                	}
										
										var _html = tpl
										.replace(/\{Id\}/g, commonFun.changetNull(results[i].Id))
										 
											.replace(/\{small_url\}/g, commonFun.changetNull(small_url))
											.replace(/\{title\}/g, commonFun.changetNull(results[i].title))
										 
									 
										html.push(_html);
										
									}
								
									$("#goodsList").append(html);
								 
									
									 var total = parseInt(results[0].totalNum/10);  
						                console.log(total);    //25  
						                
							         //分页插件，  
					                $("#pagination").createPage({  
					                    //pageCount：总页数  
					                    pageCount:total,  
					                    //current：当前页  
					                    current:1,  
					                    backFn:function(pageIndex){  
					                    //单击回调方法，pageIndex是当前页码  
					                    	   $(".goodsList").empty(); 
					                    	     var start = 10*pageIndex;
					                    	//获取供应信息
					            			var arr = {
					            					"auth_token": commonFun.get_param("auth_token"),
					            					"uid": commonFun.get_param("uid"),
					            					"limit": 10,
					            					"offset": start,
					            					"eid": commonFun.get_param("id"),
					            					 
					            				 
					            				};

					            				var results = commonFun.getJsonResult("productsup.list.get", arr,null);
					            		 
					            				if(/error/.test(results)) {
					            				 
					            					return false;
					            				} 
					            						//无数据
					            				else   if(results!=''&&results2!=null&&results!='null'&&results.length < 1) {
					            					 
					            									 
					            									return false;
					            								}
					            								else { 
					            									var html= [];
					            									var tpl = $("#tpl_productsuplist").html();
					            									for(var i = 0; i < results.length; i++) {
					            										
					            										var small_url="../images/default_qi.jpg";
					            									
					            								          if(results[i].image)
					            		                                	{
					            								        	  var imagearr=JSON.parse(results[i].image);
					            								        	  small_url=imagearr['small_url'];
					            		                                	
					            		                                	 
					            		                                	}
					            										
					            										var _html = tpl
					            										.replace(/\{Id\}/g, commonFun.changetNull(results[i].Id))
					            										 
					            											.replace(/\{small_url\}/g, commonFun.changetNull(small_url))
					            											.replace(/\{title\}/g, commonFun.changetNull(results[i].title))
					            										 
					            									 
					            										html.push(_html);
					            										
					            									}
					            								
					            									$("#goodsList").append(html);
					            								}
					            									
					                    	
					                        
					                    }  
					                }); 
						 
		         
									    
								 
								  
		}
	  break;
	  //需求列表页
	case 3:
		//需求列表页
		  //设置导航
		  var url=window.location.href;
		  var n1 = url.length;//地址的总长度
		  var n2 = url.indexOf("#");//取得#号的位置
		  if(n2!=-1)
		  {var remove = url.substr(n2, n1-n2);//从#号后面的内容
		  url=url.replace(remove,"");
		  }
		  
			$("#companyhref").attr("href",url.replace("needList.html","company.html"));
			$("#companyhref2").attr("href",url.replace("needList.html","company.html"));
			$("#providerhref").attr("href",url.replace("needList.html","company.html"));
			
			$("#aboutUshref").attr("href",url.replace("needList.html","company.html")+"#aboutUs");
			$("#givenMsghref").attr("href",url.replace("needList.html","company.html")+"#givenMsg");
			$("#givenMsghref2").attr("href",window.location.href);
			$("#needMsghref").attr("href",url.replace("needList.html","company.html")+"#needMsg");
			$("#comanyPichref").attr("href",url.replace("needList.html","company.html")+"#comanyPic");
			$("#contactUshref").attr("href",url.replace("needList.html","company.html")+"#contactUs");
		
			 
			//获取供应信息
			var arr = {
					"auth_token": commonFun.get_param("auth_token"),
					"uid": commonFun.get_param("uid"),
					"limit": 10,
					"offset": 0,
					"eid": commonFun.get_param("id"),
					 
				 
				};

				var results = commonFun.getJsonResult("productreq.list.get", arr,null);
		 
				if(/error/.test(results)) {
				 
					return false;
				} 
						//无数据
				else   if(results!=''&&results2!=null&&results!='null'&&results.length < 1) {
					 
									 
									return false;
								}
								else { 
									 $(document).attr("title",results[0].cName+"-企业微门户");
							 
									//$("#provider").text(results[0].provider);
									var html= [];
									var tpl = $("#tpl_productreqlist").html();
									for(var i = 0; i < results.length; i++) {
										
										var small_url="../images/default_qi.jpg";
									
								          if(results[i].image)
		                                	{
								        	  var imagearr=JSON.parse(results[i].image);
								        	  small_url=imagearr['path'];
		                                	
		                                	 
		                                	}
										
										var _html = tpl
										.replace(/\{Id\}/g, commonFun.changetNull(results[i].Id))
										 
											.replace(/\{small_url\}/g, commonFun.changetNull(small_url))
											.replace(/\{title\}/g, commonFun.changetNull(results[i].title))
										 
									 
										html.push(_html);
										
									}
								
									$("#goodsList").append(html);
								 
									
									 var total = parseInt(results[0].totalNum/10);  
						                console.log(total);    //25  
						                
							         //分页插件，  
					                $("#pagination").createPage({  
					                    //pageCount：总页数  
					                    pageCount:total,  
					                    //current：当前页  
					                    current:1,  
					                    backFn:function(pageIndex){  
					                    //单击回调方法，pageIndex是当前页码  
					                    	   $(".goodsList").empty(); 
					                    	     var start = 10*pageIndex;
					                    	//获取供应信息
					            			var arr = {
					            					"auth_token": commonFun.get_param("auth_token"),
					            					"uid": commonFun.get_param("uid"),
					            					"limit": 10,
					            					"offset": start,
					            					"eid": commonFun.get_param("id"),
					            					 
					            				 
					            				};

					            				var results = commonFun.getJsonResult("productreq.list.get", arr,null);
					            		 
					            				if(/error/.test(results)) {
					            				 
					            					return false;
					            				} 
					            						//无数据
					            				else   if(results!=''&&results2!=null&&results!='null'&&results.length < 1) {
					            					 
					            									 
					            									return false;
					            								}
					            								else { 
					            									var html= [];
					            									var tpl = $("#tpl_productreqlist").html();
					            									for(var i = 0; i < results.length; i++) {
					            										
					            										var small_url="../images/default_qi.jpg";
					            									
					            								          if(results[i].image)
					            		                                	{
					            								        	  var imagearr=JSON.parse(results[i].image);
					            								        	  small_url=imagearr['small_url'];
					            		                                	
					            		                                	 
					            		                                	}
					            										
					            										var _html = tpl
					            										.replace(/\{Id\}/g, commonFun.changetNull(results[i].Id))
					            										 
					            											.replace(/\{small_url\}/g, commonFun.changetNull(small_url))
					            											.replace(/\{title\}/g, commonFun.changetNull(results[i].title))
					            										 
					            									 
					            										html.push(_html);
					            										
					            									}
					            								
					            									$("#goodsList").append(html);
					            								}
					            									
					                    	
					                        
					                    }  
					                }); 
						 
		         
									    
								 
								  
		}
	  break; 
	default:
	  
	}
	
			
 
});

function showAlert(icon,text ){
    
    var html = '<div class="J_alert">' 
        +'<div class="bg"></div>'
        +'<div class="alertInner">'
        +'<p><i class="'+icon+' alertIcon"></i></p>'
        +'<p class="name">'+text+'</p>'
        +'</div>'
        +'</div>';

    $("body").append(html);
    setTimeout(function(){
            $(".J_alert").fadeOut(500);
            //$(".J_alert").remove();
            },700);

}

if($(".menuList").eq(0)){
	$(".iteam_parent").on("click",function(){
		$(".menu_children").css("display","none");
		var obj = this;
		$(obj).next(".menu_children").css("display","block");
	});
	
	$(".iteam_chd").on("click",function(){
		var obj = this;
		var value = $(obj).html();
		$("#J_inputHangye").val(value);		
		$(".menu_children").css("display","none");
		$("#J_hangye").modal("hide");
	});
		
}

if($(".searchType").eq(0)){
	var titleCon = $("#J_titleCon");
	$(document).on("click",".searchType .iteam",function(){
		var obj = this;
		var cls = $(obj).attr("class");
		var html = $(obj).prop("outerHTML");
				
		if(/curr/.test(cls)){
			$(obj).attr("class","iteam");
			var type_id = $(obj).attr("data-typeid");
			$("#J_titleCon .iteam").each(function(){
				var iteam = this;
				var data_typeid = $(iteam).attr("data-typeid");
				if(type_id==data_typeid){
					$(iteam).remove();
				}
			});
			
		}else{
			
			$(obj).attr("class","iteam curr");
			titleCon.append(html);
		}
				
	});
	$(document).on("click","#J_titleCon .iteam",function(){
		var obj = this;
  		var type_id = $(obj).attr("data-typeid");
		
		$(".searchType .iteam").each(function(){
			var iteam = this;
			var data_typeid = $(iteam).attr("data-typeid");
			
			if(type_id==data_typeid){
				$(iteam).attr("class","iteam");
			}
		});
		$(obj).remove();
		
	});
}









function showproductsupDetail(id,mid){
    

	 $('#'+mid).modal();
	 
	//获取供应信息
		var arr = {
				"auth_token": commonFun.get_param("auth_token"),
				"uid": commonFun.get_param("uid"),
				"limit": 8,
				"offset": 0,
				"id": id,
				 
			 
			};

			var results = commonFun.getJsonResult("productsup.list.get", arr,null);
	 
			if(/error/.test(results)) {
			 
				return false;
			} 
					//无数据
			else   if(results!=''&&results!=null&&results!='null'&&results.length < 1) {
				 
								 
								return false;
							}
							else { 
								 $("#number").text(commonFun.changetNull(results[0].number));
								 $("#title").text(commonFun.changetNull(results[0].title));
								 $("#typeStr").text(commonFun.changetNull(results[0].typeStr));
								 $("#provider").text(commonFun.changetNull(results[0].provider));
								 
								 $("#quote").text(commonFun.changetNull(results[0].quote));
								 $("#brand").text(commonFun.changetNull(results[0].brand));
								 $("#model").text(commonFun.changetNull(results[0].model));
								 $("#standard").text(commonFun.changetNull(results[0].standard));
								 $("#location").text(commonFun.changetNull(results[0].location));
								 $("#contact_tel").text(commonFun.changetNull(results[0].contact_tel));
								 $("#contact_name").text(commonFun.changetNull(results[0].contact_name));
								 $("#createTime").text(commonFun.changetNull(results[0].createTime));
							 
								 $("#detail").html(commonFun.changetNull(results[0].detail));
									var small_url="../images/default_qi.jpg";
								
							          if(results[0].image)
	                                	{
							        	  var imagearr=JSON.parse(results[0].image);
							        	  small_url=imagearr['small_url'];
	                                	
	                                	}
							      
							     	 $("#image0").attr("src",small_url);
									
							 
							 
					         
							 
								 
								    
							 
							  
	}
     

}
function showproductreqDetail(id,mid){
    

	 $('#'+mid).modal();
	 
	//获取供应信息
		var arr = {
				"auth_token": commonFun.get_param("auth_token"),
				"uid": commonFun.get_param("uid"),
				"limit": 8,
				"offset": 0,
				"id": id,
				 
			 
			};

			var results = commonFun.getJsonResult("productreq.list.get", arr,null);
	 
			if(/error/.test(results)) {
			 
				return false;
			} 
					//无数据
			else   if(results!=''&&results!=null&&results!='null'&&results.length < 1) {
				 
								 
								return false;
							}
							else { 

								 
							 
						 
								 $("#title2").text(commonFun.changetNull(results[0].title));
								 $("#typeStr2").text(commonFun.changetNull(results[0].typeStr));
						 
								 
								 $("#address").text(commonFun.changetNull(results[0].address));
								 
								 $("#contact_tel2").text(commonFun.changetNull(results[0].contact_tel));
								 $("#contact_name2").text(commonFun.changetNull(results[0].contact_name));
								 $("#createTime2").text(commonFun.changetNull(results[0].createTime));
							 
								 $("#detail2").html(commonFun.changetNull(results[0].detail));
								 $("#remark").html(commonFun.changetNull(results[0].remark));
									var small_url="../images/default_qi.jpg";
								
							          if(results[0].image)
	                                	{
							        	  var imagearr=JSON.parse(results[0].image);
							        	  small_url=imagearr['small_url'];
	                                	
	                                	}
							      
							     	 $("#image0").attr("src",small_url);
									
							 
							 
					         
							 
								 
								    
							 
							  
	}


}




