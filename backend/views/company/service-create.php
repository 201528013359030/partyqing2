<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\models\Action;
use yii\base\Object;
$action = new Action();
?>
<!--中间-->
<?php 
if(!isset($flag)){
	$flag=1;
}
$this->title = '便民服务发布';
//$this->params['breadcrumbs'][] = ['label' => '公共信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?=Html::jsFile('@web/ueditor/ueditor.config.js')?>
	<?=Html::jsFile('@web/ueditor/ueditor.all.js')?>
    <script type="text/javascript">
		var ue = UE.getEditor("editor",{
			toolbars: [[
		        'undo', //撤销
		        'redo', //重做
		        'fontsize', //字号
		        'bold', //加粗
		        'underline', //下划线
		        'forecolor', //字体颜色
		        'indent', //首行缩进
		        'lineheight', //行间距
		        'justifyleft', //居左对齐
		        'justifyright', //居右对齐
		        'justifycenter', //居中对齐
		        'justifyjustify', //两端对齐
		        'horizontal', //分隔线
		        'insertframe', //插入Iframe
		        'simpleupload', //单图上传
		        'imagenone', //默认
		        'imageleft', //左浮动
		        'imageright', //右浮动
		        'imagecenter', //居中
		        'fullscreen', //全屏
		        ]]
				,maximumWords:1000
		});
    </script>
<!--此处是内容区部分-->
<div class="outwrap">	
	
	<div class="innerwrap bg_form">
		
		<div class="innerCotent">
			<div class="formTitle"><a href="#" onclick="javascript:history.back(-1);">返回上一页</a></div>
			<form id="commentForm" method="post" action="<?=Url::to(['scientificinfo/create'])?>">
				<input type="hidden" name="Form[requirement]" value="<?php echo $flag?>">
				<table class="mytb midTb" cellpadding="0" cellspacing="0">
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>企业名称</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[contact_unit]" class="form-control" required placeholder="企业名称" value="<?=Yii::$app->session['user.company']?>" disabled>
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable">服务类型</td>
						<td class="col-sm-9">
							<select class="form-control" name = "Form[type]" id="publicinfoform-type" required >

							  <option value =''>请选择服务类型</option> 
							  
							  <?php 						      
						      $options = $action->getParamOptions("cmpServiceType", "");
						      echo $options;
						  ?>

							</select>
						</td>						

					</tr>
					
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>服务标题</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[title]" class="form-control" required  placeholder="">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>信息摘要</div></td>
						<td class="col-sm-9">
							<textarea name="Form[abstract]"  id='abstract' class="form-control" rows="2" required maxlength="75" placeholder=""></textarea>
<!-- 							<input type="text" name="Form[abstract]" class="form-control" required  placeholder=""> -->
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>服务信息内容</div></td>
						<td class="col-sm-9" style="display: none">
							<textarea name="Form[content]" id="content" class="form-control" rows="10" required  placeholder=""></textarea>
						</td>	
						<td class="col-sm-9">

							<textarea  class="form-control" id='publicinfoform-content' rows="10" name="publicinfoForm[content]" style="display:none"></textarea>
							
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
							</a>
							
						</td>	

					</tr>
					<!-- <tr>
						<td class="col-sm-3 text-center bg_lable"><div>有效日期至</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[validTime]" id="validTime" class="form-control form_datetime" required  placeholder="有效日期至">
						</td>						
					</tr> -->
					
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>联系人姓名</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[contact_name]" class="form-control" required placeholder="联系人姓名" value="<?=Yii::$app->session['userName']?>">
							<p class="help-block"></p>
						</td>						
					</tr>
					
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>联系电话</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[contact_phone]" class="form-control" required placeholder="联系手机" value="<?=Yii::$app->session['loginName']?>">
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>联系邮箱</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[contact_email]" class="form-control" email placeholder="联系邮箱" value="">
						</td>						
					</tr>

					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>备注</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[remarks]" class="form-control" placeholder="备注" value="">
						</td>						
					</tr>
					<tr>

						<td class="col-sm-3 text-center bg_lable">附件</td>
						<td class="col-sm-9">
							<div id="upload_attach" class="inpBox">
								<div class="btnAtta" onclick="upload_btn_click();">
									<i class="icon_clip"></i>
									<span class="ic_text">上传附件</span>									
								</div>
							</div>
							<div id="file_list" class="inpBox inpBox_atta" style="display: block;">								
							</div>
							
						</td>
					</tr>
				</table>

				
				<div class="buttnGroup">
<!-- 					<input class="submit" type="submit" value="发布信息"> -->
					<input class="submit" onclick="send_submit()" value="发布信息">
					<!-- <a href="javascript:void(0)" class="mobtn default_btn">取消</a> -->
				</div>
				
			</form>

				<div id="uploadfile" style="display:none">

		<form name="upload_form" id="upload_form" class="upload_form"  method="post" target='upload_frame' enctype="multipart/form-data" action="index.php?r=scientificinfo/uploadfile">
			<!--input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);"-->
            <input id="taskID" type="hidden" name="taskID" value=0>
			<input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);">
			<iframe id="upload_frame" name="upload_frame" style="display:none"></iframe>
		</form> 
				</div> 
		</div>


		
	</div>

</div>
<!--底部-->


<script>
window.onload=function(){ 

	//需要参考jquery validate 验证插件
	//$("#commentForm").validate();
	
	//form 表单提交之后触发
// 	$.validator.setDefaults({
// 	    submitHandler: function() {
// 	      alert("提交事件!");
// 	    }
// 	});
	
};
/**
 * 删除文件
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
function file_del(id){
	$("#attach"+id).remove();		
}
/**
 * 触发上传文件
 * @return {[type]} [description]
 */
function upload_btn_click(){
	$("#upload_button").click();
}
var taskID = 0;
/**
 * 上传文件
 * @return {[type]} [description]
 */
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
	    	 var html = "<div id='attach"+tmpTaskID+" href='#' class='attaIteam' style='display: block;'>"+
	    	 "<div class='icon_del fr' style='cursor:pointer;' onclick='file_del("+tmpTaskID+")'></div>"+
	    	 
	    	 "<i class='icon_file'></i><span  id='attachName1'>"+fileinfo.name+"</span><input id='file_"+tmpTaskID+"' type='hidden'  name='file_list[]' value=''></div>";	    	 
	    	 $("#file_list").append(html);
	    	 $("#file_"+tmpTaskID).attr("value",JSON.stringify(fileinfo));
	    	 console.log($("#file_"+tmpTaskID).val());
	    }else{
			showAlert("pic_error", str);
	    }	    
	}

	function file_del(id){
		$("#attach"+id).css("display","none");
	}
	function send_submit(){
		$("#content").val(UE.getEditor('editor').getContent());
		$("#commentForm").validate();
		var validTime = $("#validTime").val();
		console.log(Date.parse(validTime)+24*60*60-1);
		console.log(Date.parse(new Date()));
		if(Date.parse(validTime)<Date.parse(new Date())){
			showAlert("pic_error","有效时间无效");
			return false;
		}else{
			 $("#commentForm").submit();
			 return true;
		}
	}

</script>
