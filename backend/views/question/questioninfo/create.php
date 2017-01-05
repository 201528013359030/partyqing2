<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Questioninfo */

$this->title = 'Create Questioninfo';
$this->params['breadcrumbs'][] = ['label' => 'Questioninfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questioninfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
