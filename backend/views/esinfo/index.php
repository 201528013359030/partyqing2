<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Industryinfo;
use common\models\Action;
use yii\base\Object;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Companyinfos';
$this->title = '微门户信息';
$this->params['breadcrumbs'][] = $this->title;

$action = new Action();
$typeidStr = is_array($queryConf)?$queryConf["typeidStr"]:"";
if($typeidStr){
	$typeidArr = explode(",", $typeidStr);
}
?>
	<div class="innerwrap container-fluid listTop">	
	<div class="controlBar">
<?php if(isset($_SESSION['tip']))echo 'tip:'. $_SESSION['tip'];unset($_SESSION['tip']);?>
			 </div>
	    <form id="queryForm" method="post" action="index.php?r=esinfo/index&action=query">
	    
        <div class="searchBox">

			<div class="searchType">
			<div class="typeIteam">

					<div class="typeName">功 能 区：</div>

					<div class="typeCon">
					
					<?php 
					   $paramArr = \Yii::$app->params["cmpDomain"];
					   foreach ($paramArr as $key=>$value){    					  
                            if($typeidStr && in_array("cmpDomain|".$key, $typeidArr)){
                    ?>
                    <a href="javascript:void(0)" class="iteam curr" data-typeid="<?php echo "cmpDomain|".$key;?>"><span><?php echo $value;?></span></a>
                    <?php                                    
                            }else{
                    ?>     
                    <a href="javascript:void(0)" class="iteam" data-typeid="<?php echo "cmpDomain|".$key;?>"><span><?php echo $value;?></span></a>       
                    <?php         
                            }
					   }
				    ?>

					</div>

				</div>
		  
                		<div class="typeIteam">

					<div class="typeName">企业分类：</div>

					<div class="typeCon">
					
				 
	<?php 
					   $industryArr = $action->getSysTrade();
					 
					   foreach ($industryArr as $key=>$value){   
			  
                            if($typeidStr && in_array("cmpindustryClass|'".$key."'", $typeidArr)){
                    ?>
                    <a href="javascript:void(0)" class="iteam curr" data-typeid="<?php echo "cmpindustryClass|'".$key."'";?>"'"><span><?php echo $value;?></span></a>
                    <?php                                    
                            }else{
                    ?>     
                    <a href="javascript:void(0)" class="iteam" data-typeid="<?php echo "cmpindustryClass|'".$key."'";?>"><span><?php echo $value;?></span></a>       
                    <?php         
                            }
					   }
				    ?>
					  	    
					</div>

				</div> 
				<div class="typeIteam">

				 

					<div class="typeCon">

					 <div class="typeName">企业名称：</div>
				 

				 

					<input type="text" class="form-control"  placeholder="" name="cName" style="width:240px;" value="<?php echo is_array($queryConf)?$queryConf["cName"]:""?>">	

				 
				</div>

			</div>

		</div>

		</div>

		

		<div class="controlBar">

 			<div class="title">搜索筛选条件：</div>

			<div id="J_titleCon" class="titleCon">
			<?php 
	 
			     if($typeidStr){
			         $tmp = "";
			         for($t=0;$t<count($typeidArr);$t++){
			             $tmp = explode("|", $typeidArr[$t]);
			          
			             if($tmp[0]=='cmpindustryClass')
			             {
			             	 
			             	$code=str_replace('\'','',$tmp[1]);
			             	?>
			             		<a href="javascript:void(0)" class="iteam" data-typeid="<?php echo $typeidArr[$t]?>"><span><?php echo $industryArr[$code]; ?></span></a>
			
			             	<?php 
			             }
			             else{
			             	
			   
			?>
			<a href="javascript:void(0)" class="iteam" data-typeid="<?php echo $typeidArr[$t]?>"><span><?php echo Yii::$app->params[$tmp[0]][$tmp[1]]; ?></span></a>
			<?php 
			        } }
			     }
			?>
			</div>
			 

			<div class="option">
			    <input type="hidden" name="cmpDomain" id="cmpDomain" value="" /> 
 
			    <input type="hidden" name="cmpindustryClass" id="cmpindustryClass" value="" /> 
			    <input type="hidden" name="typeidStr" id="typeidStr" value="<?php echo is_array($queryConf)>0?$queryConf["typeidStr"]:""?>" /> 
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>" /> 
                
				<a href="javascript:void(0)" class="mobtn submit" onclick="checkData()">开始搜索</a>
				
				<a href="index.php?r=esinfo/create" class="mobtn submit">我的店铺</a>

			</div>		

		</div>
		
		</form>
        	<ul id="dirlist">
 
            <?php 
                if(is_array($cmpList)){
                    foreach ($cmpList as $key=>$value){
                    //print_r($value);
                    //echo "<br>";
            ?>
 
		

			<li>

				<a target="_blank"  href="/advanced/lapp/Eshop/html/company.html?uid=<?php echo Yii::$app->session["uid"];?>&id=<?php echo $value["id"]?>&serverIp=<?php echo Yii::$app->params["esSERVER_IP"];?>" title="<?php echo $value["cName"]?>"><img src="<?php echo $value["Imagetrueurl"]?>" class="dirlist_pic"></a>

				<dl><dt><h4><a target="_blank"  href="/advanced/lapp/Eshop/html/company.html?uid=<?php echo Yii::$app->session["uid"];?>&id=<?php echo $value["id"]?>&serverIp=<?php echo Yii::$app->params["esSERVER_IP"];?>" title="<?php echo $value["cName"]?>"><?php echo $value["cName"]?></a></h4></dt><dd>地址：<?php echo $value["position"]?></dd><dd>法定代表人:<?php echo $value["legalRep"]?></dd><dd><a href="<?php echo $value["publicUrl"]?>" target="_blank"><?php echo $value["publicUrl"]?></a></dd><!--  <dd><?php  	$type = isset(Yii::$app->session["user.identity.type"])?Yii::$app->session["user.identity.type"]:"1"; if($type==1){?><a onclick="javascript:return ConfirmDel();"  href="index.php?r=esinfo/delete&id=<?php echo $value["id"]?>"  >删除</a><?php }?></dd>--></dl></li>

				

			<li>
            <?php 
                    }
                }
            ?>

	 
