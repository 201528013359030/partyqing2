<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Memoinfo */

$this->title = 'Update Memoinfo: ' . $model->mID;
$this->params['breadcrumbs'][] = ['label' => 'Memoinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mID, 'url' => ['view', 'id' => $model->mID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memoinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
