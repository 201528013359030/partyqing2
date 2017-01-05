<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Industryinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="industryinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iName')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'type')->dropDownList(Yii::$app->params["industrytype"],['prompt'=>'请选择',
			'style'=>'width:px',
			]) ?>
    
    <?= $form->field($model, 'intro')->textarea() ?>

    <?= $form->field($model, 'memo')->textarea()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
