<?php $this->title = '产品详情';$this->params['breadcrumbs'][] = $this->title;?>
<!--中间-->

<div class="outwrap">	
	<div class="innerwrap" >
		
		
		<div class="row pt20">
			<div class="col-sm-12 productInnerTop">
				<div class="row">
					<div class="col-sm-4">
						<div class="productBigImg verticalMiddelPic">												<?php $image = json_decode($detail['image'],true); ?>
							<span><img src="<?php echo $imgIp.$image[0]['path']?>" class="img-responsive"></span>					
						</div>
					</div>
					
					<div class="col-sm-8">
						<h4 class="productTitle"><?php echo $detail['title']?></h4>
						<ul class="productInfos">							<li><span class="name">供应商：</span><span class="detail"><b><?php echo $detail['provider']?></b></span></li>
							<li><span class="name">报价：</span><span class="detail"><?php echo $detail['quote']?></span></li>														<li><span class="name">品牌：</span><span class="detail fbRed"><?php echo $detail['brand']?></span></li>														<li><span class="name">型号</span><span class="detail fbRed"><?php echo $detail['model']?></span></li>													    <li><span class="name">所在地：</span><span class="detail"><?php echo $detail['location']?></span></li>
							<li><span class="name">联系电话：</span><span class="detail fbRed"><b><?php echo $detail['contact_tel']?></b></span></li>
							<li><span class="name">联系人：</span><span class="detail"><?php echo $detail['contact_name']?></span></li>
							<li><span class="name">关键字：</span><span class="detail"><?php echo $detail['keyword']?></span></li>														<li><span class="name">产品编号：</span><span class="detail"><?php echo $detail['number']?></span></li>
<!-- 							<li><span class="name">栏目标题</span><span class="detail">栏目<em class="fred">红色</em>基本信息</span></li> -->
<!-- 							<li><span class="name">栏目标题</span><span class="detail">栏目基本信息</span></li> -->
						</ul>
					</div>
					</div>
			</div>
			
		</div>
		<div class="row productInnerBody">
			<div class="col-sm-12">
				<div class="productDetail">
					<div class="productBodyTitle">详细介绍</div>
					<div class="productBody content">						<?php echo $detail['detail']?>
					</div>
				</div>
			</div>
			
		</div>
		
		
	</div>
		
</div>


<!--底部-->
