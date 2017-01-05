<?php
use yii\helpers\Html;
use common\models\PublicinfoApi;
use yii\widgets\LinkPager;
use yii\base\Widget;
?>

<!--中间-->

<?php 
$this->title = '订阅详情';
$this->params['breadcrumbs'][] = $this->title;
?>



<!--



描述：中间内容区替换内容

-->



<div class="outwrap">

<?php $type = Yii::$app->request->get('type')?>

<div class="innerwrap container-fluid listTop">

<div class="formTitle"><a href="index.php?r=publicinfo/subscribeindex">返回上一页</a></div>

<div class="tableControl">

<form class="form-inline" role="form" action="index.php" method="get">
<input type="hidden" name="r" value='publicinfo/subscribedetail'>
<input type="hidden" name="type" value='<?php echo $type?>'>
<div class="form-group">

<label class="sr-only">排序方式</label>

<select class="form-control" name='info[order]'>

<option value='1'>默认排序</option>

<option value='2'>按订阅时间升序排序</option>

<option value='3'>按订阅时间降序排序</option>

</select>

</div>

<div class="form-group">

<label class="sr-only">发布者</label>

<input type="text" class="form-control" placeholder="订阅人" name="info[username]">

</div>

<button type="submit" class="mobtn primary_btn">开始查询</button>

</form>

</div>


<table class="tableList" cellpadding="0" cellspacing="0">

<tr>

<th class="num">序号</th>

<th class="username">订阅人</th>

<th class="day">订阅时间</th>

</tr>

<?php if(Yii::$app->request->get('page')==null)  $page=1; else $page=Yii::$app->request->get('page');?>
<?php foreach ($subscribeList as $key =>$subscribe):?>
<tr>

<td class="num"><?=Html::encode($key+1+($page-1)*$pagination->defaultPageSize)?></td>

<td class="username"><?=Html::encode($subscribe['username'])?></td>

<td class="day"><?php echo date('Y-m-d H:i:s',intval($subscribe['createTime']));?></td>

<?php endforeach;?>
</table>

<div class="pageBtm">

<nav>
	<?= LinkPager::widget(['pagination' => $pagination]) ?>

<div class="form-inline">

<p class="form-control-static">跳转到：</p>

<div class="form-group">

<div class="input-group">

<input class="form-control" type="text" id='goPage'>

<div class="input-group-addon"><a class="picon" href="javascript:void(0);">GO</a></div>

</div>

</div>

</div>

<div class="form-inline"> <p class="form-control-static">共<?php echo ceil($pagination->totalCount/$pagination->getPageSize())?>页</p> </div>

</nav>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.picon').click(function(){
		//alert('ddd');
		var page = $('#goPage').val();
		var url = window.location.href;
		if(url.lastIndexOf('page')>0){
			url = url.replace('&page='+<?php if(Yii::$app->request->get('page')==null) echo 1; else echo Yii::$app->request->get('page');?>,'&page='+page);
			window.location.href = url;
		}else{
			window.location.href = url+"&page="+page;
		}

		//alert(page);
	});
});
</script>





