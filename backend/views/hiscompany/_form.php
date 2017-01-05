<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hiscompanyinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hiscompanyinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'space')->textInput() ?>

    <?= $form->field($model, 'products')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employees')->textInput() ?>

    <?= $form->field($model, 'production')->textInput() ?>

    <?= $form->field($model, 'investments')->textInput() ?>

    <?= $form->field($model, 'taxes')->textInput() ?>

    <?= $form->field($model, 'operateStatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ofIndustry')->textInput() ?>

    <?= $form->field($model, 'creator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'memo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updateTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updateOperator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checked')->textInput() ?>

    <?= $form->field($model, 'checkOpinion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checkTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assets')->textInput() ?>

    <?= $form->field($model, 'debts')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
