<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pName') ?>

    <?= $form->field($model, 'intro') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'ofCmp') ?>

    <?php // echo $form->field($model, 'ofIndustry') ?>

    <?php // echo $form->field($model, 'creator') ?>

    <?php // echo $form->field($model, 'createTime') ?>

    <?php // echo $form->field($model, 'manager') ?>

    <?php // echo $form->field($model, 'checked') ?>

    <?php // echo $form->field($model, 'checkOpinion') ?>

    <?php // echo $form->field($model, 'checkTime') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'background') ?>

    <?php // echo $form->field($model, 'targetIncome') ?>

    <?php // echo $form->field($model, 'beneficiary') ?>

    <?php // echo $form->field($model, 'plan') ?>

    <?php // echo $form->field($model, 'schedule') ?>

    <?php // echo $form->field($model, 'structure') ?>

    <?php // echo $form->field($model, 'expenseControl') ?>

    <?php // echo $form->field($model, 'evaluation') ?>

    <?php // echo $form->field($model, 'memo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
