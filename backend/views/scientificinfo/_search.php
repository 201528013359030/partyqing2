<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScientificinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scientificinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'createTime') ?>

    <?= $form->field($model, 'validTime') ?>

    <?php // echo $form->field($model, 'contact_uid') ?>

    <?php // echo $form->field($model, 'contact_name') ?>

    <?php // echo $form->field($model, 'contact_unit') ?>

    <?php // echo $form->field($model, 'sender_id') ?>

    <?php // echo $form->field($model, 'sender_name') ?>

    <?php // echo $form->field($model, 'sender_unit') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'requirement') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
