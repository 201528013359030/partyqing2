<?php
use yii\helpers\Html;
?>
 
	 
<!--顶部-->

<!--中间-->
<?php 
$this->title = '错误页面';
$this->params['breadcrumbs'][] = ['label' => '错误页面', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<!--此处是内容区部分-->

<div class="outwrap">	

	

	<div class="innerwrap bg_form">

		

		<div class="innerCotent">

			<div class="formTitle">错误信息</div>

 <?php echo $tip;?>

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

