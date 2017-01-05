<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industryinfo */

//$this->title = 'Update Industryinfo: ' . $model->id;
$this->title = '行业信息编辑';
$this->params['breadcrumbs'][] = ['label' => 'Industryinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="industryinfo-update">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
