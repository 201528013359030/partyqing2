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
$this->title = '企业信息';
$this->params['breadcrumbs'][] = $this->title;

$action = new Action();
$typeidStr = (is_array($queryConf) && isset($queryConf["typeidStr"]))?$queryConf["typeidStr"]:"";
if($typeidStr){
    $typeidArr = explode(",", $typeidStr);
}
?>
	<div class="innerwrap container-fluid listTop">	
	
	    <form id="queryForm" method="post" action="index.php?r=company/index">
	    
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

					<div class="typeName">注册资本：</div>

					<div class="typeCon">
					
					<?php 
					   $paramArr = \Yii::$app->params["cmpRegcapital"];
					   foreach ($paramArr as $key=>$value){
					       if($typeidStr && in_array("cmpRegcapital|".$key, $typeidArr)){
			           ?>
                       <a href="javascript:void(0)" class="iteam curr" data-typeid="<?php echo "cmpRegcapital|".$key;?>"><span><?php echo $value;?></span></a>
                       <?php                                    
                               }else{
                       ?>     
                       <a href="javascript:void(0)" class="iteam" data-typeid="<?php echo "cmpRegcapital|".$key;?>"><span><?php echo $value;?></span></a>       
                       <?php         
                               }
   					   }
   				    ?>

					</div>

				</div>

				<div class="typeIteam">

					<div class="typeName">成立日期：</div>

					<div class="typeCon">
					
					<?php 
					   $paramArr = \Yii::$app->params["cmpFoundtime"];
					   foreach ($paramArr as $key=>$value){
    					   if($typeidStr && in_array("cmpFoundtime|".$key, $typeidArr)){
			           ?>
                       <a href="javascript:void(0)" class="iteam curr" data-typeid="<?php echo "cmpFoundtime|".$key;?>"><span><?php echo $value;?></span></a>
                       <?php                                    
                               }else{
                       ?>     
                       <a href="javascript:void(0)" class="iteam" data-typeid="<?php echo "cmpFoundtime|".$key;?>"><span><?php echo $value;?></span></a>       
                       <?php         
                               }
   					   }
   				       ?>
				    
					</div>

				</div>				

				<div class="typeIteam">

					<div class="typeName">从业人数：</div>

					<div class="typeCon">
					
					<?php 
					   $paramArr = \Yii::$app->params["cmpEmployee"];
					   foreach ($paramArr as $key=>$value){
					       if($typeidStr && in_array("cmpEmployee|".$key, $typeidArr)){
			           ?>
                       <a href="javascript:void(0)" class="iteam curr" data-typeid="<?php echo "cmpEmployee|".$key;?>"><span><?php echo $value;?></span></a>
                       <?php                                    
                           }else{
                       ?>     
                       <a href="javascript:void(0)" class="iteam" data-typeid="<?php echo "cmpEmployee|".$key;?>"><span><?php echo $value;?></span></a>       
                       <?php         
                          }
   					   }
   				       ?>

					</div>

				</div>

				<div class="typeIteam">

					<div class="typeName">营业收入：</div>

					<div class="typeCon">
					
					<?php 
					   $paramArr = \Yii::$app->params["cmpProduction"];
					   foreach ($paramArr as $key=>$value){
					       if($typeidStr && in_array("cmpProduction|".$key, $typeidArr)){
			           ?>
                       <a href="javascript:void(0)" class="iteam curr" data-typeid="<?php echo "cmpProduction|".$key;?>"><span><?php echo $value;?></span></a>
                       <?php                                    
                           }else{
                       ?>     
                       <a href="javascript:void(0)" class="iteam" data-typeid="<?php echo "cmpProduction|".$key;?>"><span><?php echo $value;?></span></a>       
                       <?php         
                          }
   					   }
   				       ?>

					</div>

				</div>

				<div class="typeIteam">

					<div class="typeName">企业性质：</div>

					<div class="typeCon">
					
					<?php 
					   $paramArr = \Yii::$app->params["cmpNature"];
					   foreach ($paramArr as $key=>$value){
					       if($typeidStr && in_array("cmpNature|".$key, $typeidArr)){
			           ?>
                       <a href="javascript:void(0)" class="iteam curr" data-typeid="<?php echo "cmpNature|".$key;?>"><span><?php echo $value;?></span></a>
                       <?php                                    
                           }else{
                       ?>     
                       <a href="javascript:void(0)" class="iteam" data-typeid="<?php echo "cmpNature|".$key;?>"><span><?php echo $value;?></span></a>       
                       <?php         
                          }
   					   }
   				       ?>

					</div>

				</div>               
                
				<div class="typeIteam">

					<div class="typeName">注册号：</div>

					<div class="typeCon">

					<input type="text" class="form-control"  placeholder="" name="regMark" style="width:120px;" value="<?php echo is_array($queryConf)?$queryConf["regMark"]:""?>">	

					<span class="iteam">行业类别：</span>

					<div class="form-button" style="width:200px;">						

					 	<div class="input-group" data-toggle="modal" data-target=".hangye">

						  <input id="J_inputHangye" type="text" class="form-control" name="ofIndustry" readonly value="<?php echo is_array($queryConf)?$queryConf["ofIndustry"]:""?>">

						  <span class="input-group-addon"><i class="caret "></i></span>

						</div>

					  

					</div>

					<span class="iteamShow">企业名称：</span>

					<input type="text" class="form-control"  placeholder="" name="cName" style="width:240px;" value="<?php echo is_array($queryConf)?$queryConf["cName"]:""?>">	

					<span class="iteamShow">负责人：</span>

					<input type="text" class="form-control"  placeholder="" name="legalRep" style="width:120px;" value="<?php echo is_array($queryConf)?$queryConf["legalRep"]:""?>">	

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
			?>
			<a href="javascript:void(0)" class="iteam" data-typeid="<?php echo $typeidArr[$t]?>"><span><?php echo Yii::$app->params[$tmp[0]][$tmp[1]]; ?></span></a>
			<?php 
			         }
			     }
			?>
			</div>

			<div class="option">
			    <input type="hidden" name="cmpDomain" id="cmpDomain" value="" /> 
			    <input type="hidden" name="cmpRegcapital" id="cmpRegcapital" value="" /> 
			    <input type="hidden" name="cmpFoundtime" id="cmpFoundtime" value="" /> 
			    <input type="hidden" name="cmpEmployee" id="cmpEmployee" value="" /> 
			    <input type="hidden" name="cmpProduction" id="cmpProduction" value="" /> 
			    <input type="hidden" name="cmpNature" id="cmpNature" value="" /> 
			    <input type="hidden" name="action" id="action" value="query" />
			    <input type="hidden" name="typeidStr" id="typeidStr" value="<?php echo is_array($queryConf)>0?$queryConf["typeidStr"]:""?>" /> 
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>" /> 
                
				<a href="javascript:void(0)" class="mobtn submit" onclick="checkData()">开始搜索</a>
				
				<a href="index.php?r=company/create" class="mobtn second_btn"><i class="icon_add"></i>添加企业</a>
				
				<a href="index.php?r=company/import" class="mobtn primary_btn">导入企业</a><!--  -->
                
			</div>		

		</div>
		
		</form>
        
		<table class="tableList" cellpadding="0" cellspacing="0">

			<tr>

				<th class="num">编号</th>

				<th>企业名称</th>

				<th class="daytime">功能区</th>

				<th class="daytime">政府负责人</th>

				<th class="daytime">政府联系人</th>

			</tr>
            <?php 
                if(is_array($cmpList)){
                    foreach ($cmpList as $key=>$value){
                    //print_r($value);
                    //echo "<br>";
                    $govLeader = $action->getGovUserName($value["govLeader"]);
                    $govContact = $action->getGovUserName($value["govContact"]);
            ?>
            <tr>

				<td class="code"><?php echo ($key+1+($page-1)*Yii::$app->params["pageSize"])?></td>

				<td><a href="index.php?r=company/view&id=<?php echo $value["id"]?>"><?php echo $value["cName"]?></a></td>

				<td class="username"><?php echo isset(Yii::$app->params["cmpDomain"][$value["domain"]])?Yii::$app->params["cmpDomain"][$value["domain"]]:""?></td>

				<td class="phone"><?php echo $govLeader?($govLeader["name"]."(".$govLeader["mobileNumber"].")"):""?></td>

				<td class="day"><?php echo $govContact?($govContact["name"]."(".$govContact["mobileNumber"].")"):""?></td>				

			</tr>
            <?php 
                    }
                }
            ?>

		</table>

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
	<!--行业类别-->

<div id="J_hangye" class="modal fade hangye" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      		<div class="menuList">					  	
					  	
					  	    <?php 
					  	        $industryArr = $action->getSysTrade();
					  	        //print_r($industryArr);
					  	        $subIndustry = $action->getSysTradeSub();
					  	        foreach ($industryArr as $key=>$value){
					  	    ?>
					  	    <div class="menu_parent">
					  	    
					  	        <a href="javascript:void(0)" class="iteam_parent"><?php echo $key.".".$value;?><span class="glyphicon glyphicon-chevron-right"></span></a>
					  	    
					  	        <div class="menu_children">
					  	    <?php 
					  	            foreach ($subIndustry[$key] as $key1=>$value1){					  	             
					  	    ?>
					  	        <a href="javascript:void(0)" class="iteam_chd" data-typeid="<?php echo $value1["code"];?>"><?php echo $value1["name"];?></a>
					  	    <?php             
					  	            }
					  	    ?>
					  	        </div>
					  	    </div>
					  	    <?php 
					  	        }
					  	    ?>

					  </div>

    </div>

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
		//alert(typeid);
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
</script>	
            