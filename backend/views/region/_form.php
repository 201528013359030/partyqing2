<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Regioninfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regioninfo-form">

    <?php $form = ActiveForm::begin(); ?>    

    <?= $form->field($model, 'aID')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'aName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personNum')->textInput() ?>

    <?= $form->field($model, 'familyNum')->textInput() ?>

    <?= $form->field($model, 'memo')->textarea()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
