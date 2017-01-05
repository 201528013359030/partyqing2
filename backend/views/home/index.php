<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use common\models\Action;
use yii\base\Object;
$action = new Action();
$domainList = $action->getDomainStat();
//print_r($domainList);
?>
<div class="innerwrap" >

	<div class="row">

			<div class="col-sm-4">

				<div class="newspic">

					<div class="title"><i class="glyphicon glyphicon-th-large"></i> 图文新闻</div>

					<div class="swiper-container" style="height: 219px;">

			        <div class="swiper-wrapper">

			            <div class="swiper-slide" style="cursor:pointer" onclick="window.location.href='index.php?r=publicinfo/view&id=80'">
                            <a href="index.php?r=publicinfo/view&id=74"></a>

			            	<img src="../web/images/s1.jpg">

			            </div>

			            <div class="swiper-slide">

			            	<img src="../web/images/s2.jpg">

			            </div>

			            <div class="swiper-slide">

			            	<img src="../web/images/s3.jpg">

			            </div>

			        </div>

			        <!-- Add Pagination -->

			        <div class="swiper-pagination"></div>

			    </div>

				</div>

			</div>

			<div class="col-sm-8">

				<div class="mo-tabs news_area">

					

					<ul id="myTab" class="nav nav-tabs" role="tablist">
			      <li role="presentation" class="active"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">公共信息</a></li>

			      <li role="presentation" class=""><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">通知公告</a></li>


			      

			    </ul>

			    <div id="myTabContent" class="tab-content">

			      <div role="tabpanel" class="tab-pane fade " id="home" aria-labelledby="home-tab">

			      	

			      	<ul class="news_l">

 		              <li><span>2016-12-13</span>

		              	  <a href="###" title="关于 “七大农作物育种”等5个重点专项2017年度项目预申报形式审查工作结束的公告" class="list">

关于 “七大农作物育种”等5个重点专项2017年度项目预申报形式审查工作结束的公告		              	  </a>

		              </li>

		              <li><span>2016-12-13</span>

		              	  <a href="###" title="沈阳国际旅游节冬季游23日出发" class="list">沈阳国际旅游节冬季游23日出发	              	  </a>

		              </li> 

		              <li><span>2016-12-13</span>

		              	  <a href="###" title="辽宁省桓仁县水电社区发挥平台作用促进稳定就业" class="list">辽宁省桓仁县水电社区发挥平台作用促进稳定就业</a>

		              </li> 

		              <li><span>2016-12-13</span>

		              	  <a href="###" title="辽宁省营口市创业项目库搭建创业对接平台" class="list">辽宁省营口市创业项目库搭建创业对接平台</a>

		              </li> 

		              <li><span>2016-12-13</span>

		              	  <a href="###" title="三宝屯村的老少爷们儿 村里喊你们回去办新农合" class="list">三宝屯村的老少爷们儿 村里喊你们回去办新农合</a>

		              </li> 



              </ul>

			      	

			      	

			      </div>

				    <div role="tabpanel" class="tab-pane fade active in" id="profile" aria-labelledby="profile-tab">

			      	

			      	<ul class="news_l">

 		              <li><span>2016-12-10</span>

		              	  <a href="index.php?r=publicinfo/view&id=52" title="沈阳停水通知" class="list">沈阳停水通知</a>

		              </li>

		              <li><span>2016-12-08</span>

		              	  <a href="index.php?r=publicinfo/view&id=46" title="千万别逆行！沈阳这几个地区28条街路改单行" class="list">千万别逆行！沈阳这几个地区28条街路改单行</a>

		              </li> 

		              <li><span>2016-12-07</span>

		              	  <a href="index.php?r=publicinfo/view&id=54" title="数据驱动的智慧城市 中兴通讯推进“沈阳模式”落地" class="list">数据驱动的智慧城市 中兴通讯推进“沈阳模式”落地</a>

		              </li> 

		              <li><span>2016-12-07</span>

		              	  <a href="###" title="中德园：打造“中国制造2025”与“德国工业4.0”战略对接示范区" class="list">中德园：打造“中国制造2025”与“德国工业4.0”战略对接示范区</a>

		              </li> 

		              <li><span>2016-12-05</span>

		              	  <a href="###" title="财税部门推出降低企业杠杆率税收支持政策" class="list">财税部门推出降低企业杠杆率税收支持政策</a>

		              </li> 



              </ul>

			      	

			      </div>

		      </div>

					

				</div>

			</div>

		</div>
		<div class="row">

			<div class="col-sm-12"><img src="../web/images/ad1.jpg" class="img-responsive"></div>

		</div>
		<div class="row">

			<div class="col-sm-4">				

				<div id="indexright" class="home_boxtitle">

					<div class="boxtitle"><strong>铁西区基础平台</strong></div>

					<div class="boxcontent">

						<ul class="clearfix home_system">

					<li><a href="http://218.60.48.10/platform/" target="_blank">开发区网上审批系统(新)</a></li>

					<li><a href="http://218.60.48.10/platform/xzspos" target="_blank">开发区网上办事大厅</a></li>

					<li><a href="http://218.60.48.5:8080/jianzheng/main/login/index.jsp" target="_blank">价格鉴证管理平台</a></li>

                                        <li><a href="http://218.60.48.10/platform/" target="_blank">中德园网上审批系统</a></li>

                                        <li><a href="http://218.60.48.10/platform/xzspos/v2/index.jsp?name=zdy_sp" target="_blank">中德园网上办事大厅</a></li>

					<li><a href="http://218.60.48.132/platform/" target="_blank">铁西区网上审批系统（新）</a></li>

					<li><a href="http://218.60.48.132/platform/xzspos" target="_blank">铁西区网上办事大厅</a></li>					

					<li><a href="http://www.sydz.gov.cn" target="_blank">铁西区开发区门户</a></li>

					<li><a href="#">审批事项监督系统</a></li>

					<li><a href="http://218.60.48.10/platform/xzspos/v2/index.jsp" target="_blank">备案项目申报办理平台</a></li>					

					<li><a href="http://www.sydz.gov.cn/index.php?s=/bss/www/list1.html" target="_blank">铁西区原审批系统</a></li>

					<li><a href="http://zs.sysp.gov.cn/" target="_blank">开发区原审批系统</a></li>

					<!-- <li><a href="http://218.60.48.12:8080/xxpt" target="_blank">公务员在线学习平台</a></li>

					<li><a href="http://www.sysp.gov.cn/">沈阳市审批系统</a></li> -->

				<!-- 	<li><a href="#">铁西区原审批系统</a></li>

					<li><a href="#">开发区原审批系统</a></li>

					<li><a href="#">沈阳市审批系统</a></li> -->

				</ul>

					</div>	

				</div>

			</div>

			<div class="col-sm-8">

				

				<div id="indexpcat" class="home_boxtitle">

					<div class="boxtitle"><strong>产品供应</strong></div>

					<div class="boxcontent">

