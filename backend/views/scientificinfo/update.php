<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Scientificinfo */

$this->title = 'Update Scientificinfo: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Scientificinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scientificinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
