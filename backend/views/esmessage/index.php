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
$this->title = '处理信息';
$this->params['breadcrumbs'][] = $this->title;

$action = new Action();
 
 
 
?>
	<div class="innerwrap container-fluid listTop">	
	<div class="controlBar">
<?php if(isset($_SESSION['tip']))echo 'tip:'. $_SESSION['tip'];unset($_SESSION['tip']);?>
			 </div>
	    <form id="queryForm" method="post" action="index.php?r=esmessage/index&action=query">
	    
        <div class="searchBox">

			<div class="searchType">
 

				 
                
				<div class="typeIteam">
 
				 

					<div class="typeCon">
	 
		 

			<span class="iteamShow">类型：</span>		 
    <select class="form-control" style="width:120px;" name="type">
						 
					          <option   value="0">全部</option>		   				
					<?php 
					
					$type = is_array($queryConf)?$queryConf["type"]:"";
					   $paramArr = \Yii::$app->params["esType"];
				 
					   foreach ($paramArr as $key=>$value){
					       if($type && $key==$type ){
			           ?>
                     
                        <option  selected="selected"  value="<?php echo $key;?>"><?php echo $value;?></option>
                       <?php                                    
                               }else{
                       ?>     
                          <option   value="<?php echo $key;?>"><?php echo $value;?></option>
                            
                       <?php         
                               }
   					   }
   				    ?>
							</select>
					 
				 
				 <span class="iteamShow">状态：</span>
				    <select class="form-control" style="width:120px;" name="status">
						 
					          <option   value="0">全部</option>		   				
					<?php 
					
					$status = is_array($queryConf)?$queryConf["status"]:"";
					   $paramArr = \Yii::$app->params["esStatus"];
				 
					   foreach ($paramArr as $key=>$value){
					       if($status && $key==$status ){
			           ?>
                     
                        <option  selected="selected"  value="<?php echo $key;?>"><?php echo $value;?></option>
                       <?php                                    
                               }else{
                       ?>     
                          <option   value="<?php echo $key;?>"><?php echo $value;?></option>
                            
                       <?php         
                               }
   					   }
   				    ?>
							</select>	
				 

			</div>

		</div>

		</div>

		

		<div class="controlBar">

 
			 

			<div class="option">
			     
                <input type="hidden" name="page" id="page" value="<?php echo $page;?>" /> 
                
				<a href="javascript:void(0)" class="mobtn submit" onclick="checkData()">开始搜索</a>
				
				 

			</div>		

		</div>
		
		</form>
        
		<table class="tableList" cellpadding="0" cellspacing="0">

			<tr>

				<th class="code">编号</th>

				<th>标题</th>

				<th class="username">类别</th>
<th class="username">姓名</th>
<th class="username">电话</th>
				<th class="phone">状态</th>
<th class="day">创建时间</th>
				<th class="day">处理时间</th>
<th class="day">操作</th>
			</tr>
            <?php 
                if(is_array($cmpList)){
                    foreach ($cmpList as $key=>$value){
                    //print_r($value);
                    //echo "<br>";
            ?>
            <tr>

				<td class="code"><?php echo ($key+1+($page-1)*Yii::$app->params["pageSize"])?></td>

				<td><a href="index.php?r=esmessage/update&id=<?php echo $value["id"]?>"><?php echo $value["Title"]?></a></td>
	<td class="username"><?php echo $value["typeStr"]?></td>
				<td class="username"><?php echo $value["name"]?></td>
		<td class="username"><?php echo $value["Phone"]?></td>
				<td class="day"><?php  echo $value["statusStr"];?></td>	
	<td class="day"><?php echo substr($value["createtime"],0,10)?></td>	
				<td class="day"><?php echo substr($value["Updatetime"],0,10)?></td>	
 		
<td><a href="index.php?r=esmessage/delete&id=<?php echo $value["id"]?>" onclick="javascript:return ConfirmDel();">删除</a>&nbsp;&nbsp;&nbsp;<a href="index.php?r=esmessage/update&id=<?php echo $value["id"]?>">处理</a></td>
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
//删除时弹出确认按钮方法
function ConfirmDel() {
if (confirm("真的要删除吗？")){
return true;
}else{
return false;
}
}

</script>	
            