<ul id="homecat">

	<li class="bcat"><strong><a href="index.php?r=product/product-list" target="_blank" title="电工电气"><em>电工电气</em></a></strong>

<a href="http://product.11467.com/dianxiandianlan/" title="电线、电缆">电线电缆</a> 

 | <a href="http://product.11467.com/kaiguan/" title="开关">开关</a> 

 | <a href="http://product.11467.com/diandongji/" title="电动机">电动机</a> 

 | <a href="http://product.11467.com/dianreshebei/" title="电热设备">电热设备</a> 

<br><a href="http://product.11467.com/fadianji/" title="发电机、发电机组">发电机发电机组</a> 

 | <a href="http://product.11467.com/gongkongxitongjizhuangbei/" title="工控系统及装备">工控系统及装备</a> 

<br><a href="http://product.11467.com/dianchi/" title="电池">电池</a> 

 | <a href="http://product.11467.com/peidianshudianshebei/" title="配电输电设备">配电输电设备</a> 

 | <a href="index.php?r=product/product-inner" title="绝缘材料"><em>绝缘材料</em></a> 

 | <a href="http://product.11467.com/diyadianqi/" title="低压电器">低压电器</a> 

<br><a href="http://product.11467.com/dianyuan/" title="电源">电源</a> 

 | <a href="http://product.11467.com/fangjingdianchanpin/" title="防静电产品">防静电产品</a> 

 | <a href="http://product.11467.com/chazuo/" title="插座">插座</a> 

 | <a href="http://product.11467.com/chatou/" title="插头">插头</a> 

 | <a href="http://product.11467.com/gaoyadianqi/" title="高压电器">高压电器</a> 

<br><a href="http://product.11467.com/chongdianqi/" title="充电器">充电器</a> 

 | <a href="http://product.11467.com/taiyangnengguangfuxiliechanpin/" title="太阳能光伏系列产品">太阳能光伏系列产品</a> 

 | <a href="http://product.11467.com/kucundiangongdianqichanpin/" title="库存电工电气产品">库存电工电气产品</a> 

<br><a href="http://product.11467.com/diangongdianqichengtaoshebei/" title="电工电器成套设备">电工电器成套设备</a> 

 | <a href="http://product.11467.com/diangongdianqichanpinjiagong/" title="电工电气产品加工">电工电气产品加工</a> 

