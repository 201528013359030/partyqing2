<?php
use yii\helpers\Html;
?>

<!--[if lt IE 9]>

  <script src="../js/html5shiv.min.js"></script>

  <script src="../js/respond.min.js"></script>

<![endif]-->
    <?=Html::jsFile('@web/ueditor/ueditor.config.js')?>
    <?//=Html::jsFile('@web/ueditor/ueditor.all.min.js')?>
	<?=Html::jsFile('@web/ueditor/ueditor.all.js')?>
	<? //=Html::jsFile('@web/js/jquery.validate.js')?>
    <script type="text/javascript">
    var ue1 = UE.getEditor("Aboutussum");
    ue1.ready(function(){
    	ue1.setContent('<?php echo $model->Aboutussum;?>');     //加载数据库Action.class.PHP传过来的值
    });
    
	var ue2 = UE.getEditor("Aboutus");
	ue2.ready(function(){
    	ue2.setContent('<?php echo $model->Aboutus;?>');     //加载数据库Action.class.PHP传过来的值
    });
	var ue3 = UE.getEditor("Intro");  
	ue3.ready(function(){
    	ue3.setContent('<?php echo $model->Intro;?>');     //加载数据库Action.class.PHP传过来的值
    });                    
	var ue4 = UE.getEditor("Contractussum"); 
	ue4.ready(function(){
    	ue4.setContent('<?php echo $model->Contractussum;?>');     //加载数据库Action.class.PHP传过来的值
    }); 
	var ue5 = UE.getEditor("Contractus");
	ue5.ready(function(){
    	ue5.setContent('<?php echo $model->Contractus;?>');     //加载数据库Action.class.PHP传过来的值
    }); 
	var ue6 = UE.getEditor("Productintro");
	ue6.ready(function(){
    	ue6.setContent('<?php echo $model->Productintro;?>');     //加载数据库Action.class.PHP传过来的值
    }); 
	  
		
    </script>
	<script type="text/javascript">
	var fileId = 0;
	var taskID = 0;
	var fileInfo = [];
	function upload_btn_click(filetype){
		//$("#publicinfoform-filetype").attr("value",filetype);
	    document.getElementById("upload_button").click();
	}
	function upload_fun(x){
	    var file = $('#upload_button').get(0).files[0];
	  	//var filetype = $("#publicinfoform-filetype").attr('value');
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
	        console.log(file.name, fileSize, file.type);
	    
	 
	        $("#uploadModalBtn").trigger("click");
	            //document.getElementById("uploadModalBtn").click();
	 
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
 
	    if(result){
	 
				var count = parseInt($("#publicinfoform-attachCount").attr("value"))+1;
				if(count > 2){
					$("#upload_attach").css("display","none");
				}
	    		for(var i=1;i<4;i++){
	    			var display = $("#attach"+i).css("display");
	    			if(display == "none"){
	    				break;
	    			}
	    		}
				$("#attachName"+i).text(fileinfo.name);
				$("#attach"+i).css("display","block");
	    		$("#publicinfoform-attach"+i).attr("value",JSON.stringify(fileinfo));
	    		$("#publicinfoform-attachCount").attr("value",count);
	    	 
	    	
	    }else{
			//alert('上传失败');
			showAlert("pic_error", state+"<br/>"+str);
	    }	    
	}

	function file_del(id){
		$("#attach"+id).css("display","none");
		$("#publicinfoform-attach"+id).val("");
		var count = $("#publicinfoform-attachCount").attr("value")-1;
		$("#publicinfoform-attachCount").attr("value",count);
		if(count < 3){
			$("#upload_attach").css("display","block");
		}
	}
	 

	</script>

<!--顶部-->