</ul>
		<div class="pageBtm">

			<nav>

			    <ul class="pagination">
			        <?=$pageHtml?>
                    <!-- 
                    <?php 
                    /*if($page==1){
                    ?>
                    <li class="disabled" id="pre"><a href="#" onclick="changePage(this);">«</a></li>
                    <?php     
                    }else{
                    ?>
                    <li id="pre"><a href="#" onclick="changePage(this);">«</a></li>
                    <?php     
                    }
                    ?>
			        
			        <?php 
			             for($p=1;$p<=$totalPage;$p++){
			                 if($p<=5){
			                     if($p == $page){
			        ?>
			        <li class="active"><a href="#" onclick="changePage(this);"><?php echo $p;?><span class="sr-only">(current)</span></a></li>
			        <?php              
			                     }else{
			        ?>
			        <li><a href="#" onclick="changePage(this);"><?php echo $p;?></a></li>
			        <?php              
			                     }
			                 }
			             }
			        ?>
                    <?php 
                    if($page==$totalPage){
                    ?>
                    <li class="disabled" id="next"><a href="#" onclick="changePage(this);">»</a></li>
                    <?php     
                    }else{
                    ?>
                    <li id="next"><a href="#" onclick="changePage(this);">»</a></li>
                    <?php     
                    }*/
                    ?>
                 -->
			    </ul>

			    <div class="form-inline">

			    	<p class="form-control-static">跳转到：</p>

			    	<div class="form-group">

							<div class="input-group">					

								<input class="form-control" type="text" id="jumpto" name="jumpto" value="">

								<div class="input-group-addon"><a class="picon" href="#" onclick="jumpPage();">GO</a></div>							

							</div>

						</div>

			    </div>

			    <div class="form-inline"> <p class="form-control-static">第<?php echo $page;?>页/共<?php echo $pagecount;?>页</p> </div>

		   	</nav>

		</div>

	</div>
 
<script type="text/javascript">
function checkData(){
	var titleCon = $("#J_titleCon").html();
	var typeidStr = "";
	var typeid = "";
	var idtmp = "";
	var idlist = "";
	var oldValue = "";
	$("#J_titleCon a").each(function(){
		typeid = $(this).attr("data-typeid");
	 
		idlist = typeid.split("|");
		oldValue = $("#"+idlist[0]).val();

		if(oldValue.length==0){
			$("#"+idlist[0]).val(idlist[1]);
		}else{
			$("#"+idlist[0]).val(oldValue+","+idlist[1]);
		}
		typeidStr += typeid+",";
	});
	if(typeidStr.length>0){
		typeidStr = typeidStr.substr(0,typeidStr.length-1);
	}
	$("#typeidStr").val(typeidStr);
	$('#queryForm').submit();
}
function changePage(f){
	var currentPage = '<?php echo $page;?>';
	var totalPage = '<?php echo $totalPage;?>';
	var toPage = currentPage;
	if($(f).html() == '«'){
		if(parseInt(currentPage)>1){
			toPage = parseInt(currentPage)-1;
		}		
	}else if($(f).html() == '»'){
		if(parseInt(currentPage)<parseInt(totalPage)){
			toPage = parseInt(currentPage)+1;
		}		
	}else{
		toPage = parseInt($(f).html());
	}
	//alert(currentPage);
	//alert(toPage);
	if(toPage != currentPage){
		$("#page").val(toPage);
		checkData();
	}
}
function jumpPage(){
	var currentPage = '<?php echo $page;?>';
	var totalPage = '<?php echo $totalPage;?>';
	var toPage = $("#jumpto").val();
	//alert(toPage);
	if(toPage != currentPage){
		if(parseInt(toPage)>=1 && parseInt(toPage)<=parseInt(totalPage)){
    		$("#page").val(toPage);
    		checkData();
		}else{
			//alert("请输入正确页码！");
			showAlert("pic_error", "请输入有效页码");
		}
		
	}
}
function page(p){
	$("#page").val(p);
	checkData();
	return;
}
function gotopage(){
    var p = $("#goto").val();
    if(isNaN(p)){
        showAlert("pic_error", "请输入有效页码");
        return;
    }
	page(p);
}	
//删除时弹出确认按钮方法
function ConfirmDel() {
if (confirm("真的要删除吗？")){
return true;
}else{
return false;
}
}

</script>	
            