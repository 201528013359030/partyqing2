<?php
use common\models\PublicinfoMenu;
use yii\helpers\Html;
use common\models\PublicinfoApi;
use yii\widgets\LinkPager;
use yii\base\Widget;
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



<div class="tableControl">

<form class="form-inline" role="form" action="index.php?r=publicinfo/index" method="get">
<input type="hidden" name="r" value='publicinfo/index'>
<div class="form-group">

<label class="sr-only">类型</label>

<select class="form-control" name='info[type]'>

<option value=''>请选择类型</option>

<?php 
	$ws = new PublicinfoApi();
	$info ="{}";
	$menus = $ws->getPublicinfoMenuList($info);
	foreach ($menus as $menu):
	//var_dump($menu);
?>
<option value='<?=Html::encode($menu['id'])?>' <?php if(isset($search['type'])&&$search['type']==$menu['id']) echo 'selected'?>><?=Html::encode($menu['menu_name'])?></option>

<?php endforeach;?>

<!-- <option>类型一</option> -->

<!-- <option>类型二</option> -->

</select>

</div>
<?php //echo Yii::$app->request->get('info') ; echo "ddd";?>
<div class="form-group">

<label class="sr-only">标题</label>

<input type="text" class="form-control" placeholder="标题" name="info[title]" value="<?php echo isset($search['title'])?$search['title']:""?>">

</div>

<div class="form-group">

<label class="sr-only">发布者</label>

<input type="text" class="form-control" placeholder="发布者" name="info[sender_name]" value="<?php echo isset($search['sender_name'])?$search['sender_name']:""?>">

</div>

<div class="form-group">

<label class="sr-only">发布时间</label>

<input type="text" class="form-control form_datetime" placeholder="发布时间" name="info[createTime]" value='<?php echo Yii::$app->request->get('info')['createTime']?>'>

</div>


<button type="submit" class="mobtn primary_btn">开始查询</button>
<!--<a class="mobtn fr second_btn" href="index.php?r=publicinfo/create" ><i class="icon_add"></i>发布信息</a>-->
</form>

</div>


<table class="tableList" cellpadding="0" cellspacing="0">

<tr>

<th class="num">序号</th>

<th>标题</th>

<th class="username">发布者</th>

<th class="type">类型</th>

<th class="username">阅读数</th>

<th class="daytime">发布时间</th>

</tr>

<?php //if(Yii::$app->request->get('page')==null)  $page=1; else $page=Yii::$app->request->get('page');?>
<?php foreach ($publicinfoList as $key =>$publicinfo):?>
<tr>
<td class="num"><?=Html::encode($key+1+($page-1)*$pagination->defaultPageSize)?></td>

<td><a href="index.php?r=publicinfo/view&id=<?=Html::encode($publicinfo['Id'])?>"><?=Html::encode($publicinfo['title'])?></a></td>

<td class="username"><?=Html::encode($publicinfo['sender_name'])?></td>

<td class="type"><?php echo PublicinfoMenu::findOne(['id'=>$publicinfo['type']])->menu_name?></td>

<td class="username"><?=Html::encode($publicinfo['readers'])?></td>

<td class="day"><?php echo date('Y-m-d H:i:s',intval($publicinfo['createTime']));?></td>

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





