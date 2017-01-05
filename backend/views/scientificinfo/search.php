<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\base\Widget;
use common\models\ScientificinfoMenu;
?>

<!--中间-->

<?php 
// if($flag == 2){
// 	$this->title = $menus->menu_name;
// }else{
// 	$this->title = '信息列表';
// }
$this->title = '信息列表';
$this->params['breadcrumbs'][] = $this->title;
?>



<!--



描述：中间内容区替换内容

-->



<div class="outwrap">



<div class="innerwrap container-fluid listTop">


<div class="tableControl" id="flag">

<form class="form-inline" role="form" action="index.php" method="get">
<input type="hidden" name="r" value='scientificinfo/search'>
<div class="form-group">

<label class="sr-only">信息类型</label>

<select class="form-control" name='ScientificinfoSearch[requirement]'>

<option value=''>请选择类型</option>

<option value='1' <?php if(isset($search['requirement'])&&$search['requirement']==1) echo 'selected'?>>供应信息</option>

<option value='2' <?php if(isset($search['requirement'])&&$search['requirement']==2) echo 'selected'?>>需求信息</option>

<!-- <option>类型一</option> -->

<!-- <option>类型二</option> -->

</select>

</div>
<div class="form-group">

<label class="sr-only">类型</label>

<select class="form-control" name='ScientificinfoSearch[type]'>

<option value=''>请选择服务类型</option>

<?php 
	$menus = ScientificinfoMenu::find()->asArray()->all();
	foreach ($menus as $menu):
	//var_dump($menu);
?>
<option value='<?=Html::encode($menu['Id'])?>' <?php if(isset($search['type'])&&$search['type']==$menu['Id']) echo 'selected'?>><?=Html::encode($menu['menu_name'])?></option>

<?php endforeach;?>

<!-- <option>类型一</option> -->

<!-- <option>类型二</option> -->

</select>

</div>
<?php //echo Yii::$app->request->get('info') ; echo "ddd";?>
<div class="form-group">

<label class="sr-only">标题</label>

<input type="text" class="form-control" placeholder="标题" name="ScientificinfoSearch[title]" value="<?php echo isset($search['title'])?$search['title']:""?>">

</div>

<!-- <div class="form-group"> -->

<!-- <label class="sr-only">发布者</label> -->

<!--  <input type="text" class="form-control" placeholder="发布者" name="ScientificinfoSearch[sender_name]" value="<?php //echo isset($search['sender_name'])?$search['sender_name']:""?>">-->

<!-- </div> -->

<div class="form-group">

<label class="sr-only">发布企业</label>

<input type="text" class="form-control" placeholder="发布企业" name="ScientificinfoSearch[sender_unit]" value="<?php echo isset($search['sender_unit'])?$search['sender_unit']:""?>">

</div>

<div class="form-group">

<label class="sr-only">发布时间</label>                           

<input type="text" class="form-control form_datetime" placeholder="发布时间" name="ScientificinfoSearch[createTime]" value="<?php echo isset($search['createTime'])&&$search['createTime']!==""?date('Y-m-d',intval($search['createTime'])):""?>">

</div>

<!-- <div class="form-group"> -->

<!-- <label class="sr-only">有效时间</label> -->

<!--  <input type="text" class="form-control form_datetime" placeholder="有效时间" name="ScientificinfoSearch[validTime]" value="<?php //echo isset($search['validTime'])&&$search['validTime']!=""?date('Y-m-d',intval($search['validTime'])):""?>"> -->

<!-- </div> -->

<button type="submit" class="mobtn primary_btn">开始查询</button>
<!--<a class="mobtn fr second_btn" href="index.php?r=publicinfo/create" ><i class="icon_add"></i>发布信息</a>-->
</form>

</div>


<table class="tableList" cellpadding="0" cellspacing="0">

<tr>

<th class="num">序号</th>

<th>标题</th>

<!-- <th class="username">发布者</th> -->

<th class="username">发布企业</th>

<th class="type">信息类型</th>

<th class="type">服务类型</th>

<!-- <th class="username">阅读数</th> -->

<th class="daytime">发布时间</th>

<th class="daytime">有效时间</th>

<th class="state">状态</th>

</tr>

<?php //if(Yii::$app->request->get('page')==null)  $page=1; else $page=Yii::$app->request->get('page');?>
<?php foreach ($scientificinfoList as $key =>$scientificinfo):?>
<tr>
<td class="num"><?=Html::encode($key+1+($page-1)*$pagination->defaultPageSize)?></td>

<td><a href="index.php?r=scientificinfo/view&id=<?=Html::encode($scientificinfo['Id'])?>"><?=Html::encode($scientificinfo['title'])?></a></td>

<!--  <td class="username"><? //=Html::encode($scientificinfo['sender_name'])?></td>-->

<td class="username"><?=Html::encode($scientificinfo['sender_unit'])?></td>

<td class="type"><?php echo $scientificinfo['requirement']==1?'供应信息':'需求信息'?></td>

<td class="type"><?php echo ScientificinfoMenu::findOne(['id'=>$scientificinfo['type']])->menu_name?></td>

<td class="day"><?php echo date('Y-m-d',intval($scientificinfo['createTime']));?></td>

<td class="day"><?php echo date('Y-m-d',intval($scientificinfo['validTime']));?></td>

<td class="state"><?php echo intval($scientificinfo['validTime'])>time()?'未过期':'已过期'?></td>

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

//	if(<? //=$flag?>//==2){
// 		document.getElementById('flag').style.display='none';
// 		//console.log($('#flag'));
// 	}

</script>





