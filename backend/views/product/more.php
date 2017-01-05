<?php
use common\models\PublicinfoMenu;
use yii\helpers\Html;
use common\models\PublicinfoApi;
use yii\widgets\LinkPager;
use yii\base\Widget;
use common\models\ProductMenu;
?>

<!--中间-->

<?php 
$this->title = '信息列表';
$this->params['breadcrumbs'][] = $this->title;
?>



<!--



描述：中间内容区替换内容

-->



<div class="outwrap">



<div class="innerwrap container-fluid listTop">

<table class="tableList" cellpadding="0" cellspacing="0">

<tr>

<th class="num">序号</th>

<th>标题</th>

<th class="username">联系人</th>

<th class="type">联系方式</th>

<th class="type">类型</th>

<th class="daytime">发布时间</th>

</tr>

<?php //if(Yii::$app->request->get('page')==null)  $page=1; else $page=Yii::$app->request->get('page');?>
<?php foreach ($lists as $key =>$list):?>
<tr>
<td class="num"><?=Html::encode($key+1+($page-1)*$pagination->defaultPageSize)?></td>

<td><a href="index.php?r=product/req-detail&id=<?=Html::encode($list['Id'])?>"><?=Html::encode($list['title'])?></a></td>


<td class="username"><?=Html::encode($list['contact_name'])?></td>

<td class="type"><?php echo $list['contact_tel']?></td>

<td class="type"><?php echo ProductMenu::findOne(['id'=>$list['type']])->name?></td>



<td class="day"><?php echo date('Y-m-d H:i',intval($list['createTime']));?></td>

</tr>

<?php endforeach;?>
</table>

<div class="pageBtm">

<nav>
<!--
<ul class="pagination">

<li>
-->
	<?= LinkPager::widget(['pagination' => $pagination,'maxButtonCount' => 5,'hideOnSinglePage'=>false]) ?>
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

<!--</ul>-->

<div class="form-inline">

<p class="form-control-static">跳转到：</p>

<div class="form-group">

<div class="input-group">

<input class="form-control" type="text" id='goPage'>

<div class="input-group-addon"><a class="picon" href="javascript:void(0);" onclick="goPage();">GO</a></div>

</div>

</div>

</div>

<div class="form-inline"> <p class="form-control-static">第<?php echo $page ?>页/共<?php echo ceil($pagination->totalCount/$pagination->getPageSize())?>页</p> </div>

</nav>
</div>
</div>
</div>
<script type="text/javascript">
	function goPage(){
			var totalPage= <?php echo ceil($pagination->totalCount/$pagination->getPageSize())?>;
			var page = $('#goPage').val();
			if(!(parseInt(page)>=1 && parseInt(page)<=parseInt(totalPage))){
				showAlert("pic_error", "请输入有效页码");
		         return;
			}
			var url = window.location.href;
			if(url.lastIndexOf('page')>0){
				url = url.replace('&page=<?php if(Yii::$app->request->get('page')!="") echo Yii::$app->request->get('page');?>','&page='+page);
				window.location.href = url;
			}else{
				window.location.href = url+"&page="+page;
			}
	}

</script>





