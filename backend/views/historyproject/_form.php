<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Historyprojectinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historyprojectinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ofCmp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ofIndustry')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checked')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkOpinion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'background')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'targetIncome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beneficiary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'schedule')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'structure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expenseControl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'evaluation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'memo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updateTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updateOperator')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
