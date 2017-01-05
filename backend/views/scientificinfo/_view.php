<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Scientificinfo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Scientificinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scientificinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
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
            'Id',
            'title',
            'content',
            'createTime',
            'validTime',
            'contact_uid',
            'contact_name',
            'contact_unit',
            'sender_id',
            'sender_name',
            'sender_unit',
            'type',
            'requirement',
        ],
    ]) ?>

</div>
