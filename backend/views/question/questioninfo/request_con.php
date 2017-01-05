
<?php
use yii\helpers\Url;
$this->title = "服务反馈";
$this->params['breadcrumbs'][] = $this->title;
?>
<!--中间-->
<!-- <div class="pageTitleWrap">
	<div class="pageTitle">
		<div class="title"><i class="icon_squre"></i> 服务反馈</div>
		<div class="positions">
			<a href="<?=Url::to(['home/index'])?>">首 页</a> &gt; 服务反馈
		</div>
	</div>
</div> -->
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
				<div class="innerCotent">
<!-- 					<div class="formTitle"><a href="#" onclick="javascript:history.back(-1);">返回上一页</a></div> -->
					<form id="commentForm" class="form-inline" role="form" method="post" action="<?=Url::to(['question/questioninfo/append','id'=>$id])?>">
					<table class="mytb mytbText midTb" cellpadding="0" cellspacing="0">
							<tr>
								<td class="tdName">标题</td>
								<td class="tdCon"><b><?=$model->title?></b></td>
							</tr>
							<?
								(!$model->type)?($model->type=10):null;
							?>
							<tr>
								<td class="tdName">反馈类型</td>
								<td class="tdCon"><?=\Yii::$app->params["questionType"][$model->type]?></td>
							</tr>
							<tr>
								<td class="tdName">详细说明</td>
								<td class="tdCon">
										<div class="content">
											<p><?=$model->content?></p>
										</div>
		<!-- 								<div class="content">
											<p>中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中</p>
											<p><img src="../../equList/images/icon/shuidian.png"></p>
											<p>国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司</p>
										</div> -->
										<div class="contentContinue">
											<?foreach($append as $value):?>
											<div class="conIteam">
												<div class="ask">追问</div>
												<div class="askInfo">
													<p><?=$value['text']?></p>
												</div>
											</div>
											<?endforeach?>
										</div>
									</td>
							</tr>
							<?if(count($answer)>0 || count($progress) > 0):?>
							<tr>
								<td class="tdName replay"><b>解答</b></td>
								<td class="tdCon">
									<?if(count($answer) > 0):?>
									<div class="contentTitle">
										<div class="fl">解答人员：<?=$answer[0]['name']?> </div>
										<div class="fr"><?=date("Y-m-d H:i",$answer[0]['time'])?></div>
									</div>
										
										<div class="content clear">
											<p><?=$answer[0]['text']?></p>
		<!-- 									<p><img src="../../equList/images/icon/shuidian.png"></p>
											<p>国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司</p> -->
										</div>
										<?unset($answer[0])?>
										<div class="contentContinue">
											<?foreach($answer as $value):?>
											<div class="conIteam">
												<div class="ask replay">追答</div>
												<div class="askInfo">
													<div class="contentTitle">
														<div class="fl">解答人员：<?=$value['name']?> </div>
														<div class="fr"><?=date("Y-m-d H:i",$value['time'])?></div>
													</div>
													<p><?=$value['text']?></p>
												</div>
											</div>
											<?endforeach?>
		<!-- 									<div class="conIteam">
												<div class="ask replay">追答</div>
												<div class="askInfo">
													<div class="contentTitle">
														<div class="fl">处理人：王大锤 </div>
														<div class="fr">2016-11-28 11:01</div>
													</div>
													<p>中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中国科学院计算技术研究所有限公司中</p>
												</div>
											</div> -->
										</div>
										<?endif?>
										<?if(count($progress) > 0):?>
										<div class="contentContinue">
											<div class="conIteam">
												<div class="ask danger">进度</div>
												<div class="askInfo">	
													<?foreach($progress as $value):?>
													<p class="progressIteam"><span class="fr"><?=date("Y-m-d H:i",$value['time'])?></span><?=$value['text']?></p>
													<?endforeach?>
										<!-- 			<p class="progressIteam"><span class="fr">2016-11-28 11:34</span>已提交到当地社区</p>
													<p class="progressIteam"><span class="fr">2016-11-28 11:34</span>已提交到当地社区</p> -->
												</div>
											</div>
										</div>
										<?endif?>
										
									</td>
							</tr>					
							<?endif?>
							<tr>
								<td class="tdName">姓名</td><td class="tdCon"><?=$model->senderName?></td>
							</tr>
							<tr>
								<td class="tdName">联系方式</td><td class="tdCon"><?=$model->phone?></td>
							</tr>
							<tr>
								<td class="tdName">公司名称</td><td class="tdCon"><?=$model->company?></td>
							</tr>
							<?if(count(json_decode($model->attach,true))>0):?>
							<tr>						
								<td class="tdName">附件</td>
								<td class="tdCon">
									<?foreach(json_decode($model->attach,true) as $attach):?>
									<a  href="<?=Url::to(['question/questioninfo/file-download','id'=>$attach['id']])?>" class="attaIteam" >								
									
										<i id="attachName3" class="icon_file"></i> <?=$attach['name']?> 
									</a><br>
									<?endforeach?>
								</td>
							</tr>
							<?endif?>

							<tr>
								<td class="tdName"><div>追加问题</div></td>
								<td class="tdCon">
									<textarea  class="form-control" name="append" style="width:100%" rows="4" placeholder="请继续描述您的问题" required></textarea>
									<div class="buttnGroup">
										<input class="submit" type="submit" value="提交">
									</div>
								</td>						
							</tr>
					</table>
					</form>
							
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<script>
window.onload=function(){ 

	//需要参考jquery validate 验证插件
	$("#commentForm").validate();
	
	//form 表单提交之后触发
	$.validator.setDefaults({
	    submitHandler: function() {
	      alert("提交事件!");
	    }
	});
	
};
</script>







