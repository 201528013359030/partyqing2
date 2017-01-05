<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Scientificinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scientificinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_uid')->textInput() ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sender_id')->textInput() ?>

    <?= $form->field($model, 'sender_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sender_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'requirement')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
