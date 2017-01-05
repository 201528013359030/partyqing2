<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Historycompanyinfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Historycompanyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historycompanyinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'cName',
            'intro',
            'position',
            'space',
            'products',
            'employees',
            'production',
            'investments',
            'taxes',
            'operateStatus',
            'ofIndustry',
            'creator',
            'createTime',
            'memo',
            'updateTime',
            'updateOperator',
            'checked',
            'checkOpinion',
            'checkTime',
            'assets',
            'debts',
        ],
    ]) ?>

</div>
