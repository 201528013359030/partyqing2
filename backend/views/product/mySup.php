<?phpuse yii\helpers\Url;$this->title = "我的发布";$this->params['breadcrumbs'][] = $this->title;?>
<!--中间-->

<div class="outwrap">	
	<div class="innerwrap" >			<ul class="nav nav-tabs " role="tablist">						  <li class="active"><a href="<?=Url::to(['product/my-sup'])?>">我的产品</a></li>			 			  <li class=""><a href="<?=Url::to(['product/my-req'])?>">我的需求</a></li><!-- 			  <li class=""><a href="index.php?r=question/questioninfo/finish">已解决问题</a></li> -->			</ul>
		<br>		<div class="tab-content tabCloud">			<div role="tabpanel" class="tab-pane active" id="home">
		<div class="formTitle"><span class="fr">一共找到<?php echo $totalCount?>条信息</span>产品展示</div>
		<div class="moproductList">						<?php foreach ($lists as $list):?>			
			<div class="moproductIteam">
				<a href="<?=Url::to(['product/product-inner1','id'=>$list['Id']])?>" class="verticalMiddelPic">					<?php $image = json_decode($list['image'],true); ?>			
					<span><img src="<?php echo $imgIp.$image[0]['path']?>"></span>
				</a>
				<a href="<?=Url::to(['product/product-inner','id'=>$list['Id']])?>" class="moproductTitle"><?php echo $list['title']?></a>
				<p class="times">最后更新：<?php echo date('Y-m-d',intval($list['createTime']));?></p>
			</div>			<?php endforeach;?>
		</div>
		</div>		</div>
	</div>
		
</div>


<!--底部-->