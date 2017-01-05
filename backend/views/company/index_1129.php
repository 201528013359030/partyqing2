<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Industryinfo;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompanyinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Companyinfos';
$this->title = '企业信息';
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="innerwrap container-fluid listTop">	

		<table class="tableList" cellpadding="0" cellspacing="0">

			<tr>

				<th class="code">编号</th>

				<th>企业名称</th>

				<th class="username">公开联系人</th>

				<th class="phone">公开电话</th>

				<th class="day">申请时间</th>

			</tr>
            <?php 
                foreach ($test as $key=>$value){
                    //print_r($value);
                    //echo "<br>";
            ?>
            <tr>

				<td class="code"><?php echo ($key+1)?></td>

				<td><a href="equ_con.html"><?php echo $value["cName"]?></a></td>

				<td class="username"><?php echo $value["publicContacts"]?></td>

				<td class="phone"><?php echo $value["publicPhone"]?></td>

				<td class="day"><?php echo substr($value["createTime"],0,10)?></td>				

			</tr>
            <?php 
                }
            ?>
			<!-- <tr>

				<td class="code">0012546587</td>

				<td><a href="equ_con.html">中国科学院计算技术研究所有限公司</a></td>

				<td class="username">王大锤</td>

				<td class="phone">024-59878958</td>

				<td class="day">2016-11-16</td>				

			</tr> -->

		</table>

		<div class="pageBtm">

			<nav>

			    <ul class="pagination">

			        <li class="disabled"><a href="#">«</a></li>

			        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>

			        <li><a href="#">2</a></li>

			        <li><a href="#">3</a></li>

			        <li><a href="#">4</a></li>

			        <li><a href="#">5</a></li>

			        <li><a href="#">»</a></li>

			    </ul>

			    <div class="form-inline">

			    	<p class="form-control-static">跳转到：</p>

			    	<div class="form-group">

							<div class="input-group">					

								<input class="form-control" type="text">

								<div class="input-group-addon"><a class="picon" href="javascript:void(0);">GO</a></div>							

							</div>

						</div>

			    </div>

			    <div class="form-inline"> <p class="form-control-static">第1页/共14页</p> </div>

		   	</nav>

		</div>

	</div>
            