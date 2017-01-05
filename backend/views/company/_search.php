<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companyinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'id') ?>

    <?= $form->field($model, 'cName') ?>

    <?php //echo $form->field($model, 'intro') ?>

    <?= $form->field($model, 'position') ?>

    <?php //echo $form->field($model, 'space') ?>

    <?php  echo $form->field($model, 'products') ?>

    <?php // echo $form->field($model, 'employees') ?>

    <?php // echo $form->field($model, 'production') ?>

    <?php // echo $form->field($model, 'investments') ?>

    <?php // echo $form->field($model, 'taxes') ?>

    <?php // echo $form->field($model, 'operateStatus') ?>

    <?php // echo $form->field($model, 'ofIndustry') ?>

    <?php // echo $form->field($model, 'creator') ?>

    <?php // echo $form->field($model, 'createTime') ?>

    <?php // echo $form->field($model, 'checked') ?>

    <?php // echo $form->field($model, 'checkOpinion') ?>

    <?php // echo $form->field($model, 'checkTime') ?>

    <?php // echo $form->field($model, 'assets') ?>

    <?php // echo $form->field($model, 'debts') ?>

    <?php // echo $form->field($model, 'memo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
