<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SysTrade */

$this->title = 'Create Sys Trade';
$this->params['breadcrumbs'][] = ['label' => 'Sys Trades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-trade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
