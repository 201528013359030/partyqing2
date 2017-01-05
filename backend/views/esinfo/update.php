<?php
use yii\helpers\Html;
 
$this->title = '微门户信息';
$this->params['breadcrumbs'][] = $this->title;

$action = new Action();
 
?>
<!--中间-->
 
	<script type="text/javascript">
	var fileId = 0;
	var taskID = 0;
	var fileInfo = [];
	function upload_btn_click(filetype){
 
	    document.getElementById("upload_button").click();
	}
	function upload_fun(x){
	    var file = $('#upload_button').get(0).files[0];
	   	//var filetype = $("#esinfoform-filetype").attr('value');
	    if (file) {
	        var fileSize = 0;
	        var errorSize = 0;
	        var str = "";
	        if (file.size > 1024 * 1024){ 
	            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
	            if(Math.round(file.size * 100 / (1024 * 1024)) / 100 > 200){
	                //str = "错误！文件不可大于200MB。";
					str = "文件不可大于200MB";
	                errorSize =1;   
	            }
	        }else{ 
	            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
	        }
			/*
	        if(filetype == 1){
	            if (!/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name)) {  
	                alert("图片类型必须是.gif,jpeg,jpg,png中的一种");  
	                return false;  
	            }  
	        }
			*/
	        console.log(file.name, fileSize, file.type);
	        //upload_file_start(file.name,fileSize);
	    //    if(filetype != 1){
	        $("#uploadModalBtn").trigger("click");
	            //document.getElementById("uploadModalBtn").click();
	    //    }
	        if(errorSize == 1){
	            upload_file_end(0,'上传失败',str,null,null);
	            return 0;
	        }
	    }
	    $("#taskID").val(++taskID);
	    
	    document.upload_form.submit();
	    var file = $('#upload_button');
	    file.after(file.clone().val("")); 
	    file.remove();
	}
 
	function upload_file_end(result,state,str,fileinfo,tmpTaskID){
// 	    if(closeUpload[tmpTaskID] == true){
// 	        return;
// 	    }
//	  	var filetype = $("#publicinfoform-filetype").attr('value');
// 	  	$("#closeUpload").text('关闭');
// 	    $("#closeUpload").css('display','inline-block');
	 // 	alert(filetype);
	    if(result){
	        //$("#up_file_state").css("color","#00FF00");
			/*
	    	if(filetype == 1){
	            //alert(fileinfo.path);
		    	$("#contentImg").attr("src",fileinfo.path);
		    	$("#contentBigImg").attr("src",fileinfo.path);
		    	$("#contentShowimg").attr("imgsrc",fileinfo.path);
		    	$("#publicinfoform-contentImg").attr("value",JSON.stringify(fileinfo));
		    	$("#J-showimg").css("display","block");
	            $("#addImgBox").css("display",'none');
	            $("#editImgBox").css("display",'block');
	    	}else{
			*/
				var count = parseInt($("#esinfoform-attachCount").attr("value"))+1;
				if(count > 5){
					$("#upload_photos").css("display","none");
				}
	    		for(var i=1;i<4;i++){
	    			var display = $("#photos"+i).css("display");
	    			if(display == "none"){
	    				break;
	    			}
	    		}
				//$("#photosName"+i).text(fileinfo.name);
					$("#photosName"+i).text(fileinfo.name);
					$("#photosName").attr("src",fileinfo.name);
				$("#photos"+i).css("display","block");
	    		$("#esinfoform-attach"+i).attr("value",JSON.stringify(fileinfo));
	    		$("#esinfoform-attachCount").attr("value",count);
	    	//}
	    	
	    }else{
			//alert('上传失败');
			showAlert("pic_error", state+"<br/>"+str);
	    }	    
	}
	function file_del(id){
		$("#photos"+id).css("display","none");
		$("#esinfoform-attach"+id).val("");
		var count = $("#esinfoform-photosCount").attr("value")-1;
		$("#esinfoform-photosCount").attr("value",count);
		if(count < 3){
			$("#upload_photos").css("display","block");
		}
	}
	</script>
<div class="outwrap">	
	
	<div class="innerwrap bg_form">
		
		<div class="innerCotent">
			
			<div class="mo-tabs">
			<span style="color:red;"><?php if(isset($tip))echo $tip;$tip="";?></span>
		    <ul id="myTab" class="nav nav-tabs" role="tablist">
		      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">电商模版信息</a></li>
		      <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">产品信息</a></li>
		      
		    </ul>
		    <div id="myTabContent" class="tab-content">
		      <div role="tabpanel" class="tab-pane fade  active in" id="home" aria-labelledby="home-tab">
		        
		        <div class="row">
							<div class="col-sm-7">
								
