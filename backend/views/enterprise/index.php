<?php
use yii\helpers\Html;
$this->title = '一二三产业经济数据';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outwrap">	
	
	<div class="innerwrap container-fluid listTop">
		
		<div class="tableControl">
			<form class="form-inline" role="form">
				<div class="form-group">			    
			    	<label class="sr-only">类型</label>
			      <select class="form-control">
							  <option>请选择类型</option>
							  <option>类型一</option>
							  <option>类型二</option>
							</select>
			  </div>
			  <div class="form-group">
			    <label class="sr-only">开始时间</label>
			    <input type="text" class="form-control form_datetime" placeholder="开始时间">
			  </div>
			  <div class="form-group">
			    <label class="sr-only">结束时间</label>
			    <input type="text" class="form-control form_datetime" placeholder="结束时间">
			  </div>
			  <button type="submit" class="mobtn primary_btn">开始查询</button>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <a href="data_detail.html" class="mobtn second_btn"><i class="icon_editData"></i> 查看数据表</a>
			</form>
		</div>
		
		<div class="innerCotent bg_form">
		<div id="J_echartThird" style="height: 540px;"></div>
		</div>
		
		
		
	</div>
</div>
<?=Html::jsFile('@web/js/echarts.min.js')?>
<?=Html::jsFile('@web/js/echart_third.js')?>