<br></li>



<li class="bcat catr"><strong><a href="http://product.11467.com/dianzi/" title="电子元件">电子元件</a></strong>

<a href="http://product.11467.com/lianjieqi/" title="连接器">连接器</a> 

 | <a href="http://product.11467.com/chuanganqi/" title="传感器">传感器</a> 

 | <a href="http://product.11467.com/IC/" title="集成电路(IC)">集成电路(IC)</a> 

<br><a href="http://product.11467.com/bianyaqi/" title="变压器">变压器</a> 

 | <a href="http://product.11467.com/LED/" title="LED系列产品">LED系列产品</a> 

 | <a href="http://product.11467.com/erjiguan/" title="二极管">二极管</a> 

 | <a href="http://product.11467.com/PCB/" title="PCB电路板">PCB电路板</a> 

<br><a href="http://product.11467.com/dianrongqi/" title="电容器">电容器</a> 

 | <a href="http://product.11467.com/dianganqi/" title="电感器">电感器</a> 

 | <a href="http://product.11467.com/jidianqi/" title="继电器">继电器</a> 

 | <a href="http://product.11467.com/bianpinqi/" title="变频器">变频器</a> 

 | <a href="http://product.11467.com/guangdianqijian/" title="光电器件">光电器件</a> 

<br><a href="http://product.11467.com/dianzijiagong/" title="电子加工">电子加工</a> 

 | <a href="http://product.11467.com/dianzuqi/" title="电阻器">电阻器</a> 

 | <a href="http://product.11467.com/dianshengqijian/" title="电声器件">电声器件</a> 

 | <a href="http://product.11467.com/baohuqijian/" title="保护器件">保护器件</a> 

<br><a href="http://product.11467.com/yadianjingti/" title="压电晶体、频率元件">压电晶体频率元件</a> 

 | <a href="http://product.11467.com/xianshiqijian/" title="显示器件">显示器件</a> 

 | <a href="http://product.11467.com/sanjiguan/" title="三极管">三极管</a> 

<br><a href="http://product.11467.com/yangshengqilaba/" title="扬声器(喇叭)">扬声器(喇叭)</a> 

 | </li>

 <li class="bcat"><strong><a href="http://product.11467.com/jixie/" title="机械设备">机械设备</a></strong>

<a href="http://product.11467.com/famen/" title="阀门">阀门</a> 

 | <a href="http://product.11467.com/jichuang/" title="机床">机床</a> 

 | <a href="http://product.11467.com/gongchengjixie/" title="工程建筑机械">工程建筑机械</a> 

 | <a href="http://product.11467.com/beng/" title="泵">泵</a> 

 | <a href="http://product.11467.com/jingujianlianjiejian/" title="紧固连接件">紧固连接件</a> 

<br><a href="http://product.11467.com/huanbaoshebei/" title="环保设备">环保设备</a> 

 | <a href="http://product.11467.com/daojujiaju/" title="刀具夹具">刀具夹具</a> 

 | <a href="http://product.11467.com/zhoucheng/" title="轴承">轴承</a> 

 | <a href="http://product.11467.com/fengjipaifengshebei/" title="风机">风机</a> 

 | <a href="http://product.11467.com/muju/" title="模具">模具</a> 

<br><a href="http://product.11467.com/baozhuangshebei/" title="包装设备">包装设备</a> 

 | <a href="http://product.11467.com/shipinjiagongshebei/" title="食品、饮料加工设备">食品饮料加工设备</a> 

 | <a href="http://product.11467.com/nongyejixie/" title="农业机械">农业机械</a> 

<br><a href="http://product.11467.com/dianhanqiegeshebei/" title="电焊、切割设备">电焊切割设备</a> 

 | <a href="http://product.11467.com/jichuangfujian/" title="机床附件">机床附件</a> 

 | <a href="http://product.11467.com/suliaojixie/" title="塑料机械">塑料机械</a> 

<br><a href="http://product.11467.com/chuandongjian/" title="传动件">传动件</a> 

 | <a href="http://product.11467.com/dianzichanpinzhizaoshebei/" title="电子产品制造设备">电子产品制造设备</a> 

 | <a href="http://product.11467.com/guolvcailiao/" title="过滤材料">过滤材料</a> 

<br><a href="http://product.11467.com/tuzhuangshebei/" title="涂装设备">涂装设备</a> 

 | </li>

 <li class="bcat catr"><strong><a href="http://product.11467.com/qipei/" title="汽摩及配件">汽摩及配件</a></strong>

