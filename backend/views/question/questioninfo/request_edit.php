<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "服务反馈";
$this->params['breadcrumbs'][] = $this->title;
?>
<!--中间-->

<!--此处是内容区部分-->
<div class="outwrap">	
	
	<div class="innerwrap bg_form">			
		<div class="pt20">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs " role="tablist">
			<?if(Yii::$app->session['user.identity.type'] == 3):?>
			  <li  class="<?=$action['submit']?>"><a href="index.php?r=question/questioninfo/submit" >我要反馈</a></li>
			 <?endif?>
			  <li class="<?=$action['index']?>"><a href="index.php?r=question/questioninfo/index">未解决问题</a></li>
			  <li class="<?=$action['finish']?>"><a href="index.php?r=question/questioninfo/finish">已解决问题</a></li>
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content tabCloud">
			  <div role="tabpanel" class="tab-pane active" id="home">
			  	
				<div class="innerCotent">
					<?if(YII_QUESTION == "v1"):?>
					<?endif?>
					<form id="commentForm" method="post" action="<?=Url::to(['question/questioninfo/submit'])?>">
						<table class="mytb midTb" cellpadding="0" cellspacing="0">
							<tr>
								<td class="col-sm-3 text-center bg_lable"><div>企业名称</div></td>
								<td class="col-sm-9">
									<input type="text" name="Form[company]" class="form-control" required placeholder="企业名称" value="<?=Yii::$app->session['user.company']?>">
								</td>						
							</tr>
							<tr>
								<td class="col-sm-3 text-center bg_lable"><div>反馈类型</div></td>
								<td class="col-sm-9">
									
									<select class="form-control" name="Form[type]">
										<?foreach(\Yii::$app->params["questionType"] as $k=>$t):?>
										<option value="<?=$k?>" ><?=$t?></option>
										<?endforeach?>
									</select>

					
								</td>						
							</tr>
							<tr>
								<td class="col-sm-3 text-center bg_lable"><div>标题</div></td>
								<td class="col-sm-9">
									<input type="text" name="Form[title]" class="form-control" required  placeholder="">
									<p class="help-block">例如：关于异地就医直接结算政策的问题</p>
								</td>						
							</tr>
							<tr>
								<td class="col-sm-3 text-center bg_lable"><div>详细说明</div></td>
								<td class="col-sm-9">
									<textarea name="Form[content]"  class="form-control" rows="10" required  placeholder="请详细描述您遇到的问题"></textarea>
								</td>						
							</tr>
							
							<tr>
								<td class="col-sm-3 text-center bg_lable"><div>姓名</div></td>
								<td class="col-sm-9">
									<input type="text" name="Form[senderName]" class="form-control" required placeholder="姓名" value="<?=Yii::$app->session['userName']?>">
									<p class="help-block"></p>
								</td>						
							</tr>
							
							<tr>
								<td class="col-sm-3 text-center bg_lable"><div>联系方式</div></td>
								<td class="col-sm-9">
									<input type="text" name="Form[phone]" class="form-control" required placeholder="联系手机" value="<?=Yii::$app->session['loginName']?>">
									<p class="help-block">留下您的手机，以便将结果通知给您，我们会严格保密</p>
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
							<input class="submit" type="submit" value="提交反馈">
						</div>
						
					</form>

					<div id="uploadfile" style="display:none">

					<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

					<?= $form->field($model, 'file')->fileInput(["onchange"=>"uploadFile(this.value);","id"=>"file_info"]) ?>

					<?php ActiveForm::end() ?>
					</div> 
				</div>

			  </div>
			</div>
		</div>
	</div>
</div>
<!--底部-->
<div class="footer endFoot">
	<span>版权所有：铁西区工业云网</span>　
	<span>辽ICP备05070218号</span>　
	<span>中文域名：铁西区工业云网.政务</span>
</div>

<!-- 
<link rel="stylesheet" href="../css/datepicker.css">
<script src="../js/jquery.min.js" type="text/javascript" ></script>
<script src="../js/jquery.validate.js"  type="text/javascript" ></script>
<script src="../js/bootstrap.min.js" type="text/javascript" ></script>
<script src="../js/bootstrap-datepicker.js" type="text/javascript" ></script>
<script src="../js/apps.js" type="text/javascript" ></script> -->

<script>
window.onload=function(){ 

	//需要参考jquery validate 验证插件
	$("#commentForm").validate();
	
	//form 表单提交之后触发
	$.validator.setDefaults({
	    submitHandler: function() {
	      alert("提交事件!");
	    }
	});
	<?if(YII_QUESTION == 'v1'):?>
	if(<?=$message?> == 1){
		showAlert("pic_alert", "提交成功");
	}
	<?endif?>
	
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
	$("#file_info").click();
}
var file_input_id = 0;
/**
 * 上传文件
 * @return {[type]} [description]
 */
function uploadFile() {
    if ($("#file_info").val().length <= 0) {
        showAlert("pic_warn", "请选择文件");
        return;
    }
    var dom = document.getElementById("file_info");  
    var fileSize =  dom.files[0].size;//文件的大小，单位为字节B
    if(fileSize > 50*1024*1024){
        showAlert("pic_warn", "文件大小不能超过50M");
        return;
    }
    var str = $("#file_info").val();
    var arr=str.split('\\');//注split可以用字符或字符串分割 
    var my=arr[arr.length-1];//这就是要取得的图片名称 
    file_input_id++;
    var html = '<div id="attach'+file_input_id+'" href="#" class="attaIteam" style="display: block;"><div class="icon_del fr" style="cursor:pointer;" onclick="file_del('+file_input_id+')"></div><i class="icon_file"></i><span  id="attachName1">'+dom.files[0].name+'</span><input id="file_'+file_input_id+'" type="hidden"  name="file_list[]" value=""></div>';
    $("#file_list").append(html);
    $.ajaxFileUpload(
        {
            url: '<?=Url::to(['question/questioninfo/file-upload'])?>', //用于文件上传的服务器端请求地址
            secureuri: false, //一般设置为false
            data: { PHP_SESSION_UPLOAD_PROGRESS: 'file_progress','Form[file]':'',file_input_id:file_input_id},
            fileElementId: 'file_info', //文件上传空间的id属性  <input type="file" id="file" name="file" />
            dataType: 'json', //返回值类型 一般设置为json
            success: function (data, status)  //服务器成功响应处理函数
            {
                if(data.errcode == 0){
               		$("#file_"+data.file_input_id).val(data.file_id);
                }else{
                    showAlert("pic_warn", data.errmsg);
                }
            },
            error: function (data, status, e)//服务器响应失败处理函数
            {
                alert(e);
            }
        }
    )
	var file = $('#file_info');
    file.after(file.clone().val("")); 
    file.remove();

    return false;
}


</script>
