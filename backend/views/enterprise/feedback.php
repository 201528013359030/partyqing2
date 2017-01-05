<?php
use yii\helpers\Html;
$this->title = '服务反馈统计';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outwrap">	
	
	<div class="innerwrap container-fluid listTop">

		

		

		<div class="innerCotent bg_form">

			

			<div class="formTitle">功能区统计</div>

			<div id="J_barFeedbackArea"  class="chartBox" style="height: 500px;">

	

			</div>

			

			<div class="formTitle">政府人员统计</div>

			<div id="J_barFeedbackPeople"  class="chartBox" style="height: 500px;">

	

			</div>

			

		

		

		</div>

		

		

		

	</div>
</div>
<?=Html::jsFile('@web/js/jquery.min.js')?>
<?=Html::jsFile('@web/js/echarts.min.js')?>
<?=Html::jsFile('@web/js/echart_feedback.js')?>
<script>

$(document).ready(function(){

	barFeedbackArea();

	barFeedbackPeople();

})

</script>