<a href="http://product.11467.com/qichelingpeijian/" title="汽车零配件">汽车零配件</a> 

 | <a href="http://product.11467.com/weixiuyanghu/" title="维修养护">维修养护</a> 

 | <a href="http://product.11467.com/qicheyongpin/" title="汽车用品">汽车用品</a> 

 | <a href="http://product.11467.com/qiche/" title="汽车">汽车</a> 

<br><a href="http://product.11467.com/motuochejipeijian/" title="摩托车及配件">摩托车及配件</a> 

 | <a href="http://product.11467.com/qimojipeijiandailijiameng/" title="汽摩及配件代理加盟">汽摩及配件代理加盟</a> 

<br><a href="http://product.11467.com/shebeisheshi/" title="设备设施">设备设施</a> 

 | <a href="http://product.11467.com/kucunjiqita/" title="库存及其他">库存及其他</a> 

 | <a href="http://product.11467.com/qimopeijianjiagong/" title="汽摩配件加工">汽摩配件加工</a> 

<br></li>

 

 <li class="bcat"><strong><a href="http://product.11467.com/tongxin/" title="通信产品">通信产品</a></strong>

<a href="http://product.11467.com/chuanshujiaohuanshebei/" title="传输、交换设备">传输交换设备</a> 

 | <a href="http://product.11467.com/tongxinxianlan/" title="通信线缆">通信线缆</a> 

 | <a href="http://product.11467.com/duijiangji/" title="对讲机">对讲机</a> 

<br><a href="http://product.11467.com/tianxian/" title="天线">天线</a> 

 | <a href="http://product.11467.com/jiexushebei/" title="接续设备">接续设备</a> 

 | <a href="http://product.11467.com/buxianchanpin/" title="布线产品">布线产品</a> 

 | <a href="http://product.11467.com/tongxunchanpinjiagong/" title="通讯产品加工">通讯产品加工</a> 

<br><a href="http://product.11467.com/GPSxitong/" title="GPS系统">GPS系统</a> 

 | <a href="http://product.11467.com/dianhuajipeifujian/" title="电话机配附件">电话机配附件</a> 

 | <a href="http://product.11467.com/gudingdianhua/" title="固定电话">固定电话</a> 

<br><a href="http://product.11467.com/qitatongxinchanpin/" title="其他通信产品">其他通信产品</a> 

 | <a href="http://product.11467.com/tongxinqicaidailijiameng/" title="通信器材代理加盟">通信器材代理加盟</a> 

<br><a href="http://product.11467.com/xunhuji/" title="寻呼机">寻呼机</a> 

 | <a href="http://product.11467.com/kucuntongxunchanpin/" title="库存通讯产品">库存通讯产品</a> 

 | <a href="http://product.11467.com/tongxunchanpindailijiameng/" title="通讯产品代理加盟">通讯产品代理加盟</a> 

<br><a href="http://product.11467.com/kucuntongxinqicai/" title="库存通信器材">库存通信器材</a> 

 | <a href="http://product.11467.com/jierushebei/" title="接入设备">接入设备</a> 

 | <a href="http://product.11467.com/RFmokuai/" title="RF模块">RF模块</a> 

<br><a href="http://product.11467.com/duanxinxitong/" title="短信系统">短信系统</a> 

 | <a href="http://product.11467.com/shengxunxitong/" title="声讯系统">声讯系统</a> 

 | </li>

 

 <li class="bcat catr"><strong><a href="http://product.11467.com/jiancai/" title="建筑建材">建筑建材</a></strong>

<a href="http://product.11467.com/gongnengcailiao/" title="功能材料">功能材料</a> 

 | <a href="http://product.11467.com/guanjian/" title="管件">管件</a> 

 | <a href="http://product.11467.com/men/" title="门">门</a> 

 | <a href="http://product.11467.com/muzhicailiao/" title="木质材料">木质材料</a> 

 | <a href="http://product.11467.com/zhuangxiusheshijishigong/" title="装修设施及施工">装修设施及施工</a> 

<br><a href="http://product.11467.com/shicaishiliao/" title="石材石料">石材石料</a> 

 | <a href="http://product.11467.com/qizhucailiao/" title="砌筑材料">砌筑材料</a> 

 | <a href="http://product.11467.com/gongdishigongcailiao/" title="工地施工材料">工地施工材料</a> 

<br><a href="http://product.11467.com/diban/" title="地板">地板</a> 

 | <a href="http://product.11467.com/gongchengchengbao/" title="工程承包">工程承包</a> 

 | <a href="http://product.11467.com/tilei/" title="梯类">梯类</a> 

 | <a href="http://product.11467.com/tezhongjiancai/" title="特种建材">特种建材</a> 

 | <a href="http://product.11467.com/jianzhuboli/" title="建筑玻璃">建筑玻璃</a> 

