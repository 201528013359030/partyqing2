<?php
use yii\helpers\Html;
$this->title = '企业信息统计';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outwrap">	
	
	<div class="innerwrap container-fluid listTop">

		

		<div class="tableControl">

			<form class="form-inline" role="form" method="post" action="index.php?r=enterprise/equ">

				<div class="form-group">			    

			    	<label class="sr-only">类型</label>

			      <select class="form-control" name="domain" id="domain">

							 <!--  <option>请选择功能区</option> -->

							  <option>全部功能区</option>

							  <!-- <option>中德高端装备制造产业园</option>

							  <option>先进装备制造产业园</option>

							  <option>中法生态城</option>

							  <option>化工医药产业园</option>

							  <option>商住服务聚集区</option>

							  <option>现代建筑产业园</option>

							  <option>西部新城</option> -->
							  <?php echo $domainOptions;?>

							</select>

			  </div>

			 

			  <button type="submit" class="mobtn primary_btn">开始查询</button>

			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			  <a href="data_detail.html" class="mobtn second_btn"><i class="icon_editData"></i> 查看数据表</a>

			</form>

		</div>

		

		<div class="innerCotent bg_form">

			

			<div class="formTitle">功能区企业分布</div>

			<div id="J_barEquPie"  class="chartBox" style="height: 360px;">

				

			</div>

			<br>

			

			<div class="formTitle">经济类型</div>

			<div id="J_barEquEType"  class="chartBox" style="height: 400px;">

				

			</div>

			<div class="row-tab">行业分类</div>

			<div class="formTitle">功能区企业分布</div>

			<div id="J_barEquWType"  class="chartBox" style="height: 400px;">

				

			</div>

			

			<div class="formTitle">企业规模</div>

			<div id="J_barEquScale"  class="chartBox" style="height: 400px;">

				

			</div>

		

		

		</div>

		

		

		

	</div>
</div>
<?=Html::jsFile('@web/js/jquery.min.js')?>
<?=Html::jsFile('@web/js/echarts.min.js')?>
<?=Html::jsFile('@web/js/echart_equ.js')?>
<script>

$(document).ready(function(){

	var foundtimeJson = '<?php echo $foundtimeJson?>';
	var regtypeJson = '<?php echo $regtypeJson?>';
	var industryJson = '<?php echo $industryJson?>';
	var scaleJson = '<?php echo $scaleJson?>';
	barEquPie(foundtimeJson);

	barEquEType(regtypeJson);

	barEquWType(industryJson);

	barEquScale(scaleJson);

})

</script>
