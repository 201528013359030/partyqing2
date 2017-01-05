<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Industryinfo;

/* @var $this yii\web\View */
/* @var $model common\models\Companyinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companyinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cName')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'ofIndustry')->dropDownList(ArrayHelper::map(Industryinfo::find()->all(), 'id', 'iName'),
			['prompt'=>'请选择',
			'style'=>'width:px',
			]); ?>

    <?= $form->field($model, 'products')->textarea() ?>   
    
    <?= $form->field($model, 'intro')->textarea() ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'space')->textInput() ?> 

    <?= $form->field($model, 'employees')->textInput() ?>
    
    <!-- 
    
    <?//= $form->field($model, 'production')->textInput() ?>

    <?//= $form->field($model, 'investments')->textInput() ?>

    <?//= $form->field($model, 'taxes')->textInput() ?>

    <?//= $form->field($model, 'operateStatus')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'creator')->textInput(['maxlength' => true]) ?>
    
    <?=$form->field($model, 'creator')->hiddenInput()->label('') ?>

    <?//= $form->field($model, 'createTime')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'checked')->textInput() ?>

    <?//= $form->field($model, 'checkOpinion')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'checkTime')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'assets')->textInput() ?>

    <?//= $form->field($model, 'debts')->textInput() ?>
    
     -->

    <?= $form->field($model, 'memo')->textarea()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
