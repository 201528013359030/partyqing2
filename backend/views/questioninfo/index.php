<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questioninfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questioninfo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Questioninfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'qID',
            'level',
            'title',
            'content:ntext',
            'attach',
            // 'sender',
            // 'senderName',
            // 'phone',
            // 'solverDepartment',
            // 'solver',
            // 'createTime:datetime',
            // 'solveTime:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
