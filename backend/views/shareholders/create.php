<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Shareholdersinfo */

$this->title = 'Create Shareholdersinfo';
$this->params['breadcrumbs'][] = ['label' => 'Shareholdersinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shareholdersinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
