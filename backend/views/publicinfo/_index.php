<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\PublicinfoMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Publicinfos';
$this->title = '公共信息';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="publicinfo-index">

    <h1><?//= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?//= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
        <?php echo $this->render('_search',['model' => $searchModel])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'Id',
            'title',
      //      'content',
        	'sender_name',
        	['attribute' => 'type',
        	 'content'=> function($dataProvider){
        	 	//return $dataProvider['menu_name'];
        	 	$menu = PublicinfoMenu::findOne(['id'=>$dataProvider['type']]);
        	 	return $menu['menu_name'];
  	  		}
    		],
        //	'type',
           // 'attach',
           // 'type',
             'readers',
            // 'sender_id',
            // 'sender_name',
            // 'createTime',
             ['attribute' => 'createTime',
             	'content' => function ($dataProvider){
             	return date('Y-m-d H:i:s',intval($dataProvider['createTime']));
    		}
    		],

            ['class' => 'yii\grid\ActionColumn',
             'template' => ' {view} ',  
             
    		],
        ],
    ]); ?>
</div>
