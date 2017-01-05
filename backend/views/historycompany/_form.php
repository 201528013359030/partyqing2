<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Historycompanyinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historycompanyinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'space')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'products')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employees')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'investments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operateStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ofIndustry')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'memo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updateTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updateOperator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checked')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkOpinion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assets')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debts')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
