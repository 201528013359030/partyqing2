<?phpuse yii\helpers\Html;?>
<!--[if lt IE 9]>
  <script src="../js/html5shiv.min.js"></script>
  <script src="../js/respond.min.js"></script>
<![endif]-->    <?=Html::jsFile('@web/ueditor/ueditor.config.js')?>    <?//=Html::jsFile('@web/ueditor/ueditor.all.min.js')?>	<?=Html::jsFile('@web/ueditor/ueditor.all.js')?>	<? //=Html::jsFile('@web/js/jquery.validate.js')?>    <script type="text/javascript">		var ue = UE.getEditor("editor");    </script>	<script type="text/javascript">	var fileId = 0;	var taskID = 0;	var fileInfo = [];	function upload_btn_click(filetype){		//$("#publicinfoform-filetype").attr("value",filetype);	    document.getElementById("upload_button").click();	}	function upload_fun(x){	    var file = $('#upload_button').get(0).files[0];	  	//var filetype = $("#publicinfoform-filetype").attr('value');	    if (file) {	        var fileSize = 0;	        var errorSize = 0;	        var str = "";	        if (file.size > 1024 * 1024){ 	            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';	            if(Math.round(file.size * 100 / (1024 * 1024)) / 100 > 200){	                //str = "错误！文件不可大于200MB。";					str = "文件不可大于200MB";	                errorSize =1;   	            }	        }else{ 	            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';	        }	        console.log(file.name, fileSize, file.type);	        $("#uploadModalBtn").trigger("click");	        if(errorSize == 1){	            upload_file_end(0,'上传失败',str,null,null);	            return 0;	        }	    }	    $("#taskID").val(++taskID);	    document.upload_form.submit();	    var file = $('#upload_button');	    file.after(file.clone().val("")); 	    file.remove();	}	function upload_file_end(result,state,str,fileinfo,tmpTaskID){	    if(result){				var count = parseInt($("#publicinfoform-attachCount").attr("value"))+1;				if(count > 2){					$("#upload_attach").css("display","none");				}	    		for(var i=1;i<4;i++){	    			var display = $("#attach"+i).css("display");	    			if(display == "none"){	    				break;	    			}	    		}				$("#attachName"+i).text(fileinfo.name);				$("#attach"+i).css("display","block");	    		$("#publicinfoform-attach"+i).attr("value",JSON.stringify(fileinfo));	    		$("#publicinfoform-attachCount").attr("value",count);	    		    }else{			showAlert("pic_error", str);			//showAlert("pic_error", state+"<br/>"+str);	    }	    	}	function file_del(id){		$("#attach"+id).css("display","none");		$("#publicinfoform-attach"+id).val("");		var count = $("#publicinfoform-attachCount").attr("value")-1;		$("#publicinfoform-attachCount").attr("value",count);		if(count < 3){			$("#upload_attach").css("display","block");		}	}	function send_submit(){		$("#publicinfoform-content").val(UE.getEditor('editor').getContent());		if($("#publicinfoform-type").val()=='0'){			$('.tooltip-type').tooltip('show');	        return false;	    }	    if( $.trim($("#publicinfoform-title").val()) == ""){	    	$('.tooltip-title').tooltip('show');			return false;		}		if( $.trim($("#publicinfoform-content").val()) == "" && UE.getEditor('editor').getContent() == ""){			$('.tooltip-content').tooltip('show');			return false;		} 	    document.commentForm.submit(); 	    return false;	}	</script>
<!--顶部-->
<!--中间--><?php $this->title = '发布信息';//$this->params['breadcrumbs'][] = ['label' => '公共信息', 'url' => ['index']];$this->params['breadcrumbs'][] = $this->title;?>

<!--此处是内容区部分-->
<div class="outwrap">	
	
	<div class="innerwrap bg_form">
		
		<div class="innerCotent">
			<div class="formTitle">发布公共信息</div>
			<form name='commentForm' id="commentForm" method="post" enctype="multipart/form-data" action="index.php?r=publicinfo/save">
				<table class="mytb midTb" cellpadding="0" cellspacing="0">
					<tr>
						<td class="col-sm-3 text-center bg_lable">信息类型</td>
						<td class="col-sm-9">						<a href="#" class="tooltip-type"  title="请选择信息类型" data-placement="right">
							<select class="form-control" name = "publicinfoForm[type]" id="publicinfoform-type">
							  <option value ='0'>请选择信息类型</option>							  							  <?php foreach ($menus as $menu):?>							  
							  <option value='<?=Html::encode($menu['id'])?>'><?=Html::encode($menu['menu_name'])?></option>							  							  <?php endforeach;?>
							</select>						</a>
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable">标题</td>
						<td class="col-sm-9">							<a href="#" class="tooltip-title"  title="请填写标题" data-placement="right">								<input type="text" id="publicinfoform-title" class="form-control"  placeholder="必填"  required name="publicinfoForm[title]">							</a>						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>内容</div></td>
						<td class="col-sm-9">
							<textarea  class="form-control" id='publicinfoform-content' rows="10" name="publicinfoForm[content]" style="display:none"></textarea>														<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">								<script id="editor" type="text/plain" style="width:100%;height:300px;"></script>							</a>							
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
			<div style="#display: none;">			<!--	<input id="publicinfoform-contentImg" type="hidden" name="publicinfoForm[contentImg]" value=""> -->				<input id="publicinfoform-attach1" type="hidden" name="publicinfoForm[attach1]" value="">				<input id="publicinfoform-attach2" type="hidden" name="publicinfoForm[attach2]" value="">				<input id="publicinfoform-attach3" type="hidden" name="publicinfoForm[attach3]" value="">				<input id="publicinfoform-attachCount" type="hidden" name="publicinfoForm[attachCount]" value=0>			</div>
				<div class="buttnGroup">
					<input class="submit" type="button" onclick='send_submit();' value="提交">
				<!--	<a href="javascript:void(0)" class="mobtn default_btn">取消</a>   -->
				</div>
				
			</form>
		</div>
	<div id="uploadfile" style="display:none">		<form name="upload_form" id="upload_form" class="upload_form"  method="post" target='upload_frame' enctype="multipart/form-data" action="index.php?r=publicinfo/create">			<!--input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);"-->            <input id="taskID" type="hidden" name="taskID" value=0>			<input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);">			<iframe id="upload_frame" name="upload_frame" style="display:none"></iframe>		</form> 	</div>
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