<!--中间-->
<?php 
$this->title = '修改店铺';
$this->params['breadcrumbs'][] = ['label' => '店铺信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<!--此处是内容区部分-->

<div class="outwrap">	

	

	<div class="innerwrap bg_form">

		

		<div class="innerCotent">

			<div class="formTitle">修改店铺信息</div>

			<form name='commentForm' id="commentForm" method="post" enctype="multipart/form-data" action="index.php?r=esinfo/update&action=save&id=<?php echo $model->id;?>">

				<table class="mytb midTb" cellpadding="0" cellspacing="0">

					<tr>

						<td class="col-sm-3 text-center bg_lable">公司名称</td>

						<td class="col-sm-9">
						 <?php echo $company->cName;?>
						</td>						

					</tr>

					<tr>

						<td class="col-sm-3 text-center bg_lable">背景图片</td>

						<td class="col-sm-9">
							 
								<input type="text" id="Imageurl" name="Imageurl" class="form-control"   value=" <?php echo $model->Imageurl;?>" >
							 
						</td>						

					</tr>

					<tr>

						<td class="col-sm-3 text-center bg_lable"><div>关于我们简介</div></td>

						<td class="col-sm-9">

						 
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="Aboutussum" name="Aboutussum" type="text/plain" style="width:100%;height:200px;"></script>
							</a>
						</td>			

					</tr>
					<tr>
  
						<td class="col-sm-3 text-center bg_lable"><div>关于我们</div></td>

						<td class="col-sm-9">

							 
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="Aboutus" name="Aboutus" type="text/plain" style="width:100%;height:200px;"></script>
							</a>
						 
						</td>			

					</tr>
							<tr>

						<td class="col-sm-3 text-center bg_lable"><div>公司简介</div></td>

						<td class="col-sm-9">

						 
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="Intro" name="Intro" type="text/plain" style="width:100%;height:200px;"></script>
							</a>
						</td>			

					</tr>
						<tr>

						<td class="col-sm-3 text-center bg_lable"><div>产品推介</div></td>

						<td class="col-sm-9">

						 
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="Productintro" name="Productintro" type="text/plain" style="width:100%;height:200px;"></script>
							</a>
						</td>			

					</tr>
								<tr>

						<td class="col-sm-3 text-center bg_lable"><div>联系我们简介</div></td>

						<td class="col-sm-9">

						 
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="Contractus" name="Contractus" type="text/plain" style="width:100%;height:200px;"></script>
							</a>
						</td>			

					</tr>
					<tr>

						<td class="col-sm-3 text-center bg_lable"><div>联系我们</div></td>

						<td class="col-sm-9">

						 
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="Contractussum" name="Contractussum" type="text/plain" style="width:100%;height:200px;"></script>
							</a>
						</td>			

					</tr>
					<tr>

						<td class="col-sm-3 text-center bg_lable">附件</td>

						<td class="col-sm-9">

							<div id="upload_attach" class="inpBox">

								<div class="btnAtta" onclick="upload_btn_click(2);">

									<i class="icon_clip"></i>

									<span class="ic_text">上传附件</span>									

								</div>

							</div>

							<div class="inpBox inpBox_atta" style="display: block;">

				

								<div id="attach1" href="#" class="attaIteam" style="display: none;">

									<div class="icon_del fr" style="cursor:pointer;" onclick="file_del(1)"></div>

									<i class="icon_file"></i><span  id="attachName1"></span>

								</div>

								

								<div id="attach2" href="#" class="attaIteam" style="display:none;">

									<div href="#" class="icon_del fr" style="cursor:pointer;" onclick="file_del(2)"></div>

									<i class="icon_file"></i><span  id="attachName2"></span>

								</div>

				

								<div id="attach3" href="#" class="attaIteam" style="display:none;">

									<div href="#" class="icon_del fr" style="cursor:pointer;" onclick="file_del(3)"></div>

									<i class="icon_file"></i><span  id="attachName3"></span>

								</div>

								

							</div>
							

						</td>

					</tr>

				</table>
				
			<div style="#display: none;">
		 
				<input id="publicinfoform-attach1" type="hidden" name="photos[1]" value="">
				<input id="publicinfoform-attach2" type="hidden" name="photos[2]" value="">
				<input id="publicinfoform-attach3" type="hidden" name="photos[3]" value="">
				<input id="publicinfoform-attachCount" type="hidden" name="photos[attachCount]" value=0>
	
	  
			</div>

				<div class="buttnGroup">

					<input class="submit" type="submit" value="提交">

		 

				</div>

				

			</form>

		</div>

	<div id="uploadfile" style="display:none">
		<form name="upload_form" id="upload_form" class="upload_form"  method="post" target='upload_frame' enctype="multipart/form-data" action="index.php?r=publicinfo/create">
		 
            <input id="taskID" type="hidden" name="taskID" value=0>
			<input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);">
			<iframe id="upload_frame" name="upload_frame" style="display:none"></iframe>
		</form> 
	</div>

	</div>

</div>

<!--底部-->

<script>



//$(document).ready(function(){

//需要参考jquery validate 验证插件

//	$("#commentForm").validate();



	//form 表单提交之后触发

//$.validator.setDefaults({

//    submitHandler: function() {

//      alert("提交事件!");

//    }

//});

	

	

//});





</script>

