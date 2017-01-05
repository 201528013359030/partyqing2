<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Publicinfo */

//$this->title = $model->title;
$this->title = '详细信息';
//$this->params['breadcrumbs'][] = ['label' => 'Publicinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '公共信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta content="telephone=no" name="format-detection" />
<!-- <title>公告详情</title> -->
<?=Html::cssFile('@web/css/announce.css')?>
<?=Html::cssFile('@web/css/bootstrap.css')?>
<?=Html::jsFile('@web/js/iscroll.js')?>
<?=Html::jsFile('@web/js/jquery.js')?>
<?=Html::jsFile('@web/js/bootstrap.js')?>
<?=Html::jsFile('@web/js/htmlset.js')?>
</head>
<body>
	
<div id="wrap" class="wrap">
	<div class="moGrid">		
		<div class="header" style="text-align:center">
			<h1><?=$model['title']?></h1>
			
			<small>发布人：<?=$model['sender_name']?> &nbsp; 发布时间：<?=date('Y-m-d H:i:s',intval($model['createTime']))?></small>
			
		
		</div>
	</div>
	<div class="moGrid">	
		<div class="content">
			<!-- <p>				
				<img src="images/temp1.jpg">
			</p> -->
			<p>
			<?=$model['content']?>
			</p>
			<p style='float:right;font-size:12px'>阅读数：<?=$model['readers']?></p>
		</div>
	</div>
	<div class="moGrid" id="attaBox">
	<?php if($attachList!=""):?> 
		<div class="attaBox">
		
		  <?php foreach ($attachList as $key=>$value): ?>
			<i class="ficon ic_atta"></i>
            <div href="#" class="attaIteam" style="cursor:pointer;" onclick='download_file("<?=$value['path']?>","<?=$value['name']?>","<?=$value['size']?>","<?=$value['url']?>");'>
				<i class="ficon ic_file"></i><?=$value['name']?>
			</div>
			<? endforeach?>
		
		</div>
	<?endif?>
	</div>
</div>
<a id="sendSucceed" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#sendModal" style="display:none">
</a>

<input type="hidden" id="attach_count" value=<?=$attach_count?>></input>


<script type="text/javascript">

var cls;

function g( selector ){
	var method = selector.substr(0,1) == '.'?'getElementsByClassName':'getElementById';
	return document[method]( selector.substr(1) );
}	
var u = navigator.userAgent, app = navigator.appVersion;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器
var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
API.init();
function download_file(file,name,size,url){
    //if(!download_start(name,url,size)){
   // }
   // window.location.href='index.php?r=admin/noticecontent/download&file='+file+'&name='+name;
   // return false;
    if(isAndroid || isiOS){
        download_start(name,url,size);
    }else{
        download_start(name,url,size);
        window.location.href='index.php?r=publicinfo/download&file='+file+'&name='+name;
    }
    return false;
}
var fileID = 1;
var taskID = 1;
function download_start(name,url,size){
    var op = {
        "name": "Download",
        "callback": "OnDownloadCb",
        "params": {
            "fileName": name,
            "fileID": fileID++,
            "taskID": taskID++,
            "size": size,
           // "path": "<?=$offline_ip?>"+url,
            "path": url,
        }
    };
//    alert(JSON.stringify(op));
    API.send_tonative(op);
}
function OnDownloadCb(param){
    params = param.result.params; 
 //   alert(JSON.stringify(params));
    if(params.transferStatus == 'Success'){
 //       alert("下载成功");
    }else if(params.transferStatus == 'Failure'){
  //      alert("下载失败");
    }

}

</script>


</body>
</html>