<br><a href="http://product.11467.com/shiwaimen/" title="室外门">室外门</a> 

 | <a href="http://product.11467.com/chuang/" title="窗">窗</a> 

 | <a href="http://product.11467.com/changguizhaoming/" title="常规照明">常规照明</a> 

 | <a href="http://product.11467.com/jinshujiancai/" title="金属建材">金属建材</a> 

 | <a href="http://product.11467.com/jianzhujiancaileiguancai/" title="建筑、建材类管材">建筑建材类管材</a> 

<br><a href="http://product.11467.com/guandaoxitong/" title="管道系统">管道系统</a> 

 | <a href="http://product.11467.com/weiyujieju/" title="卫浴洁具">卫浴洁具</a> 

 | </li>

 

 

 <li class="bcat"><strong><a href="http://product.11467.com/huanbao/" title="环保">环保</a></strong>

<a href="http://product.11467.com/qitahuanbaoshebei/" title="其他环保设备">其他环保设备</a> 

 | <a href="http://product.11467.com/gonggonghuanweisheshi/" title="公共环卫设施">公共环卫设施</a> 

 | <a href="http://product.11467.com/jienenghuanbaocailiao/" title="节能环保材料">节能环保材料</a> 

<br><a href="http://product.11467.com/huanbaoshebeijiagong/" title="环保设备加工">环保设备加工</a> 

 | <a href="http://product.11467.com/feidianzidianqi/" title="废电子电器">废电子电器</a> 

 | <a href="http://product.11467.com/kongqichulihuaxuepin/" title="空气处理化学品">空气处理化学品</a> 

<br><a href="http://product.11467.com/huanbaoshebeidailijiameng/" title="环保设备代理加盟">环保设备代理加盟</a> 

 | </li>

 

 <li class="bcat catr"><strong><a href="http://product.11467.com/yinshua/" title="印刷">印刷</a></strong>

<a href="http://product.11467.com/yinhoujiagongshebei/" title="印后加工设备">印后加工设备</a> 

 | <a href="http://product.11467.com/shangyeyinshuajiagong/" title="商业印刷加工">商业印刷加工</a> 

 | <a href="http://product.11467.com/fangweijishuchanpin/" title="防伪技术产品">防伪技术产品</a> 

<br><a href="http://product.11467.com/yinshuajixiezhuanyongpeijian/" title="印刷机械专用配件">印刷机械专用配件</a> 

 | <a href="http://product.11467.com/tezhongyinshua/" title="特种印刷">特种印刷</a> 

 | <a href="http://product.11467.com/yinshuaqitaweifenlei/" title="印刷其他未分类">印刷其他未分类</a> 

<br><a href="http://product.11467.com/shenghuoyinshuajiagong/" title="生活印刷加工">生活印刷加工</a> 

 | <a href="http://product.11467.com/yinshuahaocaidailijiameng/" title="印刷耗材代理加盟">印刷耗材代理加盟</a> 

<br><a href="http://product.11467.com/xiangpibu/" title="橡皮布">橡皮布</a> 

 | <a href="http://product.11467.com/kaleiyinshua/" title="卡类印刷">卡类印刷</a> 

 | <a href="http://product.11467.com/yinshuapeitaoshebei/" title="印刷配套设备">印刷配套设备</a> 

 | <a href="http://product.11467.com/sebiaoseka/" title="色标、色卡">色标色卡</a> 

<br><a href="http://product.11467.com/yinshuahaocai/" title="印刷耗材">印刷耗材</a> 

 | <a href="http://product.11467.com/bancai/" title="版材">版材</a> 

 | <a href="http://product.11467.com/baozhuangyinshuajiagong/" title="包装印刷加工">包装印刷加工</a> 

 | <a href="http://product.11467.com/shukanyinshuajiagong/" title="书刊印刷加工">书刊印刷加工</a> 

<br><a href="http://product.11467.com/chanpinyinshuajiagong/" title="产品印刷加工">产品印刷加工</a> 

 | <a href="http://product.11467.com/yinqianchulishebei/" title="印前处理设备">印前处理设备</a> 

 | </li>

  

 <li class="bcat"><strong><a href="http://product.11467.com/jiagong/" title="加工">加工</a></strong>

<a href="http://product.11467.com/jixiewujinjiagong/" title="机械五金加工">机械五金加工</a> 

 | <a href="http://product.11467.com/yinshuajiagong/" title="印刷加工">印刷加工</a> 

 | <a href="http://product.11467.com/meirongchanpinjiagong/" title="美容产品加工">美容产品加工</a> 

