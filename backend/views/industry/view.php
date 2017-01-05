<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Industryinfo */

//$this->title = $model->id;
$this->title = "行业信息详情";
$this->params['breadcrumbs'][] = ['label' => 'Industryinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industryinfo-view">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'iName',
            //'type',
            ['attribute' => 'type',  'value' => Yii::$app->params['industrytype'][$model->type] ],
            'intro',
            'memo',
        ],
    ]) ?>

</div>
