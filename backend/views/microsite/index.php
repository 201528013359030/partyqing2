<?php 
use yii\helpers\Html;
use common\models\Action;
$this->title = '微门户';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">	
	<div class="innerwrap container-fluid listTop" >

		

		<div class="searchBox">

		    <div class="searchType">

		    	<div class="typeIteam">

					<div class="typeName">功 能 区：</div>

					<div class="typeCon">			

                    <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|0"><span>中德高端装备制造产业园</span></a> 

                    <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|1"><span>先进装备制造产业园</span></a>  

                    <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|2"><span>中法生态城</span></a>      

                    <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|3"><span>化工医药产业园</span></a>  

                    <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|4"><span>商住服务聚集区</span></a>  

                    <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|5"><span>现代建筑产业园</span></a> 

                    <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>西部新城</span></a> 

					</div>

				</div>

		        <div class="typeIteam">

		            <div class="typeName">企业分类：</div>

		            <div class="typeCon"><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|0"><span>农、林、牧、渔业</span></a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|1"><span>制造业</span></a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|2"><span>水电煤气供应</span></a>

		                <a

		                href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|3"><span>建筑业</span>

		                    </a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|4"><span>交通运输、仓储和邮政业</span></a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|5"><span>电热设备</span></a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>信息传输、计算机服务和软</span></a>

		                    <a

		                    href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>批发和零售业</span>

		                        </a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>住宿和餐饮业</span></a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>金融业</span></a><a href="javascript:void(0)" class="iteam"

		                        data-typeid="cmpDomain|6"><span>房地产业</span></a><a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>租赁和商务服务业</span></a>

		                        <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>科学研究、技术服务和地质</span></a>

		                        <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>居民服务业</span></a>

		                        <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>教育</span></a>

		                        <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>卫生、社保、福利业</span></a>

		                        <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>文化、体育和娱乐业</span></a>

		                        <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>党政机关和社会组织</span></a>

		            </div>

		        </div>

		        <div class="typeIteam">

		            <div class="typeName">关键字：</div>

		            <div class="typeCon">

		                <input type="text" class="form-control" placeholder="" name="regMark" style="width:240px;" value="">

		            </div>

		        </div>

		    </div>

		</div>

		<div class="controlBar">

			<div class="title">搜索筛选条件：</div>

			<div id="J_titleCon" class="titleCon"></div>

			<div class="option">

			    <input type="hidden" name="cmpDomain" id="cmpDomain" value=""> 

			    <input type="hidden" name="cmpRegcapital" id="cmpRegcapital" value=""> 

			    <input type="hidden" name="cmpFoundtime" id="cmpFoundtime" value=""> 

			    <input type="hidden" name="cmpEmployee" id="cmpEmployee" value=""> 

			    <input type="hidden" name="cmpProduction" id="cmpProduction" value=""> 

			    <input type="hidden" name="cmpNature" id="cmpNature" value=""> 

			    <input type="hidden" name="typeidStr" id="typeidStr" value=""> 

                <input type="hidden" name="page" id="page" value="1">                 

				<a href="javascript:void(0)" class="mobtn submit" onclick="checkData()">开始搜索</a>				

				<a href="index.php?r=microsite/create" class="mobtn second_btn"><i class="icon_add"></i>创建门户</a>

                

			</div>		



		</div>

		

		<ul id="dirlist">

			<li>

				<img src="../web/images/tianniu.jpg" class="dirlist_pic">

				<dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_tianniu.html" title="沈阳天牛家具有限公司">沈阳天牛家具有限公司</a></h4></dt><dd>地址：沈阳经济技术开发区星海路18号</dd><dd>总经理：王大力</dd><dd><a href="http://2762980.b2b.tfsb.cn/">http://2762980.b2b.tfsb.cn/</a></dd></dl></li>

				

			<li>
				<img src="../web/images/jinbaoli.jpg" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳金保利橡塑模具有限公司">沈阳金保利橡塑模具有限公司</a></h4></dt><dd>地址：沈阳经济技术开发区开发23号路26号</dd><dd>总经理：杜先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>
			<li>
				<img src="../web/images/q1.jpg" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳久九纸板有限公司">沈阳久九纸板有限公司</a></h4></dt><dd>地址：沈阳经济技术开发区沈辽西路180号</dd><dd>总经理：张先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>
			<li>
				<img src="../web/images/baoma.png" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳金保利橡塑模具有限公司">华晨宝马汽车有限公司</a></h4></dt><dd>地址：沈阳经济技术开发区沈辽西路191号</dd><dd>总经理：李先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>
			<li>
				<img src="../web/images/q3.jpg" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳金保利橡塑模具有限公司">沈阳东北铸造厂</a></h4></dt><dd>地址：辽宁省沈阳市于洪区浑河西二十街</dd><dd>总经理：王先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>
			<li>
				<img src="../web/images/q4.jpg" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳金保利橡塑模具有限公司">三一重工沈阳分公司</a></h4></dt><dd>地址：沈阳经济技术开发区开发23号路17号</dd><dd>总经理：杜先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>
			<li>
				<img src="../web/images/q5.jpg" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳中达钢结构有限公司">沈阳中达刚结构有限公司</a></h4></dt><dd>地址：沈阳经济技术开发区开发23号路26号</dd><dd>总经理：杜先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>
			<li>
				<img src="../web/images/q6.jpg" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳金保利橡塑模具有限公司">沈阳鼓风机集团有限公司</a></h4></dt><dd>地址：张士开发区开发大路16甲</dd><dd>总经理：李先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>
			<li>
				<img src="../web/images/q7.jpg" class="dirlist_pic">
            <dl><dt><h4><a target="_blank" href="../../zpage/template/html/home_jinbaoli.html" title="沈阳机床有限公司">沈阳东北铸造厂</a></h4></dt><dd>地址：沈阳经济技术开发区开发23号路26号</dd><dd>总经理：杜先生</dd><dd><a href="http://jinbaoli.3566t.com/">http://jinbaoli.3566t.com/</a></dd></dl>
            </li>

</ul>

		

		

		

		

	</div>
</div>
