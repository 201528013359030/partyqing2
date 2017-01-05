<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Shareholdersinfo */

$this->title = 'Update Shareholdersinfo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shareholdersinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shareholdersinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
