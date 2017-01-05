<?php
use yii\helpers\Html;
$this->title = '企业关系分析';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outwrap">	
	
	<div class="innerwrap container-fluid listTop">
		
		<div class="innerCotent bg_form">
		<div id="J_echartThird" style="height: 640px;"></div>
		</div>
		
	</div>
</div>
<?=Html::jsFile('@web/js/jquery.min.js')?>
<?=Html::jsFile('@web/js/echarts.min.js')?>
<?=Html::jsFile('@web/js/datatool.js')?>
<?=Html::jsFile('@web/js/tj_circular.js')?>
