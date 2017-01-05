<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Industryinfo;
use common\models\Action;
use yii\base\Object;
use common\models\SysTrade;

/* @var $this yii\web\View */
/* @var $model common\models\Companyinfo */

//$this->title = 'Update Companyinfo: ' . $model->id;
$this->title = '编辑企业信息';
$this->params['breadcrumbs'][] = ['label' => 'Companyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$action = new Action();
?>
<div class="innerwrap bg_form">

	<div class="innerCotent">

		<div class="formTitle"><!-- <a href="javascript:void(0)" class="mobtn mobtnSm primary_btn fr"><i class="icon_editData"></i> 编辑</a>登记信息 --></div>

		<?php //$form = ActiveForm::begin(); ?>
		<form id="commentForm" method="post" action="index.php?r=company/update&action=update&id=<?php echo $model->id?>" onSubmit="return form_Validator(this);">

			<!--

      	提交校验功能，必填项目  name required

      	具体用法参考

      	http://www.runoob.com/jquery/jquery-plugin-validate.html

    -->

			<table class="mytb mytbEqu" cellpadding="0" cellspacing="0">

				<tr>

					<td class="tdName">注 册 号&nbsp;<!-- <img src="../web/images/star.png"> --></td>

					<td>
					<?php /*echo $form
                    ->field($model, 'regMark')
                    ->label(false)
                    ->textInput(['placeholder' => "",'class'=>'form-control'])*/ ?>
					<input type="text" name="regMark" class="form-control"  placeholder="" value="<?php echo $model->regMark?>">
					</td>

					<td class="tdName">企业名称&nbsp;<img src="../web/images/star.png"></td>
				
					<td>
					<?php /*echo $form
                    ->field($model, 'cName')
                    ->label(false)
                    ->textInput(['placeholder' => "",'class'=>'form-control'])*/ ?>
					<input type="text" name="cName" class="form-control"  placeholder="" value="<?php echo $model->cName?>" required>
					</td>



					<td class="tdName">法定代表人&nbsp;<img src="../web/images/star.png"></td>

					<td>
					<?php /*echo $form
                    ->field($model, 'cName')
                    ->label(false)
                    ->textInput(['placeholder' => "",'class'=>'form-control'])*/ ?>
					<input type="text" name="legalRep" class="form-control"  placeholder="" value="<?php echo $model->legalRep?>" required onkeyup="setValue(this,'publicContacts')">
					</td>
					
				</tr>
				<tr>
					
					<td class="tdName">成立日期&nbsp;<!-- <img src="../web/images/star.png"> --></td>

					<td>
					 <?php /*echo $form
                    ->field($model, 'cName')
                    ->label(false)
                    ->textInput(['placeholder' => "",'class'=>'form-control'])*/ ?>
					<input type="text" name="foundingTime" class="form-control form_datetime"  placeholder="" value="<?php echo $model->foundingTime?>">
					</td>


					<td class="tdName">占地面积<br>(平方米)</td>

					<td>
					<?php /*echo $form
                    ->field($model, 'cName')
                    ->label(false)
                    ->textInput(['placeholder' => "",'class'=>'form-control'])*/ ?>
					<input type="text" class="form-control" name="space"  placeholder=""  value="<?php echo $model->space?$model->space:0?>"  >
					</td>

					<td class="tdName">营业收入<br>(万元)&nbsp;<!-- <img src="../web/images/star.png"> --></td>

					<td>
					<?php /*echo $form
                    ->field($model, 'cName')
                    ->label(false)
                    ->textInput(['placeholder' => "",'class'=>'form-control'])*/ ?>
					<input type="text" class="form-control" name="production"  placeholder=""  value="<?php echo $model->production?$model->production:0?>">
					</td>

					
				</tr>
				<tr>
					
					<td class="tdName">从业人数&nbsp;<!-- <img src="../web/images/star.png"> --></td>

					<td>

					    <input type="text" class="form-control" name="employees"  placeholder=""  value="<?php echo $model->employees?>">
						<!-- <select class="form-control" name="employees">
						  
						  <?php 						      
						      $options = $action->getParamOptions("cmpEmployee", $model->employees);
						      echo $options;
						  ?>

						</select> -->

					</td>

					<td class="tdName">企业类型</td>

					<td>

						<select class="form-control" name="type">

						  <!-- <option>请选择</option>

						  <option>类型一</option>

						  <option>类型二</option> -->
						  <?php 						      
						      $options = $action->getParamOptions("cmpType", $model->type);
						      echo $options;
						  ?>

						</select>

					</td>




					<td class="tdName">地址</td>

					<td><input type="text" class="form-control" name="position"  placeholder="" value="<?php echo $model->position?>"  ></td>
					
				</tr>
				<tr>
					
					<td class="tdName">联系电话&nbsp;<img src="../web/images/star.png"></td>

					<td><input type="text" class="form-control" name="phone"  placeholder="" value="<?php echo $model->phone?>" required  onkeyup="setValue(this,'publicPhone')"></td>


					<td class="tdName">行业门类&nbsp;<!-- <img src="../web/images/star.png"> --></td>

					<td>

						<select class="form-control" name="industryClass" id="industryClass" onchange="changeIndustry();">
						  <?php 						      
						      $options = $action->getTradeOptions($model->industryClass);
						      echo $options;
						  ?>

						</select>

					</td>

					<td class="tdName">行业代码&nbsp;<img src="../web/images/star.png"></td>

					<td>

						<!-- <input type="text" class="form-control"  placeholder="" name="ofIndustry" id="ofIndustry"  value="<?php //echo $model->ofIndustry?>" required > -->

						<?php 
						$tradeInfo = SysTrade::find()->where(['code'=>$model->ofIndustry])->asArray()->one();
						$name = "";
						if($tradeInfo){
						    $name = $tradeInfo["name"];
						}
						?>
                        <input type="text" class="form-control"  placeholder="" name="ofIndustryName" id="ofIndustryName"  value="<?php echo $model->ofIndustry?>" required  onblur="setIndustryName(this)">

                        <input type="hidden" name="ofIndustry" id="ofIndustry"  value="<?php echo $model->ofIndustry?>">
					</td>

					
				</tr>
				<tr>
					

					<td class="tdName">企业状态</td>

					<td>

						<select class="form-control" name="status">

						  <!-- <option>请选择</option>

						  <option>营业中</option>

						  <option>已关闭</option> -->
						  <?php 						      
						      $options = $action->getParamOptions("cmpStatus", $model->status);
						      echo $options;
						  ?>

						</select>

					</td>

					<td class="tdName">登记注册类型</td>

					<td>

						<select class="form-control" name="regType">

						  <!-- <option>请选择</option>

						  <option>类型1</option>

						  <option>类型2</option> -->
						  <?php 						      
						      $options = $action->getParamOptions("cmpRegtype", $model->regType);
						      echo $options;
						  ?>

						</select>

					</td>

					<td class="tdName">企业规模</td>

					<td>

						<select class="form-control" name="scale">

						  <!-- <option>规模1</option>

						  <option>规模2</option> -->
						  <?php 						      
						      $options = $action->getParamOptions("cmpScale", $model->scale);
						      echo $options;
						  ?>

						</select>

					</td>
					
				</tr>
				<tr>
					
					<td class="tdName">功能区&nbsp;<!-- <img src="../web/images/star.png"> --></td>

					<td>

					<?php /*echo $form->field($model, 'domain')->dropDownList(Yii::$app->params["cmpDomain"],
			['prompt'=>'请选择',
			'class'=>'form-control'
			])->label(false);*/ ?>
						<select class="form-control" name="domain">

						  <!-- <option>中德园</option>

						  <option>中法园</option> -->
						  <?php 						      
						      $options = $action->getParamOptions("cmpDomain", $model->domain);
						      echo $options;
						  ?>

						</select>

					</td>


					<td class="tdName">注册资本<br>(万元)</td>

					<td>
					
					    <input type="text" class="form-control"  placeholder="" name="regCapital" value="<?php echo $model->regCapital?$model->regCapital:0?>"  >
					    
					</td>
                    <td class="tdName" colspan="2"></td>
					<!-- <td class="tdName">所在区域</td>

					<td>

						<select class="form-control" name="localRegion">
						  <?php 						      
						      //$options = $action->getParamOptions("cmpRegion", $model->localRegion);
						     // echo $options;
						  ?>

						</select>

					</td> -->
					
				</tr>
				<tr>
					
					<td class="tdName">联系人</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="publicContacts" id="publicContacts" value="<?php echo $model->publicContacts?>"  >

					</td>

					<td class="tdName">联系方式</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="publicPhone" id="publicPhone" value="<?php echo $model->publicPhone?>" >

					</td>

					<td class="tdName">企业名称(简称)</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="shortName"  value="<?php echo $model->shortName?>"  >

					</td>
					
				</tr>
				<tr>
					
					<td class="tdName">邮箱</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="publicEmail"  value="<?php echo $model->publicEmail?>"  >

					</td>

					<td class="tdName">网址</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="publicUrl"  value="<?php echo $model->publicUrl?>"  >

					</td>

					<td class="tdName">&nbsp;</td>

					<td>&nbsp;</td>
                    <?php echo Html::hiddenInput('id', $model->id);?>
                    <?php echo Html::hiddenInput('eid', $model->eid);?>
                    <?php echo Html::hiddenInput('investors',$model->investors);?>
                    <?php echo Html::hiddenInput('nature',$model->nature);?>
				</tr>
                
                <tr>
					<td class="tdName">机构代码</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="legalCode" id="legalCode" value="<?php echo $model->legalCode?>"  >

					</td>

					<td class="tdName">代码有效期</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="validPeriod" id="validPeriod" value="<?php echo $model->validPeriod?>" >

					</td>


					<td class="tdName">注册登记机构</td>

					<td>

						<input type="text" class="form-control"  placeholder="" name="regInstitution" id="regInstitution"  value="<?php echo $model->regInstitution?>"  >

					</td>

				</tr>
				
				<tr>
					<td class="tdName">企业性质</td>

					<td colspan="5">				
					   
                        <?php 						      
						      $options = $action->getParamCheckboxs("cmpNature", $model->nature,"natureOther");
						      echo $options;
						  ?>
					</td>

				</tr>
				
				<tr>
					<td class="tdName">经营范围</td>

					<td colspan="5">
					
                        <textarea rows="3" cols="100%" name="scope" id="scope" ><?php echo $model->scope?></textarea>

					</td>

				</tr>
				
				<tr>
					<td class="tdName">投资者情况</td>

					<td colspan="5">
					   <table style="width:100%" id="tab_investor">
					       <?php 
					           $investList = explode(";", $model->investors);
					           for($i=0;$i<count($investList);$i++){
					               $tmpList = explode(",", $investList[$i]);
					       ?>        
					       <tr>
					           <td style="width:25%">
					               <input type="text" class="form-control"  placeholder="投资者姓名"  value="<?php echo $tmpList[0];?>"  >
					           </td>
					           <td style="width:40%">

            						<input type="text" class="form-control"  placeholder="投资金额"  value="<?php echo isset($tmpList[1])?$tmpList[1]:"";?>"  >
            
            					</td>
            					<td style="width:25%">
            
            						<input type="text" class="form-control"  placeholder="所占比例" value="<?php echo isset($tmpList[2])?$tmpList[2]:"";?>"  >
            
            					</td>
            					<td>
            					   <?php if($i==0){?>
            					   <img src="../web/images/maximize.png" title="增加投资者" onclick="addRow()"/>
            					   <?php }else{?>
            					   <img src="../web/images/minimize.png" title="删除" onclick="delRow(this)"/>
            					   <?php }?>
            					</td>
					       </tr>   
					       <?php         
					           }
					       ?>
					       
					   </table>
					</td>
					
                    <td>

						

					</td>
				</tr>
				<tr>
					<td class="tdName">政府负责人</td>

					<td>
                        <?php 
                        $type = isset(Yii::$app->session["user.identity.type"])?Yii::$app->session["user.identity.type"]:"1";
                        if(strcasecmp($type, "3")==0){
                        ?>
                        <select class="form-control" name="govLeader" disabled>
                        <?php }else{?>
                        <select class="form-control" name="govLeader">
                        <?php }?>					

						  <!-- <option>请选择</option> -->
						  <?php 						      
						      echo $govLeader;
						  ?>

						</select>
					</td>

					<td class="tdName">政府联系人</td>

					<td>
                        <?php 
                        if(strcasecmp($type, "3")==0){
                        ?>
                        <select class="form-control" name="govContact" disabled>
                        <?php }else{?>
                        <select class="form-control" name="govContact">
                        <?php }?>			

						  <!-- <option>请选择</option> -->
						  <?php 						      
						      echo $govContact;
						  ?>

						</select>

					</td>


					<td class="tdName"></td>

					<td></td>

				</tr>
				
			</table>

			<div class="buttnGroup">

				<input class="submit" type="submit" value="提交">

				<a href="javascript:void(0)" class="mobtn default_btn">取消</a>

			</div>

			

		</form>
		<?php //ActiveForm::end(); ?>

	</div>

	

</div>
<script type="text/javascript">
function changeIndustry(){
	var industryClass = $("#industryClass").val();
	//alert(industryClass);
	/*$.get("index.php?r=company/industry-desp",{
		info:industryClass
	},function(data,textStatus){
		//alert(data);
		$("#ofIndustry").attr("placeholder",data);
	});*/
}
function setValue(f,des){
	var tmp = $(f).val();
	$("#"+des).val(tmp);
}
function setIndustryName(f){
	var tmp = $(f).val();
	var list = tmp.split("--");
	$("#ofIndustry").val(list[0]);
	/*$.get("index.php?r=company/industry-name",{
		info:list[0]
	},function(data,textStatus){
		//alert(data);
		if(data){
			$(f).val(list[0]+"--"+data);
		}
	});*/
}
function addRow(){
	var tab = $("#tab_investor");
	var tmp = "<tr><td>"+
    "<input type='text' class='form-control'  placeholder='投资者姓名'>"+
	"</td><td>"+
	"<input type='text' class='form-control'  placeholder='投资金额'>"+
	"</td>	<td>"+
	"<input type='text' class='form-control'  placeholder='所占比例'>"+
	"</td>	<td>"+
	"<img src='../web/images/minimize.png' title='删除' onclick='delRow(this)'/>"+
	"</td></tr>";
	tab.append(tmp);
}
function delRow(f){
	/*if (!confirm('确定删除此行？')) {  
        return;  
    }*/  
	var loop = 0;   //加入循环次数，防止死循环  
    while (f.tagName != "TR" && loop < 10) {  
        f = f.parentNode;  
        loop++;  
    }  
    if (f.tagName != "TR") {  
        return;  
    }
    $(f).remove();  
}
function form_Validator(f){
	var investors = "";
	var tmp = "";
	$("#tab_investor tr").each(function(){
        var tdArr = $(this).children();
        var investorName = tdArr.eq(0).find('input').val();//投资者姓名
        var investValue = tdArr.eq(1).find('input').val();//投资金额
        var investPercent = tdArr.eq(2).find('input').val();//所占比例
        if(investorName.length>0 && investValue.length>0 && investValue.length>0){
    		tmp = investorName+","+investValue+","+investPercent;
            //alert(investorName+","+investValue+","+investPercent);               
    		investors += tmp+";";
        }                
    });
    var natureChk = "";
    $("input[name='natureOther']:checked").each(function(){
    	natureChk += $(this).val()+",";
    });
    if(natureChk.length>0){
		natureChk = natureChk.substring(0,natureChk.length-1);
    }
    //alert(natureChk+"----"+investors);
    $("input[name='nature']").val(natureChk);
    $("input[name='investors']").val(investors);
	return true;
}
</script>
