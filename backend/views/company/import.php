<?php
use yii\helpers\Html;
use common\models\Industryinfo;
use common\models\SysTrade;
use common\models\Action;

/* @var $this yii\web\View */
/* @var $model common\models\Companyinfo */

//$this->title = 'Create Companyinfo';
$this->title = '导入企业';
$this->params['breadcrumbs'][] = ['label' => 'Companyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$action = new Action();
?>
<div class="innerwrap bg_form">

	<div class="innerCotent">

		<div class="formTitle"><!-- <a href="javascript:void(0)" class="mobtn mobtnSm primary_btn fr"><i class="icon_editData"></i> 编辑</a>登记信息 --></div>

		<?php //$form = ActiveForm::begin(); ?>
		<form id="commentForm" method="post" enctype="multipart/form-data" action="index.php?r=company/import&action=save" onSubmit="return form_Validator(this);">

			<!--

      	提交校验功能，必填项目  name required

      	具体用法参考

      	http://www.runoob.com/jquery/jquery-plugin-validate.html

    -->

			<table class="mytb mytbEqu" cellpadding="0" cellspacing="0">

				<tr>

					<td class="tdName">请选择需导入的Excel文件&nbsp;<img src="../web/images/star.png"></td>

					<td>
					<?php /*echo $form
                    ->field($model, 'regMark')
                    ->label(false)
                    ->textInput(['placeholder' => "",'class'=>'form-control'])*/ ?>
					<input id="impfile" name="impfile" value="" type="file" maxlength="80">
					</td>
				</tr>
				
			</table>

			<div class="buttnGroup">

				<input class="submit" type="submit" value="提交">

				<a href="javascript:void(0)" class="mobtn default_btn">取消</a>

			</div>

			

		</form>
		<?php //ActiveForm::end(); ?>

	</div>

	

</div>
<script type="text/javascript">
function form_Validator(f){
	var impfile=$("#impfile").val();
	if(impfile.length==0||impfile.length>0&&impfile.indexOf(".xls")==-1){
		alert("请选择需导入的Excel文件！");
		return false;
	}
	return true;
}
</script>