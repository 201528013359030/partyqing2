<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Extrainfo */

$this->title = 'Create Extrainfo';
$this->params['breadcrumbs'][] = ['label' => 'Extrainfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extrainfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
