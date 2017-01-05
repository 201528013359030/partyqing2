<?php
use yii\helpers\Html;
use common\models\PublicinfoApi;
?>

<!--中间-->

<?php 
$this->title = '订阅信息统计';
$this->params['breadcrumbs'][] = $this->title;
?>



<!--



描述：中间内容区替换内容

-->



<div class="outwrap">



<div class="innerwrap container-fluid listTop">



<div class="tableControl">

<form class="form-inline" role="form" action="index.php" method="get">
<input type="hidden" name="r" value='publicinfo/subscribeindex'>
<div class="form-group">

<label class="sr-only">类型</label>

<select class="form-control" name='info[type]'>

<option value='0'>请选择类型</option>

<?php 
 	$ws = new PublicinfoApi();
 	$info ="{}";
 	$menus = $ws->getPublicinfoMenuList($info);
 	foreach ($menus as $menu):
?>
 
<option value='<?=Html::encode($menu['id'])?>'><?=Html::encode($menu['menu_name'])?></option>

<?php endforeach;?>

</select>

</div>

<div class="form-group">

<label class="sr-only">排序方式</label>

<select class="form-control" name='info[order]'>

<option value='1'>默认排序</option>

<option value='2'>按订阅数升序排序</option>

<option value='3'>按订阅数降序排序</option>

</select>

</div>

<button type="submit" class="mobtn primary_btn">开始查询</button>

</form>

</div>


<table class="tableList" cellpadding="0" cellspacing="0">

<tr>

<th class="num">序号</th>

<th class="type">类型</th>

<th class="username">订阅数</th>

<th class="op">操作</th>

</tr>

<?php //if(Yii::$app->request->get('page')==null)  $page=1; else $page=Yii::$app->request->get('page');?>
<?php foreach ($subscribeList as $key =>$subscribe):?>
<tr>

<td class="num"><?=Html::encode($key+1)?></td>

<td class="type"><?=Html::encode($subscribe['menu_name'])?></td>

<td class="username"><?=Html::encode($subscribe['total'])?></td>

<td class="op op_1">

	<input style='display: none' id='id' value=''>					
		<a href="index.php?r=publicinfo/subscribedetail&type=<?php echo $subscribe['type']?>" class="mobtn mobtnSm primary_btn">查看</a>
	</td>		

</tr>

<?php endforeach;?>
</table>

<!-- <div class="pageBtm"> -->

<!-- <nav> -->
<!--
<ul class="pagination">

<li>
-->
	<? //= LinkPager::widget(['pagination' => $pagination]) ?>
	<!--
</li>
-->
<!-- <li class="disabled"><a href="#">«</a></li> -->

<!-- <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li> -->

<!-- <li><a href="#">2</a></li> -->

<!-- <li><a href="#">3</a></li> -->

<!-- <li><a href="#">4</a></li> -->

<!-- <li><a href="#">5</a></li> -->

<!-- <li><a href="#">»</a></li> -->

<!-- </ul> -->

<!-- <div class="form-inline"> -->

<!-- <p class="form-control-static">跳转到：</p> -->

<!-- <div class="form-group"> -->

<!-- <div class="input-group"> -->

<!-- <input class="form-control" type="text" id='goPage'> -->

<!-- <div class="input-group-addon"><a class="picon" href="javascript:void(0);">GO</a></div> -->

<!-- </div> -->

<!-- </div> -->

<!-- </div> -->

<!-- <div class="form-inline"> <p class="form-control-static">共1页</p> </div> -->

<!-- </nav> -->
<!-- </div> -->
</div>
</div>
<script type="text/javascript">
</script>





