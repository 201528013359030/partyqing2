<?php
<!--中间-->

<div class="outwrap">	
	<div class="innerwrap" >
		<div class="formTitle"><span class="fr">一共找到<?php echo $totalCount?>条信息</span>产品展示</div>
		<div class="moproductList">
			<div class="moproductIteam">
				<a href="<?=Url::to(['product/req-detail','id'=>$list['Id']])?>" class="verticalMiddelPic">
					<span><img src="<?php echo $imgIp.$image[0]['path']?>"></span>
				</a>
				<a href="<?=Url::to(['product/req-detail','id'=>$list['Id']])?>" class="moproductTitle"><?php echo $list['title']?></a>
				<p class="times">最后更新：<?php echo date('Y-m-d',intval($list['createTime']));?></p>
			</div>
		</div>
		</div>
	</div>
		
</div>


<!--底部-->