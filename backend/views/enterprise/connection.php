<?php
use yii\helpers\Html;
$this->title = '企业社交挖掘分析';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outwrap">	
	
	<div class="innerwrap container-fluid listTop">
		
		<div class="innerCotent bg_form">
		<div id="J_echartThird" style="height: 540px;"></div>
		</div>
		
	</div>
</div>
<?=Html::jsFile('@web/js/jquery.min.js')?>
<?=Html::jsFile('@web/js/echarts.min.js')?>
<?=Html::jsFile('@web/js/datatool.js')?>
<?=Html::jsFile('@web/js/tj.js')?>
