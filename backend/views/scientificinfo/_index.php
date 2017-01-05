<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScientificinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scientificinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scientificinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Scientificinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'title',
            'content',
            'createTime',
            'validTime',
            // 'contact_uid',
            // 'contact_name',
            // 'contact_unit',
            // 'sender_id',
            // 'sender_name',
            // 'sender_unit',
            // 'type',
            // 'requirement',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
