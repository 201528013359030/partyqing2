<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use common\models\PublicinfoMenu;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?//= $form->field($model, 'Id') ?>

    <?//= $form->field($model, 'title') ?>

    <?//= $form->field($model, 'content') ?>

    <?//= $form->field($model, 'attach') ?>

    <?//= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'readers') ?>

    <?php // echo $form->field($model, 'sender_id') ?>

    <?php // echo $form->field($model, 'sender_name') ?>

    <?php // echo $form->field($model, 'createTime') ?>
    <?php $menu = PublicinfoMenu::find()->all();?>

    <div class="row">
        <div class="col-sm-3"><?= $form->field($model, 'type')->dropDownList(ArrayHelper::map($menu, 'id','menu_name'),['prompt'=>'所有']) ?></div>
        <div class="col-sm-3"><?= $form->field($model, 'title') ?></div>
        <div class="col-sm-3"><?= $form->field($model, 'sender_name') ?></div>      
        <div class="col-sm-3"><?php  echo $form->field($model, 'createTime')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'yy-mm-dd']])->textInput(['placeholder' => Yii::t('app', '发布时间'),'readonly'=>true,'class'=>'form_datetime form-control']) ?>
	</div>      
        <div class="col-sm-3">
            <div class="form-group">
                <?= Html::submitButton('查询', ['class' => 'btn btn-primary','style'=>'margin-top: 25px;']) ?>
                <?//= Html::resetButton('重置', ['class' => 'btn btn-default','style'=>'margin-top: 25px;margin-left:5px']) ?>
            </div>
        </div>      
        <!--div class="col-sm-3"><?//= $form->field($model, 'receiverType') ?></div-->      
    </div>
<!--     <div class="form-group"> -->
        <?//= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
<!--     </div> -->

    <?php ActiveForm::end(); ?>

</div>