<br><a href="http://product.11467.com/pentujiagong/" title="喷涂加工">喷涂加工</a> 

 | </li>

 <li class="bcat catr"><strong><a href="http://product.11467.com/nengyuan/" title="能源">能源</a></strong>

<a href="http://product.11467.com/taiyangnengshebei/" title="太阳能设备">太阳能设备</a> 

 | <a href="http://product.11467.com/shiyouranliao/" title="石油燃料">石油燃料</a> 

 | <a href="http://product.11467.com/qitaweifenleinengyuan/" title="其他未分类能源">其他未分类能源</a> 

<br><a href="http://product.11467.com/fengnengshebei/" title="风能设备">风能设备</a> 

 | <a href="http://product.11467.com/tianranqi/" title="天然气">天然气</a> 

 | <a href="http://product.11467.com/feiyou/" title="废油">废油</a> 

 | <a href="http://product.11467.com/rongjiyou/" title="溶剂油">溶剂油</a> 

 | <a href="http://product.11467.com/nengyuanchanpindailijiameng/" title="能源产品代理加盟">能源产品代理加盟</a> 

<br><a href="http://product.11467.com/shengwunengyuan/" title="生物能源">生物能源</a> 

 | <a href="http://product.11467.com/liqing/" title="沥青">沥青</a> 

 | <a href="http://product.11467.com/meikuangshebei/" title="煤矿设备">煤矿设备</a> 

 | <a href="http://product.11467.com/meizhipin/" title="煤制品">煤制品</a> 

 | <a href="http://product.11467.com/nengyuanchanpinjiagong/" title="能源产品加工">能源产品加工</a> 

<br><a href="http://product.11467.com/yuanmei/" title="原煤">原煤</a> 

 | <a href="http://product.11467.com/shiyoujiao/" title="石油焦">石油焦</a> 

 | <a href="http://product.11467.com/zhaoqishebei/" title="沼气设备">沼气设备</a> 

 | <a href="http://product.11467.com/ranqishebei/" title="燃气设备">燃气设备</a> 

 | </li>

 

</ul>

</div>

				</div>

				

			</div>

		</div>
		<div class="row">

			<div class="col-sm-12">

				<img src="../web/images/ad2.jpg" class="img-responsive">

			</div>

		</div>
		<div class="row marg-top-10">
			<div class="col-sm-12">
				<div class="bianmin_title">
					<div class="boxtitle"><strong></strong></div>
					<div class="row bianmin_content">
						<div class="col-sm-8 inquire">
	    
	    <a href="http://www.sygjj.com:8080/cxxt/personalpaf/personalAction.action" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_zfgjj.png"></div>住房公积金</a>
		<a href="http://www.ylbxglzx.cn/" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_ylbx.png"></div>养老保险</a>
		<a href="http://www.syyb.gov.cn/" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_ylbx2.png"></div>医疗保险</a>
		<a href="http://218.25.90.164/xxcx/sybxcx.html" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_sybx.png"></div>失业保险</a>
		<a href="http://www.syprice.gov.cn/qlony.html" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_mrjg.png"></div>每日价格</a>
		<a href="http://61.161.141.113/searchsys/" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_jtwz.png"></div>交通违章</a>
		<a href="http://211.137.28.42/" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_gjcx.png"></div>公交出行</a>
		<a href="http://travel.syd.com.cn/" target="_blank" class="bianminIteam"><div class="img"><img src="http://www.shenyang.gov.cn/zixun/images/head_nav_lyjd.png"></div>旅游景点</a>	  
						</div>
						<div class="col-sm-4">
							<div id="indexright" class="home_boxtitle">
					
					<div class="boxcontent">
						<ul class="clearfix home_system">
							<li><a href="http://218.60.48.2:8080/platform/main/login/index.jsp">资源共享交换平台</a></li>
					<li><a href="http://218.60.48.59:8081/rkmh/toLogin.action">人口数据库</a></li>
					<li><a href="http://218.60.48.60:8081/frmh/toLogin.action">法人数据库</a></li>
					<!-- <li><a href="http://218.60.48.16:8080/sszt-gsxx/">商事主体数据库</a></li> -->
						</ul>
					</div>	
				</div>
						</div>
						
					</div>					
				</div>
			</div>
		</div>
		<div class="row marg-top-10">

			<div class="col-sm-4">

				<div class="new-list2">

    <h3 class="new-list-title border1"><span>政策法规</span><a href="###">更多&gt;</a></h3>

    <div class="first-new">

        <div class="new-img">

            <img src="../web/images/c5.png" class="img-responsive">

        </div>

        <div class="cont2">

            <h3><a href="index.php?r=publicinfo/view&id=76" target="_blank" title="中国智库索引首批来源..."><font style="color: ;font-weight: ;">中国智库索引首批来源...</font></a></h3> 在17日举行的“2016中国智库治理论坛”上获悉...</div>

    </div>

    <ul class="new-class">

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000008&amp;newsid=65b5c11c348044a0aff7db9fdd05be2e" target="_blank" title="三宝屯村的老少爷们儿 村里喊你们回去办新农合"><font style="color: ;font-weight: ;"> 三宝屯村的老少爷们儿 村里喊你...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000008&amp;newsid=1439a957be4a46849531a0d53880e327" target="_blank" title="沈阳国际旅游节冬季游23日出发"><font style="color: ;font-weight: ;"> 沈阳国际旅游节冬季游23日出发...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000008&amp;newsid=2246ea5ea0824f5d81cb5efe9e1a8a9e" target="_blank" title="沈阳举办2016创文化高峰论坛"><font style="color: ;font-weight: ;"> 沈阳举办2016创文化高峰论坛...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000008&amp;newsid=6bc6df4355c44f9bb3410afaf0c165e8" target="_blank" title="辽宁省沈阳市“三个体系”助力就业4129人 "><font style="color: ;font-weight: ;"> 辽宁省沈阳市“三个体系”助力...</font></a>

            <span

            class="time2">12-16</span>

        </li>



    </ul>

