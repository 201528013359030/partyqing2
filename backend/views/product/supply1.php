<?php 
use yii\helpers\Html;
use common\models\Action;
use common\models\ProductMenu;
use yii\helpers\Url;
use common\models\ProductSup;
use backend\controllers\ProductController;
use common\models\ProductReq;
$this->title = '产品供需';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">	
	<div class="innerwrap" style="overflow: hidden;">

	<br>
	<div class="formTitle">产品供应</div>

	<div class="catleft">

		<ul>
		<?php foreach ($supMenus as $supMenu):?>
			<li class="bbcat bli1"><h3 class="boxtitle"><a href="index.php?r=product/product-list" title="<?php echo $supMenu['name']?>"><?php echo $supMenu['name']?></a></h3>
		<?php 
			$menus = ProductMenu::find()->where(['parent'=>$supMenu['Id']])->asArray()->all();
			if(count($menus)>0){
				$ids = $menus[0]['Id'];
				for($i=1;$i<count($menus);$i++)
					$ids = $ids.",".$menus[$i]['Id'];
			$sql = "select * from product_sup, product_menu where product_menu.parent in (".$ids.") and product_sup.type = product_menu.id order by product_sup.createTime desc";
			//echo $sql;
			$db = \Yii::$app->db;
			$product = $db->createCommand($sql)->queryOne();
			$image = json_decode($product['image'],true);
		?>
		<div class="oll"><a target="_blank" title="<?php echo $product['title']?>" href="<?=Url::to(['product/view','id'=>$product['Id']])?>"><img src="<?php echo $imgIp.$image[0]['path']?>" width="100" height="80"><?php echo $product['title']?></a></div>
		<?php } ?>
<!-- 		<div class="oll"><a target="_blank" title="批发河北黑石材厂家" href="http://www.11467.com/4964544.htm"><img src="http://img1.11467.com/u/27330/219536350_small.jpg" width="100" height="80">批发河北黑石材厂家</a></div><div class="olr"><ol><li><a target="_blank" href="http://product.11467.com/gongnengcailiao/" title="功能材料">功能材料</a></li> -->

		<div class="olr"><ol>
<?php 
	
	foreach ($menus as $menu):
?>
<li><a target="_blank" href="<?=Url::to(['product/product-list1','type'=>$menu['Id']])?>" title="<?php echo $menu['name']?>"><?php echo $menu['name']?></a></li>
<?php endforeach;?>

</ol></div></li>
<?php endforeach;?>


		</ul>

	</div>
	<br><br>
    <div class="formTitle">产品需求</div>
	<div class="row clear">
	<?php foreach ($reqMenus as $reqMenu):?>
    <div class="col-md-6 col-lg-4">
        <div class="squreBox"><a href="<?=Url::to(['product/more','type'=>$reqMenu['Id']])?>" class="num">+ 更多</a>
            
            <div class="title"><?php echo $reqMenu['name']?></div>
            <div class="squreList">
                <div class="list">
                <?php $reqLists = ProductReq::find()->where(['type'=>$reqMenu['Id']])->orderBy(['createTime'=>SORT_DESC])->limit(5)->asArray()->all();?>
                <?php foreach ($reqLists as $reqList):?>
                	<a href="<?=Url::to(['product/req-detail','id'=>$reqList['Id']])?>" class="list-item"><span class="badge"><?php echo date('Y-m-d',intval($reqList['createTime']));?></span><span class="list_title text-cut"><?php echo $reqList['title']?></span></a>               	
                <?php endforeach;?>
<!--                 <a href="index.php?r=publicinfo/view&amp;id=50" class="list-item"><span class="badge">2016-12-07</span><span class="list_title text-cut">仪器回收^仪器变卖^高价收购二手仪器</span></a> -->
<!--                     <a -->
<!--                     href="index.php?r=publicinfo/view&amp;id=48" class="list-item"><span class="badge">2016-12-07</span><span class="list_title text-cut">现款回收Agilent E5063A二手收购价格</span> -->
<!--                         </a><a href="index.php?r=publicinfo/view&amp;id=36" class="list-item"><span class="badge">2016-12-07</span><span class="list_title text-cut">回收闲置仪器Agilent E5061B公开收购</span></a> -->
<!--                         <a href="index.php?r=publicinfo/view&amp;id=2" class="list-item"><span class="badge">2016-12-01</span><span class="list_title text-cut">铁西倒闭整体工厂回收</span> -->
<!--                         </a> -->
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    
    
    
</div>

	</div>	
</div>
