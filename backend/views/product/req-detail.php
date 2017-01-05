<?php 
use yii\helpers\Html;
use common\models\Action;
use common\models\ProductMenu;
use yii\helpers\Url;
$this->title = '产品需求';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">	
	<div class="innerwrap" >

		

		

		<div class="pt20">

			

			<div class="fwxqNn">
				<?php $image = json_decode($detail['image'],true); ?>
    <div class="imgBoxM">

        <div class="imgBox" id="s_img">

            <img id="31849" src="<?php echo $imgIp.$image[0]['path']?>"  title="<?php echo $detail['title']?>">

            

        </div>

    </div>

    <div class="fwxqN12"><span class="tit"><?php echo $detail['title']?> &nbsp;<a title="服务项目资质已认证" id="prod_auth_flag"><img src="../web/images/logo2.gif"></a></span>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="fwxqN12tab">

            <tbody>

                <tr>

                    <td width="19%">分&nbsp;&nbsp;&nbsp;&nbsp;类：</td>

                    <td width="81%"><?php echo  ProductMenu::find()->where(['Id'=>$detail['type']])->asArray()->one()['name']?></td>

                </tr>

                <tr>

                    <td>联系人：</td>

                    <td><?php echo $detail['contact_name']?></td>

                </tr>

                <tr>

                    <td>联系方式：</td>

                    <td><?php echo $detail['contact_tel']?></td>

                </tr>

                <tr>

                    <td>发布时间：</td>

                    <td><?php echo date('Y-m-d',intval($detail['createTime']));?></td>

                </tr>                

                <tr>

                    <td>收货地址：</td>

                    <td><?php echo $detail['address']?></td>

                </tr>

                

            </tbody>

        </table>

    </div>

        

    <div class="fwxqNn pt20">

    <div class="fwxqN21">

        <div class="fwxqN211">同类服务项目</div>

        <div class="fwxqN212" id="tlfw">

        	

        	<ul class="new-class">
        		<?php foreach ($lists as $list):?>
        		<li>
        			<a href="<?=Url::to(['product/req-detail','id'=>$list['Id']])?>" title="<?php echo $list['title']?>"><?php echo $list['title']?></a>
        		</li>
        		<?php endforeach;?>
<!--         		<li> -->
<!--         			<a href="d27363.htm" title="仪器收购^二手回收^工厂倒闭^旧设备回收^上门回收">仪器收购^二手回收^工厂倒闭^旧设备回收^上门回收</a> -->
<!--         		</li><li><a href="d27359.htm" title="示波器回收^收购工厂淘汰仪器">示波器回收^收购工厂淘汰仪器</a></li><li><a href="d27344.htm" title="仪器回收^仪器变卖^高价收购二手仪器">仪器回收^仪器变卖^高价收购二手仪器</a></li><li><a href="d27327.htm" title="现款回收Agilent E5063A二手收购价格">现款回收Agilent E5063A二手收购价格</a></li><li><a href="d27326.htm" title="回收闲置仪器Agilent E5061B公开收购">回收闲置仪器Agilent E5061B公开收购</a></li><li><a href="d27294.htm" title="富锦泰求购JUKI2050 MNLA镭射E9611729000 8010518">富锦泰求购JUKI2050 MNLA镭射E9611729000 8010518</a></li><li><a href="d27293.htm" title="富锦泰求购JUKI2030(2040)镭射E9611729000 8008000">富锦泰求购JUKI2030(2040)镭射E9611729000 8008000</a></li><li><a href="d27292.htm" title="富锦泰求购JUKI2020(2030)镭射E9611729000 8006268">富锦泰求购JUKI2020(2030)镭射E9611729000 8006268</a></li><li><a href="d27291.htm" title="富锦泰求购JUKI2020 NFMLA镭射40003264 8005674">富锦泰求购JUKI2020 NFMLA镭射40003264 8005674</a></li> -->
        	</ul>

        	

        </div>

    </div>

    <div class="fwxqN22">

        <div class="fwxqN22_tou">

        	<a href="javascript:;" id="qc1" onclick="i_changeContent('qc1','qc2');" style="background: url(../web/images/bgnn_20.gif) no-repeat; color: #ffffff;">详 情</a>        	

        </div>

        <div class="fwxqN22_bod" style="DISPLAY: block" id="div_qc1">

        	<span class="nrtit">需求设备类型：</span>

        	<span class="nrnr1"><?php echo $detail['detail']?> </span>

        	<span class="nrtit">备注：</span>

        	<span class="nrnr1"><?php echo $detail['remark']?></span>

              

        </div>

        

    </div>

</div>

    

    

    

    

</div>

			

			

		</div>

		

		

	</div>
</div>
