<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Projectinfo */

$this->title = '编辑项目信息';
$this->params['breadcrumbs'][] = ['label' => 'Projectinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="projectinfo-update">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
