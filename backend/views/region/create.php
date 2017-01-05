<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Regioninfo */

$this->title = 'Create Regioninfo';
$this->params['breadcrumbs'][] = ['label' => 'Regioninfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regioninfo-create">

    <!-- <h1><?//= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
