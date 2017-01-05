<?php 
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\models\ScientificinfoMenu;
?>

<?php 
$this->title = $type;
//$this->params['breadcrumbs'][] = ['label' => '公共信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=Html::cssFile('@web/css/scientificinfo.css')?>
        <div class="cont2_cen">
        <div class="cont2_cen_top"></div>
		<div class="cont2_le">
        	<div class="cont6_le_k"> 
		<?php 
			srand((double)microtime()*1000000);
		?>
		<?php if(count($scientificinfoList)==0) echo "<p style='text-align:center'>无此类信息</p>"?>
<!--     新闻列表  循环  开始       -->
            <?php foreach ($scientificinfoList as $model):?>             
            	<div class="cont6_le_k1">
                	<div class="cont6_le_k1_1">
          
                        <div class="cont6_le_k1_1_top"><?php echo date('d',intval($model['createTime']));?></div>
                        <div class="cont6_le_k1_1_bot"><?php echo date('Y-m',intval($model['createTime']));?></div>
                    </div>
                    <a href="<?=Url::to(['scientificinfo/view',"id"=>$model['Id']])?>">
                	<div class="cont6_le_k1_2">
                    	<div class="cont6_le_k1_21">
                        	<?php echo trim($model['title'])?>
                        </div>
                    	<div class="cont6_le_k1_22 ">
                        	<div class="cont6_le_text_cut"><?php echo $model['abstract']?></div>                          <!--  	<a href="<?php  //=Url::to(['scientificinfo/view',"id"=>$model['Id']])?>"> &gt;&gt; </a>  -->
                        </div>
                    	<div class="cont6_le_k1_23">
                                	<?php echo $model['sender_unit']?>                        </div>
<!--                                             	<div class="cont6_le_k1_24">66</div> -->
                                            	<div class="cont6_le_k1_24"><?php echo rand(20,80)?></div>
                    </div>
                    </a>
                </div>
             <?php endforeach;?> 
              </div>
     
     
     
     
<div class="pageBtm1">

<nav>
	<?= LinkPager::widget(['pagination' => $pagination,'maxButtonCount' => 5,'hideOnSinglePage'=>false]) ?>

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
          
         <div class="cont2_qri">   
         	<div class="cont2_qri_b">
         	企业合作<br>
<!--          	<font class="cont2_qri_y">Public</font> -->
            </div>
            	<?php 
            		$menus = ScientificinfoMenu::find()->asArray()->all();
            		foreach ($menus as $menu):
            	?>
            	  
                  <a href="<?=Url::to(['scientificinfo/index',"type"=>$menu['Id']])?>">
               <div class="cont4_ri_1" id="<?php echo "menu_".$menu['Id']?>">
                    	<?php echo $menu['menu_name']?>
  			 	</div>
                  </a>  
               
                <?php endforeach;?>                              
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
	window.onload=function(){ 
		//console.log($('.cont6_le_title').text());
		<?php $type = Yii::$app->request->get("type",1);?>
     
		$('#menu_<?php echo $type?>').addClass('cont4_ri_1_h');
	}


</script>