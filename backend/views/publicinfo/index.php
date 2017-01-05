<?php
use yii\helpers\Html;
use common\models\PublicinfoApi;
use common\models\Publicinfo;
?>
<!--
	
	描述：中间内容区替换内容
--><?php 
$this->title = '信息服务';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">		
	<div class="innerwrap container-fluid listTop">
		<div class="tableControl clear">
			<form class="form-inline" role="form" action="index.php" method="get">				<input type="hidden" name="r" value='publicinfo/search'>
				<div class="form-group">			    
			    	<label class="sr-only">类型</label>
			      <select class="form-control" name='info[type]'>
							  <option value='0'>请选择类型</option>							<?php foreach ($menus as $menu):?>
							  <option value='<?=Html::encode($menu['id'])?>' <?php //if(isset($search['type'])&&$search['type']==$menu['id']) echo 'selected'?>><?=Html::encode($menu['menu_name'])?></option>							<?php endforeach;?>
<!-- 							  <option>类型二</option> -->
							</select>
			  </div>
			  <div class="form-group">
			    <label class="sr-only">标题</label>
			    <input type="text" class="form-control" placeholder="标题" name="info[title]" value="<?php //echo isset($search['title'])?$search['title']:""?>">
			  </div>
			  <div class="form-group">
			    <label class="sr-only">发布者</label>
			    <input type="text" class="form-control" placeholder="发布者" name="info[sender_name]" value="<?php //echo isset($search['sender_name'])?$search['sender_name']:""?>">
			  </div>
			  <div class="form-group">
			    <label class="sr-only">发布时间</label>
			    <input type="text" class="form-control form_datetime" placeholder="发布时间" name="info[createTime]" value='<?php //echo Yii::$app->request->get('info')['createTime']?>'>
			  </div>
			  <button type="submit" class="mobtn primary_btn">开始查询</button>
			  <?php //$type = isset(Yii::$app->session["user.identity.type"])?Yii::$app->session["user.identity.type"]:"1";
			  	//if($type ==1||$type==2){
			  ?><!-- 				<a class="mobtn fr second_btn" href="index.php?r=publicinfo/create" ><i class="icon_add"></i>发布信息</a> -->
				<?php // }?>
			</form>
		</div>


		<div class="row clear">

			<?php foreach ($menus as $menu):?>
            <?php if($menu['id'] == 18 || $menu['id'] == 19) continue?>
			<div class="col-md-6 col-lg-4">

				<div class="squreBox">

					<a href="index.php?r=publicinfo/more&type=<?=Html::encode($menu['id'])?>" class="num">+ 更多</a>
<!-- 					<a href="javascript:void(0);" class="num">+ 更多</a> -->

					<div class="pic"><img src="<?php echo $menu['menu_icon']?>"></div>

					<div class="title"><?=Html::encode($menu['menu_name'])?></div>

					

					<div class="squreList">

						

						<div class="list">
							<?php 
								$ws = new PublicinfoApi();
								$info = "";
								$info['type']=$menu['id'];
								$info['limit']=5;
								$info = json_encode($info);
								$results = $ws->getPublicinfoList($info);
								foreach ($results as $result):
							?>
						  <a href="index.php?r=publicinfo/view&id=<?=Html::encode($result['Id'])?>" class="list-item">

						  	<span class="badge"><?php echo date('Y-m-d',intval($result['createTime']));?></span>

						    <span class="list_title text-cut"><?=Html::encode($result['title'])?></span>

						  </a>
							<?php endforeach;?>
						</div>
						<!-- end list -->
					</div>
					<!-- end squreList -->
				</div>
				<!--  end squreBox -->

			</div>
				<?php endforeach;?>
			
		</div>

		

		

		

		

		

		

		

				

	</div>

</div>

<!--底部-->
