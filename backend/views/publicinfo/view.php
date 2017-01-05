<?php
use yii\helpers\Html;
?>

<!--中间-->

<div class="outwrap">	
	<div class="innerwrap" >
		
		<div class="cont2_le">
    <div class="cont6_le_k">
        <div class="cont7_le_biao"><?=Html::encode($model['title'])?>
            <br>
        </div>
        <div class="cont7_le_biao1"><?=Html::encode($model['sender_name'])?> <?php echo date('Y-m-d',intval($model['createTime']));?></div>
        <div class="cont7_le_nei">
        	<div class="content">
        	<div style="text-align:justify">
        		<?php echo $model['content']?>
        	</div>	
 		<?php if($attachList!=""):?>
							 <?php foreach ($attachList as $key=>$value): ?>
							 <p>
							<a  href="#" class="attaIteam" style="cursor:pointer;" onclick='download_file("<?=$value['path']?>","<?=$value['name']?>","<?=$value['size']?>","<?=$value['url']?>");'>								

								<i id="attachName3" class="icon_file"></i> <?=$value['name']?>

							</a>
							</p>
							<? endforeach?>
							<?endif?>
          </div>
          
        </div>
        
        <div class="clear00"></div>
    </div>
    <div class="clear00"></div>
</div>
		
		
	</div>
		
</div>


<!--底部-->
<script>
function download_file(file,name,size,url){
        window.location.href='index.php?r=publicinfo/download&file='+file+'&name='+name;
    return false;
}
</script>