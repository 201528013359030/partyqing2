<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EnterpriseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enterprise-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'eid') ?>

    <?= $form->field($model, 'ename') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'ofIndustry') ?>

    <?= $form->field($model, 'intro') ?>

    <?php // echo $form->field($model, 'phoneNumber') ?>

    <?php // echo $form->field($model, 'faxNumber') ?>

    <?php // echo $form->field($model, 'license') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'memo') ?>

    <?php // echo $form->field($model, 'isOpen') ?>

    <?php // echo $form->field($model, 'uid') ?>

    <?php // echo $form->field($model, 'vision') ?>

    <?php // echo $form->field($model, 'officeAddress') ?>

    <?php // echo $form->field($model, 'contacts') ?>

    <?php // echo $form->field($model, 'postCode') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'webSite') ?>

    <?php // echo $form->field($model, 'defaultTypes') ?>

    <?php // echo $form->field($model, 'centrexNumber') ?>

    <?php // echo $form->field($model, 'outPrefix') ?>

    <?php // echo $form->field($model, 'offlinemsgpath') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
