<?php
//use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?=Html::jsFile('@web/js/jquery.js')?>
<?php 
$this->title = '修改菜单';
//$this->params['breadcrumbs'][] = ['label' => 'Publicinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '菜单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
function upload_btn_click(){

	document.getElementById("upload_button").click();
}

function upload_fun(x){
    var file = $('#upload_button').get(0).files[0];
  	var filetype = $("#publicinfoform-filetype").attr('value');
    if (file) {
        var fileSize = 0;
        var errorSize = 0;
        var str = "";
        if (file.size > 10*1024){ 
            alert('文件大小不能大于10M');
            return false;
        }else{ 
            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
        }
            if (!/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name)) {  
                alert("图片类型必须是.gif,jpeg,jpg,png中的一种");  
                return false;  
            }  
        console.log(file.name, fileSize, file.type);
    }
    //$("#taskID").val(++taskID);
    document.upload_form.submit();
}
function upload_file_end(result,state,str,fileinfo){
	$('#publicinfomenu-menu_icon').attr('value',JSON.stringify(fileinfo));
	$('#icon').children('img').remove();
	$('#icon').append('<img alt="'+fileinfo.name+'" src="'+fileinfo.path+'">');
}
</script>

<div class="publicinfomenu-form">
    <?php $form = ActiveForm::begin(['action'=>['menusave'],'method'=>'post']); ?>
    <div style="display: none">
    	<?=$form->field($model, 'id')->hiddenInput()?>
    	<?= $form->field($model, 'menu_icon')->hiddenInput() ?>    
    </div>
    <?= $form->field($model, 'menu_name')->textInput(['maxlength' => true]) ?>
    <div class='form-group'>
    	<div >
    		<span style="margin-bottom: 5px;font-weight:bold">图标</span>
    		<span style="margin-left:5px" onclick='upload_btn_click()'>点击修改图片</span></div>
    	
    	<div id='icon'>
    	<?php 
    	if ($model['menu_icon']!=""||$model['menu_icon']!=null)
			echo '<img src="'.$model['menu_icon'].'"/>';
    		//echo $model['menu_icon'];
    	?>
    	</div>	
    	
    </div>

    <div class="form-group">
        <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
	<div id="uploadfile" style="display:none">
		<form name="upload_form" id="upload_form" class="upload_form"  method="post" target='upload_frame' enctype="multipart/form-data" action="index.php?r=publicinfo/menuupdate&id=<?=$model['id'] ?>">
			<!--input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);"-->
<!--             <input id="taskID" type="hidden" name="taskID" value=0> -->
			<input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);">
			<iframe id="upload_frame" name="upload_frame" style="display:none"></iframe>
		</form> 
	</div>
</div>