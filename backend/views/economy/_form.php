<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Economyinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="economyinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cId')->textInput() ?>

    <?= $form->field($model, 'ofyear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assets')->textInput() ?>

    <?= $form->field($model, 'ownersEquity')->textInput() ?>

    <?= $form->field($model, 'revenue')->textInput() ?>

    <?= $form->field($model, 'profit')->textInput() ?>

    <?= $form->field($model, 'mainBusiness')->textInput() ?>

    <?= $form->field($model, 'retainedProfits')->textInput() ?>

    <?= $form->field($model, 'totalTax')->textInput() ?>

    <?= $form->field($model, 'totalDebts')->textInput() ?>

    <?= $form->field($model, 'employees')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'stockTransfer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'investment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'memo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
