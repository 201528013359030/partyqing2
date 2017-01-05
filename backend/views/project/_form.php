<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Industryinfo;
use common\models\Companyinfo;

/* @var $this yii\web\View */
/* @var $model common\models\Projectinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pName')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'ofCmp')->dropDownList(ArrayHelper::map(Companyinfo::find()->all(), 'id', 'cName'),
			['prompt'=>'请选择',
			'style'=>'width:px',
			]); ?>
			
    <?= $form->field($model, 'ofIndustry')->dropDownList(ArrayHelper::map(Industryinfo::find()->all(), 'id', 'iName'),
			['prompt'=>'请选择',
			'style'=>'width:px',
			]); ?>
    
    <?= $form->field($model, 'intro')->textarea() ?>        

    <?= $form->field($model, 'manager')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params["projectStatus"],['prompt'=>'请选择',
			'style'=>'width:px',
			]) ?>
    
    <?= $form->field($model, 'background')->textarea() ?>
    
    <?= $form->field($model, 'memo')->textarea() ?>
    
    <!-- 
    
    <?//= $form->field($model, 'creator')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'createTime')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'checked')->textInput() ?>

    <?//= $form->field($model, 'checkOpinion')->textarea()?>

    <?//= $form->field($model, 'checkTime')->textInput(['maxlength' => true]) ?>        

    <?//= $form->field($model, 'targetIncome')->textInput() ?>

    <?//= $form->field($model, 'beneficiary')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'plan')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'schedule')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'structure')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'expenseControl')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'evaluation')->textInput(['maxlength' => true]) ?>
    
     -->    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