<form name='commentForm' id="commentForm" method="post" enctype="multipart/form-data" action="index.php?r=esinfo/create&action=save&id=<?php echo $model->id;?>">

			
									<!--
					          	提交校验功能，必填项目  name required
					          	具体用法参考
					          	http://www.runoob.com/jquery/jquery-plugin-validate.html
					        -->
					        
									<table class="mytb myTpl" cellpadding="0" cellspacing="0">
										<tr>
											<td class="tdName">背景图片<img src="images/eshop/star.png"></td>
											<td>
												<a href="javascript:void(0)" class="mobtn primary_btn" onclick="upload_btn_click(1);">上传图片</a>
												<a href="javascript:void(0)" class="mobtn default_btn">重置</a>
												<small class="mobtn_tip fc-default">支持XXXXX，图片大小1920*300，下图为默认图片</small>
												<div class="showPic">
													<img src="images/eshop/banner.png" class="img-responsive">
												</div>
											</td>
																			
										</tr>
										<tr>
											<td class="tdName">公司简介<img src="images/eshop/star.png"></td>
											<td>
												<textarea  id="Intro" name="Intro"  class="form-control valid" rows="5" aria-invalid="false" required></textarea>
												<small class="mobtn_tip fc-default">150-200 字最佳</small>
											</td>
																			
										</tr>
											 
												<tr>
											<td class="col-sm-3 text-center bg_lable">联系人<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<input type="text" name="publicContacts" class="form-control"  value="<?php echo $company->publicContacts;?>" style="width:500px;" required>
											</td>
																			
										</tr>
													<tr>
											<td class="col-sm-3 text-center bg_lable">电话<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<input type="text" name="phone" class="form-control"  value="<?php echo $company->phone;?>" style="width:500px;" required >
											</td>
																			
										</tr>
														<tr>
											<td class="col-sm-3 text-center bg_lable">移动电话<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<input type="text" name="publicPhone" class="form-control" value="<?php echo $company->publicPhone;?>"  style="width:500px;" required>
											</td>
																			
										</tr>
									
														<tr>
											<td class="col-sm-3 text-center bg_lable">邮箱<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<input type="text" name="publicEmail" class="form-control" value="<?php echo $company->publicEmail;?>" style="width:500px;" required>
											</td>
																			
										</tr>
														<tr>
											<td class="col-sm-3 text-center bg_lable">地址<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<input type="text" name="position" class="form-control" value="<?php echo $company->position;?>" style="width:500px;" required>
											</td>
																			
										</tr>
														<tr>
											<td class="col-sm-3 text-center bg_lable">公司网址<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<input type="text" name="publicUrl" class="form-control" value="<?php echo $company->publicUrl;?>" style="width:500px;"  required>
											</td>
																			
										</tr>
										<tr>
											<td class="tdName">公司相册<img src="images/eshop/star.png"></td>
											<td>
												<a href="javascript:void(0)" class="mobtn primary_btn" onclick="upload_btn_click(1);">上传图片</a>
												<small class="mobtn_tip fc-default">支持XXX格式，图片大小600*400 至少上传5张为最佳</small>
												
												<div class="photoBox">
													
													<div class="photoCenter"  id="photos1" style="display: none;">
														<div class="photoIteam">
															<span><img id="photosName1" src="images/eshop/c5.png" class="img-responsive"></span>
															<a href="javascript:void(0);" class="del"> 删除 </a>
														</div>
													</div>
													<div class="photoCenter"  id="photos2" style="display: none;">
														<div class="photoIteam">
															<span><img id="photosName2" src="images/eshop/c5.png" class="img-responsive"></span>
															<a href="javascript:void(0);" class="del"> 删除 </a>
														</div>
													</div>
													<div class="photoCenter"  id="photos3" style="display: none;">
														<div class="photoIteam">
															<span><img  id="photosName3" src="images/eshop/c5.png" class="img-responsive"></span>
															<a href="javascript:void(0);" class="del"> 删除 </a>
														</div>
													</div>
													<div class="photoCenter"  id="photos4" style="display: none;">
														<div class="photoIteam">
															<span><img  id="photosName4" src="images/eshop/c5.png" class="img-responsive"></span>
															<a href="javascript:void(0);" class="del"> 删除 </a>
														</div>
													</div>
													<div class="photoCenter"  id="photos5" style="display: none;">
														<div class="photoIteam">
															<span><img  id="photosName5" src="images/eshop/c5.png" class="img-responsive"></span>
															<a href="javascript:void(0);" class="del"> 删除 </a>
														</div>
													</div>
													<div class="photoCenter"  id="photos6" style="display: none;">
														<div class="photoIteam">
															<span><img id="photosName6" src="images/eshop/c5.png" class="img-responsive"></span>
															<a href="javascript:void(0);" class="del"> 删除 </a>
														</div>
													</div>
													
												</div>
												
											</td>
																			
										</tr>
										
									</table>
									<div class="buttnGroup">
										<input class="submit" type="submit" value="保存">
										<a href="javascript:void(0)" class="mobtn second_btn">在线预览</a>
									</div>
										<div style="#display: none;">
		 
				<input id="esinfoform-photos1" type="hidden" name="esinfoForm[photos1]" value="">
				<input id="esinfoform-photos2" type="hidden" name="esinfoForm[photos2]" value="">
				<input id="esinfoform-photos3" type="hidden" name="esinfoForm[photos3]" value="">
						<input id="esinfoform-photos3" type="hidden" name="esinfoForm[photos4]" value="">
								<input id="esinfoform-photos3" type="hidden" name="esinfoForm[photos5]" value="">
											<input id="esinfoform-photos3" type="hidden" name="esinfoForm[photos6]" value="">
				<input id="esinfoform-photosCount" type="hidden" name="esinfoForm[photosCount]" value=0>
	
	 
			</div>
								</form>
								
							</div>
							<div class="col-sm-5">
								<div class="tpl_smBox">
									<div class="smTitle">请选择：</div>
									<div class="smBox">
										<a href="javascript:void(0)" class="curr">
											<img src="images/eshop/tpl_sm1.jpg" class="tpl_sm">
										</a>
										<!--<a href="javascript:void(0)" >
											<img src="images/eshop/tpl_sm1.jpg" class="tpl_sm">
										</a>	-->
									</div>
								</div>
								<div class="tpl_lgBox">
									<div class="lgTitle">样式预览：</div>
									<p><img src="images/eshop/tpl_lg1.jpg" class="tpl_lg img-responsive"></p>
								</div>
							</div>
							
						</div>
		        
		      </div>
		      <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
		        
		        
		        <table class="tableList proTbList" cellpadding="0" cellspacing="0">
			
							<tbody>
								<tr>				
								<th class="num">序号</th>				
								<th class="userpic">缩略图</th>				
								<th>产品名称</th>
								<th class="username">费用(元)</th>
								<th class="op op_3">操作</th>				
							</tr>	
										
							<tr>				
								<td class="num">1</td>				
								<td class="userpic"><img class="pic" src="images/eshop/c5.png"></td>				
								<td>水电服务 </td>	
								<td class="username">1500</td>		
								<td class="op op_3">
									<a href="javascript:void(0)" class="mobtn mobtnSm primary_btn" >编辑</a>							
									<a href="javascript:void(0)" class="mobtn mobtnSm dangerous_btn" >删除</a>
									<a href="javascript:void(0)" class="mobtn mobtnSm second_btn" >查看</a>
				
								</td>				
				
							</tr>
		       </tbody>
		      </table>
		        
		        <form id="commentForm" method="get" action="">
									
									<table class="mytb myTpl midTb" cellpadding="0" cellspacing="0">
										<tr>
											<td class="col-sm-3 text-center bg_lable">产品名称<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<input type="text" class="form-control" style="width:500px;" >
											</td>
																			
										</tr>
										<tr>
											<td class="col-sm-3 text-center bg_lable">费用<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
