<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '铁西区（开发区）企业云服务平台';

$fieldOptions1 = [
    'options' => ['class' => 'inpUser'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<?=Html::cssFile('@web/css/bootstrap.min.css')?>
<?=Html::cssFile('@web/css/apps.css')?>
<!--[if lt IE 9]>
<?=Html::jsFile('@web/js/html5shiv.min.js')?>
<?=Html::jsFile('@web/js/respond.min.js')?>
<![endif]-->
<style>

html,body,.loginwrap{ height: 100%;}

</style>
<div class="loginwrap">

	<div class="loginBox">
	    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
		<div class="loginInner">		

			<div class="inp_user">
    			<?php echo $form
                ->field($model, 'username')
                ->label(false)
                ->textInput(['placeholder' => "请输入用户名",'class'=>'inpUser']) ?>
                
                
			</div>
			

			<div class="inp_psw">			     
			     <?php echo $form
                ->field($model, 'password')
                ->label(false)
                ->passwordInput(['placeholder' => "请输入密码",'class'=>'inpPsw']) ?>
			</div>

			<div class="inp_checkme">

				
				<?php echo $form
				->field($model, 'rememberMe')
				->label(false)
				->checkbox(['class'=>'inpcheck']) ?>
				
				<input class="inpcheck" type="checkbox" name="" value="">
                
				<a class="check" href="javascript:void(0);"></a>

				<a class="check checked" href="javascript:void(0);"></a>

			</div>

		</div>

		<div class="loginLeftBtm"></div>

		<div class="inp_submit">

			<a href="javascript:void(0);" class="btn_link_submit" name="login-button" onclick="$('#login-form').submit()">&nbsp;</a>

		</div>
		<?php ActiveForm::end(); ?>

	</div>

</div>
<!-- 
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>
 -->
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
