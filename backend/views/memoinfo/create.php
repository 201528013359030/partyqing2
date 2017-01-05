<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Memoinfo */

$this->title = 'Create Memoinfo';
$this->params['breadcrumbs'][] = ['label' => 'Memoinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memoinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
