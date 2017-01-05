<?php

use yii\helpers\Html;
use common\models\Action;
use yii\base\Object;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<?php 
//$this->title = 'Companyinfos';
//$this->title = '企业信息';
//$this->params['breadcrumbs'][] = $this->title;
$actionID = Yii::$app->controller->action->id;
/*if(strcasecmp($actionID, "Periodical")==0){
    echo '<script>window.open( "http://c.wanfangdata.com.cn/Periodical.aspx", "1",   "_blank ")</script>';
}else if(strcasecmp($actionID, "Patent")==0){
    echo '<script>window.open( "http://c.wanfangdata.com.cn/PatentIndex.aspx",   "_blank ")</script>';
}else if(strcasecmp($actionID, "Standard")==0){
    echo '<script>window.open( "http://c.wanfangdata.com.cn/Standard.aspx",   "_blank ")</script>';
}else if(strcasecmp($actionID, "Payoffs")==0){
    echo '<script>window.open( "http://c.wanfangdata.com.cn/Cstad.aspx",   "_blank ")</script>';
}else if(strcasecmp($actionID, "Laws")==0){
    echo '<script>window.open( "http://c.wanfangdata.com.cn/Claw.aspx",   "_blank ")</script>';
}else if(strcasecmp($actionID, "Report")==0){
    echo '<script>window.open( "http://c.wanfangdata.com.cn/NSTR.aspx",   "_blank ")</script>';
}*/
//echo "actionID=".$actionID."<br>";
$action = new Action();
$url = "";
if(strcasecmp($actionID, "Periodical")==0){
    $url = "http://c.wanfangdata.com.cn/Periodical.aspx";
}else if(strcasecmp($actionID, "Patent")==0){
    $url = "http://c.wanfangdata.com.cn/PatentIndex.aspx";
}else if(strcasecmp($actionID, "Standard")==0){
    $url = "http://c.wanfangdata.com.cn/Standard.aspx";
}else if(strcasecmp($actionID, "Payoffs")==0){
    $url = "http://c.wanfangdata.com.cn/Cstad.aspx";
}else if(strcasecmp($actionID, "Laws")==0){
    $url = "http://c.wanfangdata.com.cn/Claw.aspx";
}else if(strcasecmp($actionID, "Report")==0){
    $url = "http://c.wanfangdata.com.cn/NSTR.aspx";
}
//echo "url=".$url."<br>";
$tmpFile = "../views/knowledge/".$actionID;
if(file_exists($tmpFile)){
    $test = file_get_contents($tmpFile);
}else{
    $test = $action->getUrlContent($url);
    //file_put_contents("../views/knowledge/".$actionID, $test);
}
//$test = $action->getUrlContent($url);
echo $test;
?>
<?//=Html::cssFile('@web/css/wf/c.min.css')?>
<?//=Html::cssFile('@web/css/wf/nstr-1.1.0.css')?>
<?//=Html::cssFile('@web/css/wf/periodical.min.css') ?>
<style type="text/css">
.footer {
    text-align: center;
    color: #f0f0f0;
    background: #3399ED;
    border-top: 1px #828282 solid;
    padding: 4px 0;
    font-size: 12px;
	margin-bottom:0px;
}
.endFoot {
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 1000;
}
.footer span {
    padding: 10px;
}
</style>
<!-- <base target="_blank"> -->
<a href="javascript:void(0)"  id="report" target="_blank" style="color:#F1F4F9;font-size:24px;"  style="display:none;" target="_blank"><span >下一步</span></a>

<script type="text/javascript">
var actionId = '<?=$actionID?>';
/*if(actionId == "report"){
	$("#report").click();
}
//alert("id="+actionId);
//document.getElementById(actionId).click();
if (document.all) {
    // For IE
    document.getElementById(actionId).click();
} else if (document.createEvent) {
    //FOR DOM2
    var ev = document.createEvent('MouseEvents');
    ev.initEvent('click', false, true);
    document.getElementById(actionId).dispatchEvent(ev);
}*/
var desUrl= "";
if(actionId == "periodical"){
	desUrl = "http://c.wanfangdata.com.cn/Periodical.aspx";
}else if(actionId == "patent"){
	desUrl = "http://c.wanfangdata.com.cn/PatentIndex.aspx";
}else if(actionId == "standard"){
	desUrl = "http://c.wanfangdata.com.cn/Standard.aspx";
}else if(actionId == "payoffs"){
	desUrl = "http://c.wanfangdata.com.cn/Cstad.aspx";
}else if(actionId == "laws"){
	desUrl = "http://c.wanfangdata.com.cn/Claw.aspx";
}else if(actionId == "report"){
	desUrl = "http://c.wanfangdata.com.cn/NSTR.aspx";
}

document.getElementById("report").setAttribute("href",desUrl); 
//去掉检索、资源行
/*document.getElementsByClassName("nav clear")[0].remove();
//去掉蓝条标题
//alert(document.getElementsByClassName("title-wraper")[0].innerHTML);
document.getElementsByClassName("title-wraper")[0].remove();
//去掉底部
document.getElementsByClassName("footer-wrap")[0].remove();
//去掉科技报告下方广告
if(document.getElementsByClassName("nstr-en clearfloat")){
	//document.getElementsByClassName("nstr-en clearfloat")[0].remove();
}

//document.getElementsByClassName("header")[1].className="header1";
document.getElementsByClassName("header")[1].style.background="#ffffff url()";

//document.getElementsByClassName("desc-resource")[0].className="desc-resource1";


//科技报告中斜线图片
var sub=document.getElementsByClassName("title sub-title");
if(sub){
	for(var s=0;s<sub.length;s++){
    	var firstChild = sub[s].firstChild;
    	var img= firstChild.nextSibling.nextSibling.nextSibling;
    	img.src = "../web/css/wf/nstr-split.png";
    	//alert(firstChild+"--"+img.innerHTML+"--"+img.src);
    }
}
//专利中加强版图片
var strengthen = document.getElementsByClassName("strengthen-icon");
if(strengthen){
	for(var s=0;s<strengthen.length;s++){
    	var firstChild = strengthen[s].firstChild;
    	//alert(firstChild);
    	var img= firstChild.nextSibling;
    	//alert(img);
    	img.src = "../web/css/wf/strengthen-logo.png";
    	//alert(firstChild+"--"+img.innerHTML+"--"+img.src);
    }
}

*/
//主体部分的链接
var links = document.getElementsByClassName("link");
for(var i=0;i<links.length;i++){	
	var tmp = links[i].href;
	/*if(i==0){
		alert(links[i].href+"---"+links[i].innerHTML+"--"+tmp.indexOf("advanced/backend/web"));
	}*/
	
	if(tmp.indexOf("advanced/backend/web")>0){
		var tmpList = tmp.split("advanced/backend/web/");
		links[i].href = "http://c.wanfangdata.com.cn/"+tmpList[1];
	}
	links[i].target = "_blank";
}
//期刊中本周更新中的链接
var s= document.getElementsByClassName("item");
for(var i=0;i<s.length;i++){	
	var childs= s[i].getElementsByTagName("a"); 
	/*if(i==0){
		alert(s[i].innerHTML+"--"+childs[0].href);
	}*/
	for(var j=0;j<childs.length;j++){
		var tmp2 = childs[j].href;
		if(tmp2.indexOf("/periodical/")>0){
			var tmpList = tmp2.split("/periodical/");
			childs[j].href = "http://c.wanfangdata.com.cn/periodical/"+tmpList[1];
		}
		childs[j].target = "_blank";
	}
}
</script>

	
            