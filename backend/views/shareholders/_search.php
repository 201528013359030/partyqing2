<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ShareholdersinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shareholdersinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cId') ?>

    <?= $form->field($model, 'ofyear') ?>

    <?= $form->field($model, 'sName') ?>

    <?= $form->field($model, 'sType') ?>

    <?php // echo $form->field($model, 'investAmount') ?>

    <?php // echo $form->field($model, 'proportion') ?>

    <?php // echo $form->field($model, 'investTime') ?>

    <?php // echo $form->field($model, 'memo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
