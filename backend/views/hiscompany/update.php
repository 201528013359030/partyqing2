<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hiscompanyinfo */

$this->title = 'Update Hiscompanyinfo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hiscompanyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hiscompanyinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
