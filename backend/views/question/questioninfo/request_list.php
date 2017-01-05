<?php
use yii\helpers\Url;
$this->title = "服务反馈";
$this->params['breadcrumbs'][] = $this->title;
?>
<!--
	
	描述：中间内容区替换内容
-->

<div class="outwrap">	

	<div class="innerwrap bg_form">		
		<div class="pt20">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs " role="tablist">
			<?if(Yii::$app->session['user.identity.type'] == 3):?>
			  <li  class="<?=$action['submit']?>"><a href="index.php?r=question/questioninfo/submit" >我要反馈</a></li>
			 <?endif?>
			  <li class="<?=$action['index']?>"><a href="index.php?r=question/questioninfo/index">未解决问题</a></li>
			  <li class="<?=$action['finish']?>"><a href="index.php?r=question/questioninfo/finish">已解决问题</a></li>
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content tabCloud">
			  <div role="tabpanel" class="tab-pane active" id="home">
	
				<div class="innerwrap container-fluid listTop">



					
					<div class="tableControl">
						
						<form id="search" class="form-inline" role="form" method="get" action="<?=Url::to(['question/questioninfo/index'])?>">
							<input type="hidden" name="r" value="question/questioninfo/index">
							<!-- 判断权限临时用 -->
							<?if(Yii::$app->session['user.identity.action'] & 2):?>
			<!-- 				<div class="fr">
								<button type="button" class="mobtn second_btn" onclick="javascript:window.location.href='<?=Url::to(['question/questioninfo/submit'])?>'"><i class="icon_add"></i> 我要反馈</button>
							</div> -->
							<?endif?>
							<div class="form-group">
								<label class="sr-only">内容</label>
								<input type="text" name="QuestioninfoSearch[title]" class="form-control" value="<?=isset($search["title"])?$search["title"]:''?>" placeholder="请输入内容关键字">
							</div>

							<div class="form-group">
								<label class="sr-only">反馈时间</label>
								<input type="text" name="QuestioninfoSearch[date]" value="<?=isset($search["date"])?$search["date"]:""?>" class="form-control form_datetime" placeholder="反馈时间">
							</div>
							<input id="page" type="hidden" name="page" value="1">
							<!-- <input type="hidden" name="QuestioninfoSearch[status]" value="<?//=$search["status"]?>"> -->
							<button type="submit" class="mobtn primary_btn">开始查询</button>
						</form>
						
					</div>
					
					<table class="tableList" cellpadding="0" cellspacing="0">
						<tr>
							<th class="num">序号</th>
							<th>企业诉求</th>
							<th class="op">企业名称</th>
							<?if(YII_QUESTION == 'v1'):?>	
							<th class="type">类型</th>
							<?endif?>
							<th class="daytime">反馈时间</th>
							<th class="op">操作</th>
						</tr>
						<?foreach($list as $key=>$value):?>
						<tr>
							<td class="num"><?=$key+1?></td>
							<td>
								<a href="<?=Url::to(['question/questioninfo/view',"id"=>$value->qID])?>"><?=$value->title?></a>
							</td>

							<td class="day"><?=$value->company ?> </td>	
							<?if(YII_QUESTION == 'v1'):?>
							<?if($value->status == 1):?>
								<td class="type"><span class="second_col">已处理</span></td>
							<?else:?>
								<td class="type"><span class="dangerous_col">未处理</span></td>
							<?endif?>
							<?endif?>

							<td class="day"><?=date("Y-m-d H:i",$value->createTime)?> </td>	
							<td class="op"><a href="<?=Url::to(['question/questioninfo/view',"id"=>$value->qID])?>" class="mobtn mobtnSm primary_btn">查看详细</a></td>	
						</tr>
						<?endforeach?>
			<!-- 			<tr>
							<td class="num">1</td>
							<td><a href="request_con.html">关于异地就医直接结算政策的问题</a></td>
							<td class="type"><span class="dangerous_col">未处理</span></td>
							<td class="day">2016-11-16 14:15</td>	
							<td class="op"><a href="javascript:void(0)" class="mobtn mobtnSm primary_btn">查看详细</a></td>	
						</tr>
						<tr>
							<td class="num">1</td>
							<td><a href="request_con.html">关于异地就医直接结算政策的问题</a></td>
							<td class="type"><span class="second_col">已处理</span></td>
							<td class="day">2016-11-16 14:15</td>	
							<td class="op"><a href="javascript:void(0)" class="mobtn mobtnSm primary_btn">查看详细</a></td>	
						</tr> -->
					</table>
					<div class="pageBtm">
						<nav>
						    <ul class="pagination">
						    	<?=$pageHtml?>
			<!-- 			        <li class="disabled"><a href="#">«</a></li>
						        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
						        <li><a href="#">2</a></li>
						        <li><a href="#">3</a></li>
						        <li><a href="#">4</a></li>
						        <li><a href="#">5</a></li>
						        <li><a href="#">»</a></li> -->
						    </ul>
						    <div class="form-inline">
						    	<p class="form-control-static">跳转到：</p>
						    	<div class="form-group">
										<div class="input-group">					
											<input id="goto" class="form-control" type="text">
											<div class="input-group-addon"><a class="picon" onclick="gotopage()" href="javascript:void(0);">GO</a></div>							
										</div>
									</div>
						    </div>
						    <div class="form-inline"> <p class="form-control-static">第<?=$p?>页/共<?=$pagecount?>页</p> </div>
					   	</nav>
					</div>
					
				</div>
							
				</div>
			</div>
		</div>
	</div>
</div>
<!--底部-->
<div class="footer endFoot">
	<span>版权所有：铁西区工业云网</span>　
	<span>辽ICP备05070218号</span>　
	<span>中文域名：铁西区工业云网.政务</span>
</div>

<script>
	function page(p){
		$("#page").val(p);
		$("#search").submit();
	//		window.location.href='<?=Url::to(['question/questioninfo/index'])?>'+'&page='+p;
		return;
	}
	function gotopage(){
        var p = $("#goto").val();
        if(isNaN(p)){
            showAlert("pic_warn", "请输入有效页码");
            return;
        }
		page(p);
	}	
</script>




