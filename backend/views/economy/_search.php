<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EconomyinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="economyinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cId') ?>

    <?= $form->field($model, 'ofyear') ?>

    <?= $form->field($model, 'assets') ?>

    <?= $form->field($model, 'ownersEquity') ?>

    <?php // echo $form->field($model, 'revenue') ?>

    <?php // echo $form->field($model, 'profit') ?>

    <?php // echo $form->field($model, 'mainBusiness') ?>

    <?php // echo $form->field($model, 'retainedProfits') ?>

    <?php // echo $form->field($model, 'totalTax') ?>

    <?php // echo $form->field($model, 'totalDebts') ?>

    <?php // echo $form->field($model, 'employees') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'stockTransfer') ?>

    <?php // echo $form->field($model, 'investment') ?>

    <?php // echo $form->field($model, 'memo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