<div class="form-inline">								
<label class="radio-inline">
  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> &nbsp;
</label>
<div class="form-group">
	<input type="text" class="form-control input-sm" style="width:100px;" > 元
</div>
<label class="radio-inline">
  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 面议
</label>
</div>															
											</td>
																			
										</tr>
										<tr>
											<td class="col-sm-3 text-center bg_lable">产品封面图<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<a href="javascript:void(0)" class="mobtn primary_btn">上传图片</a>
												<small class="mobtn_tip fc-default">支持XXX格式，图片大小600*500 </small>
												
												<div class="photoBox">
													
													<div class="photoCenter">
														<div class="photoIteam">
															<span><img src="images/eshop/c5.png" class="img-responsive"></span>
															<a href="javascript:void(0);" class="del"> 删除 </a>
														</div>
													</div>
													
												</div>
												
											</td>
																			
										</tr>
										
										<tr>
											<td class="col-sm-3 text-center bg_lable">详细说明<img src="images/eshop/star.png"></td>
											<td class="col-sm-9">
												<textarea class="form-control valid" rows="5" aria-invalid="false">插入富文本</textarea>
												
											</td>
																			
										</tr>
										
									</table>
							</form>
		        
		      </div>
		      
		    </div>
		  </div>
			
			
		</div>
		
	</div>
</div>
		<div id="uploadfile" style="display:none">
		<form name="upload_form" id="upload_form" class="upload_form"  method="post" target='upload_frame' enctype="multipart/form-data" action="index.php?r=esinfo/create">
			 <input id="taskID" type="hidden" name="taskID" value=0>
			<input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);">
			<iframe id="upload_frame" name="upload_frame" style="display:none"></iframe>
		</form>  
	</div> 