</div>

			</div>

			<div class="col-sm-4">

				<div class="new-list2">

    <h3 class="new-list-title border2"><span href="/cms/show.action?code=jumpchanneltemplate&amp;siteid=100000&amp;channelid=0000000041">行业发展</span><a href="/cms/show.action?code=jumpchanneltemplate&amp;siteid=100000&amp;channelid=0000000041">更多&gt;</a></h3>

    <div class="first-new">

        <div class="new-img">

            <img src="../web/images/tianniu.jpg" class="img-responsive">

        </div>

        <div class="cont2">

            <h3><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000041&amp;newsid=3509d843f5bc4c1d91d20b573d9cd10a" target="_blank" title="第一0八中学打造“Pad+321”新型课堂教学模式"><font style="color: ;font-weight: ;"> 第一0八中学打造“Pa...</font></a></h3> 自21世纪“Pad”出现以来，智能终端在教育领域中的...</div>

    </div>

    <ul class="new-class">

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000041&amp;newsid=ed355753bc564df0bb44782d46ce30ce" target="_blank" title="加快推进医养结合 大力发展辽宁养老产业"><font style="color: ;font-weight: ;"> 加快推进医养结合 大力发展辽宁...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000041&amp;newsid=d4ad27942b934635b5eb90b1fcebe017" target="_blank" title="三好街文体路路口：左转车道挪右侧"><font style="color: ;font-weight: ;"> 三好街文体路路口：左转车道挪右...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000041&amp;newsid=3f87ef12499046f38080207266689d81" target="_blank" title="沈城明年旅游项目投资或达120亿"><font style="color: ;font-weight: ;"> 沈城明年旅游项目投资或达120...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000041&amp;newsid=88ff58fbe5c9418da057e28c08d792eb" target="_blank" title="铁西区企业营业执照可“快递上门”"><font style="color: ;font-weight: ;"> 铁西区企业营业执照可“快递上门...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000041&amp;newsid=d4168582d1ed4736a1a2ec304efefcbd" target="_blank" title="于洪区为农民工追缴欠薪8500余万元"><font style="color: ;font-weight: ;"> 于洪区为农民工追缴欠薪8500...</font></a>

            <span

            class="time2">12-16</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000041&amp;newsid=d05fc688cb1744faa09ad089c0675cd6" target="_blank" title="策划“北京—盛京—南京”三京体验之旅"><font style="color: ;font-weight: ;"> 策划“北京—盛京—南京”三京体...</font></a>

            <span

            class="time2">12-16</span>

        </li>

    </ul>

