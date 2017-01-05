<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HistorycompanyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicinfomenu-index">

    <h1><?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建', ['menucreate'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'menu_name',
        	['attribute' => 'menu_icon',
        		'content'=>function($dataProvider){
        			if ($dataProvider['menu_icon']!=""||$dataProvider['menu_icon']!=null)
					return '<img src="'.$dataProvider['menu_icon'].'"/>';
        			//return $dataProvider['menu_icon'];
   				 }
   			],   			

            ['class' => 'yii\grid\ActionColumn',
           	 'template' =>'{menuupdate}{menudelete}',
             'buttons' => [
             	'menuupdate' => function ($url, $model, $key) {
             	$options = [
             			'title' => Yii::t('yii', '修改菜单'),
             			'aria-label' => Yii::t('yii', '修改菜单'),
             			'data-pjax' => '0',
             	];
             	return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
   				},
   				'menudelete' => function ($url, $model, $key) {
   				$options = [
   						'title' => Yii::t('yii', '删除菜单'),
   						'aria-label' => Yii::t('yii', '删除菜单'),
   						'data-pjax' => '0',
   				];
   				return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
   				}
   				]
   			],
        ],
    ]); ?>
</div>
