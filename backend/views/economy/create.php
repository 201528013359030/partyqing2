<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Economyinfo */

$this->title = 'Create Economyinfo';
$this->params['breadcrumbs'][] = ['label' => 'Economyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="economyinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
