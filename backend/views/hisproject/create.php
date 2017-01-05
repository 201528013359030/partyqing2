<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hisprojectinfo */

$this->title = 'Create Hisprojectinfo';
$this->params['breadcrumbs'][] = ['label' => 'Hisprojectinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hisprojectinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
