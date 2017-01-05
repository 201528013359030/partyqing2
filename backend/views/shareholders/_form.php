<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Shareholdersinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shareholdersinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cId')->textInput() ?>

    <?= $form->field($model, 'ofyear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'investAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proportion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'investTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'memo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
