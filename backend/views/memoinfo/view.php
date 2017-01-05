<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Memoinfo */

$this->title = $model->mID;
$this->params['breadcrumbs'][] = ['label' => 'Memoinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memoinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mID], [
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
            'mID',
            'qID',
            'content:ntext',
            'sender',
            'senderName',
            'createTime:datetime',
        ],
    ]) ?>

</div>
