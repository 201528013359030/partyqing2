<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Enterprise */

$this->title = 'Update Enterprise: ' . $model->eid;
$this->params['breadcrumbs'][] = ['label' => 'Enterprises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eid, 'url' => ['view', 'id' => $model->eid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enterprise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