</div>

			</div>

			<div class="col-sm-4">

				<div class="new-list2">

    <h3 class="new-list-title border3"><span href="/cms/show.action?code=jumpchanneltemplate&amp;siteid=100000&amp;channelid=0000000010">招商引资</span><a href="/cms/show.action?code=jumpchanneltemplate&amp;siteid=100000&amp;channelid=0000000010">更多&gt;</a></h3>

    <div class="first-new">

        <div class="new-img">

            <img src="../web/images/q1.jpg" class="img-responsive">

        </div>

        <div class="cont2">

            <h3><a href="index.php?r=publicinfo/view&id=78" target="_blank" title="辽宁省上半年企业动产抵押融资500多亿元"><font style="color: ;font-weight: ;"> 辽宁省上半年企业...</font></a></h3> 省工商局相关人士表示，动产抵押登记不仅是工商...</div>

    </div>

    <ul class="new-class">

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000010&amp;newsid=f79f0e0ded2e4b2a895cccd7ade1d591" target="_blank" title="国科汇金公司成功举办第8期招商引资实战培训"><font style="color: ;font-weight: ;"> 国科汇金公司成功举办第8期招商...</font></a>

            <span

            class="time2">12-14</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000010&amp;newsid=710c409328a94a58bd303a4ed4cd6905" target="_blank" title="省长陈求发25天走访14市四大“高频词”诠释辽宁全面振兴新局面"><font style="color: ;font-weight: ;"> 省长陈求发25天走访14市四大...</font></a>

            <span

            class="time2">12-12</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000010&amp;newsid=e45c3d480fec4b61bb549e82c79fceaa" target="_blank" title="辽宁省出台优化营商环境条例：招商引资承诺不得随意改变"><font style="color: ;font-weight: ;"> 辽宁省出台优化营商环境条例：招...</font></a>

            <span

            class="time2">12-09</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000010&amp;newsid=d01257ee18974ce294cef114bfb5b4e1" target="_blank" title="辽宁省沈阳市辽中区 推新举措加强完善营商环境"><font style="color: ;font-weight: ;"> 辽宁省沈阳市辽中区 推新举措加...</font></a>

            <span

            class="time2">12-09</span>

        </li>

        <li><a href="/cms/show.action?code=jumpnewstemplate&amp;siteid=100000&amp;channelid=0000000010&amp;newsid=16119147975e48fd86f5b903fc6cb578" target="_blank" title="阜新市冬季招商动员会议召开"><font style="color: ;font-weight: ;"> 阜新市冬季招商动员会议召开</font></a><span class="time2"> 12-09</span>

        </li>

        <li><a href="###" target="_blank" title="“强磁场”是怎样形成的 ——丹东招商引资工作侧记"><font style="color: ;font-weight: ;"> “强磁场”是怎样形成的 ——丹...</font></a>

            <span

            class="time2">12-06</span>

        </li>

    </ul>

</div>

			</div>
            <div class="row">
                        <div class="col-sm-12">
                                        <div class="clearfix xy_louy width companyBox">
                                               <div class="boxtitle"><strong>推荐企业</strong></div>
                                                       <ul class="xy_applist">
                                                                <li><a target="_blank" href="index.php?r=company/view&id=8"><img src="../web/images/q1.jpg"></a><a target="_blank" href="index.php?r=company/view&id=8" title="沈阳久九纸板有限公司" class="xy_louyName">沈阳久九纸板有限公司</a></li>
                                                                          <li><a target="_blank" href="###"><img src="../web/images/baoma.png"></a><a target="_blank" href="####" title="陈大风专业成长工作室" class="xy_louyName">华晨宝马汽车有限公司</a></li>
                                                                                    <li><a target="_blank" href="###"><img src="../web/images/q3.jpg"></a><a target="_blank" href="####" title="陈大风专业成长工作室" class="xy_louyName">沈阳东北铸造厂</a></li>
                                                                                              <li><a target="_blank" href="###"><img src="../web/images/q4.jpg"></a><a target="_blank" href="####" title="陈大风专业成长工作室" class="xy_louyName">三一重工沈阳分公司</a></li>
                                                                                                        <li><a target="_blank" href="###"><img src="../web/images/q5.jpg"></a><a target="_blank" href="####" title="陈大风专业成长工作室" class="xy_louyName">沈阳中达钢结构有限公司</a></li>
                                                                                                                  <li><a target="_blank" href="###"><img src="../web/images/q6.jpg"></a><a target="_blank" href="####" title="陈大风专业成长工作室" class="xy_louyName">沈阳鼓风集团有限公司</a></li>
                                                                                                                            <li><a target="_blank" href="###"><img src="../web/images/q7.jpg"></a><a target="_blank" href="####" title="陈大风专业成长工作室" class="xy_louyName">沈阳机床有限公司</a></li>
                                                                                                                                      <li><a target="_blank" href="###"><img src="../web/images/q8.jpg"></a><a target="_blank" href="####" title="陈大风专业成长工作室" class="xy_louyName">沈阳华鑫盛模塑有限公司</a></li>
                                                                                                                                                        </ul>
                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                                </div>

		</div>
</div>
<?=Html::cssFile('@web/css/swiper.min.css')?>
<?=Html::jsFile('@web/js/swiper.min.js')?>
