<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Industryinfo;
use common\models\SysTrade;
use common\models\Action;
use yii\base\Object;

/* @var $this yii\web\View */
/* @var $model common\models\Companyinfo */

//$this->title = $model->id;
$this->title = "企业详情";
$this->params['breadcrumbs'][] = ['label' => 'Companyinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$action = new Action();
$curyear = date("Y",time());
$fromyear = $curyear - 11;
$economyInfo = $action->getEconomyList($model->id, $fromyear);
//echo "info=".$economyInfo;
?>
<div class="innerwrap bg_form">		

	<div class="innerCotent">

		<div class="formTitle"><a href="#" onclick="javascript:history.back(-1);">返回上一页</a>
		<?php if($model->id){?>
		<a href="index.php?r=company/update&id=<?php echo $model->id?>" class="mobtn mobtnSm primary_btn fr"><i class="icon_editData"></i> 编辑</a>
		<?php }?>
		</div>

		<table class="mytb mytbText" cellpadding="0" cellspacing="0">

				<tr>

					<td class="tdName">注 册 号</td><td class="tdCon"><?php echo $model->regMark?></td>

					<td class="tdName">企业名称</td><td class="tdCon"><?php echo $model->cName?></td>

				</tr>

				<tr>

					<td class="tdName">法定代表人</td><td class="tdCon"><?php echo $model->legalRep?></td>

					<td class="tdName">成立日期</td><td class="tdCon"><?php echo strlen($model->foundingTime)?substr($model->foundingTime,0,10):""?></td>

				</tr>
				
				<tr>

					<td class="tdName">占地面积(平方米)</td><td class="tdCon"><?php echo $model->space?></td>

					<td class="tdName">营业收入(万元)</td><td class="tdCon"><?php echo $model->production?></td>

				</tr>

				<tr>

					<td class="tdName">从业人数</td><td class="tdCon"><?php echo $model->employees?></td>

					<td class="tdName">企业类型</td><td class="tdCon"><?php echo isset(Yii::$app->params["cmpType"][$model->type])?Yii::$app->params["cmpType"][$model->type]:""?></td>

				</tr>
				
				<tr>

					<td class="tdName">地址</td><td class="tdCon"><?php echo $model->position?></td>

					<td class="tdName">联系电话</td><td class="tdCon"><?php echo $model->phone?></td>

				</tr>
				
				<tr>

					<td class="tdName">行业门类</td><td class="tdCon"><?php echo (SysTrade::findOne(['code'=>$model->industryClass]))?(SysTrade::findOne(['code'=>$model->industryClass])->name):""?></td>

					<td class="tdName">行业代码/名称</td><td class="tdCon"><?php echo (SysTrade::findOne(["code"=>$model->ofIndustry]))?(SysTrade::findOne(["code"=>$model->ofIndustry])->name):$model->ofIndustry?></td>

				</tr>
				
				<tr>

					<td class="tdName">企业状态</td><td class="tdCon"><?php echo isset(Yii::$app->params["cmpStatus"][$model->status])?Yii::$app->params["cmpStatus"][$model->status]:""?></td>

					<td class="tdName">登记注册类型</td><td class="tdCon"><?php echo isset(Yii::$app->params["cmpRegtype"][$model->regType])?Yii::$app->params["cmpRegtype"][$model->regType]:""?></td>

				</tr>
				
				<tr>

					<td class="tdName">企业规模</td><td class="tdCon"><?php echo isset(Yii::$app->params["cmpScale"][$model->scale])?Yii::$app->params["cmpScale"][$model->scale]:""?></td>

					<td class="tdName">功能区</td><td class="tdCon"><?php echo isset(Yii::$app->params["cmpDomain"][$model->domain])?Yii::$app->params["cmpDomain"][$model->domain]:""?></td>

				</tr>
				
				<tr>

					<!-- <td class="tdName">所在区域</td><td class="tdCon"><?php //echo strlen($model->localRegion)?Yii::$app->params["cmpRegion"][$model->localRegion]:""?></td> -->
                    
					<td class="tdName">联系人</td><td class="tdCon"><?php echo $model->publicContacts?></td>
                    <td class="tdName" colspan="2"></td>
				</tr>
				
				<tr>

					<td class="tdName">联系方式</td><td class="tdCon"><?php echo $model->publicPhone?></td>

					<td class="tdName">企业名称(简称)</td><td class="tdCon"><?php echo $model->shortName?></td>

				</tr>
				
				<tr>

					<td class="tdName">邮箱</td><td class="tdCon"><?php echo $model->publicEmail?></td>

					<td class="tdName">网址</td><td class="tdCon"><a target="_blank" href="<?php echo $model->publicUrl?>"><?php echo $model->publicUrl?></a></td>

				</tr>
				
				<tr>

					<td class="tdName">机构代码</td><td class="tdCon"><?php echo $model->legalCode?></td>

					<td class="tdName">代码证有效期</td><td class="tdCon"><?php echo $model->validPeriod?></td>

				</tr>
				
				<tr>

					<td class="tdName">注册登记机构</td><td class="tdCon"><?php echo $model->regInstitution?></td>

					<td class="tdName">企业性质</td><td class="tdCon">
					<?php 
					$nature = $model->nature;
					$tmpList = explode(",", $nature);
			        $natureStr = "";
			        for($t=0;$t<count($tmpList);$t++){
			            $tmp = isset(Yii::$app->params["cmpNature"][$tmpList[$t]])?Yii::$app->params["cmpNature"][$tmpList[$t]]:"";
			            if($tmp){
			                $natureStr .= $tmp.",";
			            }
			        } 
			        if(strlen($natureStr)>0){
			            $natureStr = substr($natureStr, 0,-1);
			            $natureStr = str_replace(",", ",<br>", $natureStr);
			        }
					echo $natureStr?>
					</td>

				</tr>
				
				<tr>

					<td class="tdName">经营范围</td><td class="tdCon"><?php echo $model->scope?></td>

					<td class="tdName">投资者情况</td><td class="tdCon">
					<?php 
					echo str_replace(";", ";<br>", $model->investors)?>
					</td>

				</tr>
				<tr>
                    <?php 
                    $govLeader = $action->getGovUserName($model->govLeader);
                    $govContact = $action->getGovUserName($model->govContact);
                    $type = isset(Yii::$app->session["user.identity.type"])?Yii::$app->session["user.identity.type"]:"1";
                    //if(strcasecmp($type, "3")==0){
                    ?>
					<!-- <td class="tdName">政府联系人</td><td class="tdCon"><?php //echo $govContact?($govContact["name"]."(".$govContact["mobileNumber"].")"):""?></td>
					<td class="tdName" colspan="2"></td> -->
                    <?php //}else{?>
                    <td class="tdName">政府负责人</td><td class="tdCon"><?php echo $govLeader?($govLeader["name"]."(".$govLeader["mobileNumber"].")"):""?></td>

					<td class="tdName">政府联系人</td><td class="tdCon"><?php echo $govContact?($govContact["name"]."(".$govContact["mobileNumber"].")"):""?></td>
                    <?php //}?>
					

				</tr>

		</table>

		<br>

		<div class="formTitle">
		<?php if($model->id){?>
		<a href="index.php?r=company/update&id=<?php echo $model->id?>" class="mobtn mobtnSm primary_btn fr"><i class="icon_editData"></i> 编辑</a>
		<?php }?>
		资产信息</div>
        <table class="mytb mytbText" cellpadding="0" cellspacing="0">

				<tr>

					<td class="tdName">资产总额(万元)</td><td class="tdCon"><?php echo $model->assets?></td>

					<td class="tdName">负债总额(万元)</td><td class="tdCon"><?php echo $model->debts?></td>

				</tr>

				<tr>

					<td class="tdName">投资总额(万元)</td><td class="tdCon"><?php echo $model->investments?></td>

					<td class="tdName">纳税总额(万元)</td><td class="tdCon"><?php echo $model->taxes?></td>

				</tr>

		</table>
		
		<br>
        <div class="formTitle">地理位置</div>
		<div style="width:100%;margin:auto; height:300px;">   
        <div id="container" 
            style=" width: 40%;   height: 100%;  margin:0 0 auto;
                border: 1px solid gray;
                overflow:hidden;">
        </div>
    </div>
    <br>
    <!-- <div class="formTitle">近十年的数据统计分析</div>
    <div id="J_echartThird" style="height: 540px;width:50%"></div> -->

</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
<script type="text/javascript">
    var map = new BMap.Map("container");
    map.centerAndZoom("沈阳", 12);
    map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
    map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
    map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开

    var localSearch = new BMap.LocalSearch(map);
    localSearch.enableAutoViewport(); //允许自动调节窗体大小
    //map.clearOverlays();//清空原来的标注
	var keyword = '<?=$model->position?>';
	var cName = '<?=$model->cName?>';
	var kArr = new Array('<?=$model->position?>','<?=$model->cName?>');
    localSearch.setSearchCompleteCallback(function (searchResult) {
        //var poi = searchResult.getPoi(0);
        var poi1 = searchResult[0].getPoi(0);
        var poi2 = searchResult[1].getPoi(0); 
		var poi = "undefined";
		//alert(poi1+"--"+poi2);
        if(poi1 != "undefined"){
			poi = poi1;
        }
        if(poi2 != "undefined"){
        	poi = poi2;
        }
        
        if(poi == "undefined") return;
        //document.getElementById("result_").value = poi.point.lng + "," + poi.point.lat;
        map.centerAndZoom(poi.point, 13);
        var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));  // 创建标注，为要查询的地方对应的经纬度
        map.addOverlay(marker);
        //var content = document.getElementById("text_").value + "<br/><br/>经度：" + poi.point.lng + "<br/>纬度：" + poi.point.lat;
        var infoWindow = new BMap.InfoWindow("<p style='font-size:14px;'>" + cName + "</p>");
        marker.addEventListener("click", function () { this.openInfoWindow(infoWindow); });
        marker.openInfoWindow(infoWindow);
        // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    });
    localSearch.search(kArr);
    var economyInfo = '<?php echo $economyInfo ?>';
</script>
<?=Html::jsFile('@web/js/echarts.min.js')?>
<?=Html::jsFile('@web/js/echart_radar.js')?>
