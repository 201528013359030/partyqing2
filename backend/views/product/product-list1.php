<?php 
use yii\helpers\Html;
use common\models\Action;
use yii\helpers\Url;
use common\models\ProductMenu;
use yii\widgets\LinkPager;
$this->title = '产品列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">	
	<div class="innerwrap" style="overflow: hidden;">

	<form id="queryForm" method="post" action="<?=Url::to(['product/product-list1'])?>">

 			    <input type="hidden" name="type" id="type" value="<?php echo isset($type)?$type:Yii::$app->request->get("type")?>">  
	<div class="searchBox">



			<div class="searchType">

			<div class="typeIteam">

			<?php $menu = ProductMenu::find()->where(['Id'=>$type])->asArray()->one();?>

					<div class="typeName"><?php echo $menu['name']?>：</div>



					<div class="typeCon">					
	<?php 
		$menus = ProductMenu::find()->where(['parent'=>$type])->asArray()->all();
		foreach ($menus as $key =>$menu):
	?>
            <a href="javascript:void(0)" class="iteam <?php echo isset($params['types'])&&in_array($menu['Id'], explode(',', $params['types']))?'curr':'' ?>" data-typeid="cmpDomain|<?php echo $menu['Id']?>"><span><?php echo $menu['name']?></span></a>       
	<?php endforeach;?>
                 

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|1"><span>绝缘板</span></a>        -->

                 

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|2"><span>电工胶带</span></a>        -->

                 

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|3"><span>绝缘垫片</span></a>        -->

                 

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|4"><span>绝缘隔离柱</span></a>        -->

                 

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|5"><span>绝缘子</span></a>        -->

                 

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>绝缘带</span></a>   -->

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>云母片</span></a>  -->

<!--             <a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|6"><span>其他绝缘材料</span></a>  -->

                    

					</div>



				</div>

				<div class="typeIteam">



					<div class="typeName">关键字：</div>



					<div class="typeCon">



					<input type="text" class="form-control" placeholder="" name="keyword" style="width:240px;" value="<?php echo isset($params['keyword'])?$params['keyword']:''?>">	





				</div>



			</div>

				

				

			</div>

	</div>

	<div class="controlBar">



			<div class="title">搜索筛选条件：</div>



			<div id="J_titleCon" class="titleCon">
			<?php 
			     if(isset($params['types'])){
			         //$tmp = "";
			         $types = explode(",", $params['types']);
			         for($t=0;$t<count($types);$t++){
			           //  $tmp = explode("|", $typeidArr[$t]);
			          $menu =  ProductMenu::find()->where(['Id'=>$types[$t]])->asArray()->one();
			?>
			<a href="javascript:void(0)" class="iteam" data-typeid="cmpDomain|<?php echo $types[$t]?>"><span><?php echo $menu['name'] ?></span></a>
			<?php 
			         }
			     }
			?>
						</div>



			<div class="option">

			    <input type="hidden" name="types" id="types" value=""> 



<!-- 			    <input type="hidden" name="cmpFoundtime" id="cmpFoundtime" value="">  -->

<!-- 			    <input type="hidden" name="cmpEmployee" id="cmpEmployee" value="">  -->

<!-- 			    <input type="hidden" name="cmpProduction" id="cmpProduction" value="">  -->

<!-- 			    <input type="hidden" name="cmpNature" id="cmpNature" value="">  -->

<!-- 			    <input type="hidden" name="typeidStr" id="typeidStr" value="">  -->

                 <input type="hidden" name="page" id="page" value="1">  

                

				<a href="javascript:void(0)" class="mobtn submit" onclick="checkData()">开始搜索</a>

				

				<a href="index.php?r=product/create-sup" class="mobtn second_btn"><i class="icon_add"></i>发布产品</a>

                

			</div>		



		</div>

		</form>
	<div class="imglist">

		<ul class="pli">
			<?php foreach ($lists as $list):?>
			<?php $image = json_decode($list['image'],true); ?>
			<li>
				<span class="plistimg">
					<a class="imglink" href="<?=Url::to(['product/product-inner','id'=>$list['Id']])?>">

						<img width="150" height="110" alt="<?=Html::encode($image[0]['name'])?>" src="<?php echo $imgIp.$image[0]['path']?>"></a>
				</span>
				<dl>
					<dt>
						<h3>
							<a href="<?=Url::to(['product/product-inner','id'=>$list['Id']])?>" title="<?php echo $list['title']?>"><?php echo $list['title']?></a>
						</h3>
					</dt>
					<dd>
						<em>报价：<?php echo $list['quote']?></em>
					</dd>
					<dd>
						<a href="<?=Url::to(['product/product-inner','id'=>$list['Id']])?>">品牌:<?php echo $list['brand']?> | 型号:<?php echo $list['model']?></a>
					</dd>
					<dd>
						<a class="courl" title="<?php echo $list['provider']?>" href="##"><?php echo $list['provider']?></a> | <a href="##">黄页介绍</a>
					</dd> 
				</dl>
			</li>
			<?php endforeach;?>
<!-- 			<li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4965299.htm"><img width="150" height="110" alt="硅胶垫贴合双面胶，硅胶垫厂家生产批发" src="http://img1.11467.com/u/26867186/219583579_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4965299.htm" title="硅胶垫贴合双面胶，硅胶垫厂家生产批发">硅胶垫贴合双面胶，硅胶垫厂家生产批发</a></h3></dt><dd><em>报价：￥.10/个</em></dd><dd><a href="http://www.11467.com/4965299.htm">品牌:鑫宸 | 型号:硅胶垫</a></dd><dd><a class="courl" title="东莞市鑫宸实业有限公司" href="http://dongguan0641627.11467.com">东莞市鑫宸实业有限公司</a> | <a href="http://www.11467.com/dongguan/co/641627.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4965251.htm"><img width="150" height="110" alt="供应导热硅胶垫片，硅胶垫模切冲型" src="http://img1.11467.com/u/26867186/219582800_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4965251.htm" title="供应导热硅胶垫片，硅胶垫模切冲型">供应导热硅胶垫片，硅胶垫模切冲型</a></h3></dt><dd><em>报价：￥.17/个</em></dd><dd><a href="http://www.11467.com/4965251.htm">品牌:鑫宸 | 型号:导热硅胶垫片</a></dd><dd><a class="courl" title="东莞市鑫宸实业有限公司" href="http://dongguan0641627.11467.com">东莞市鑫宸实业有限公司</a> | <a href="http://www.11467.com/dongguan/co/641627.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4965201.htm"><img width="150" height="110" alt="石墨尼龙垫片，石墨介子，石墨垫片批发" src="http://img1.11467.com/u/26867186/219582065_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4965201.htm" title="石墨尼龙垫片，石墨介子，石墨垫片批发">石墨尼龙垫片，石墨介子，石墨垫片批发</a></h3></dt><dd><em>报价：￥.08/个</em></dd><dd><a href="http://www.11467.com/4965201.htm">品牌:鑫宸 | 型号:石墨尼龙垫片</a></dd><dd><a class="courl" title="东莞市鑫宸实业有限公司" href="http://dongguan0641627.11467.com">东莞市鑫宸实业有限公司</a> | <a href="http://www.11467.com/dongguan/co/641627.htm">黄页介绍</a> -->
<!-- 					</dd> </dl></li> -->

<!-- 			<li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4965097.htm"><img width="150" height="110" alt="导热硅胶片 灯具导热散热硅胶" src="http://img1.11467.com/u/21487454/219580451_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4965097.htm" title="导热硅胶片 灯具导热散热硅胶">导热硅胶片 灯具导热散热硅胶</a></h3></dt><dd><em>报价：￥13.00/片</em></dd><dd><a href="http://www.11467.com/4965097.htm">品牌:深圳三一材料有限公司 | 型号:LC250</a></dd><dd><a class="courl" title="深圳三一导热材料有限公司" href="http://shenzhen0967746.11467.com">深圳三一导热材料有限公司</a> | <a href="http://www.11467.com/shenzhen/co/967746.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4963869.htm"><img width="150" height="110" alt="顺德双面发热云母片，红外节能电热板" src="http://img1.11467.com/u/26171622/219508336_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4963869.htm" title="顺德双面发热云母片，红外节能电热板">顺德双面发热云母片，红外节能电热板</a></h3></dt><dd><em>报价：￥.90/个</em></dd><dd><a href="http://www.11467.com/4963869.htm">品牌:库里威 | 型号:定做</a></dd><dd><a class="courl" title="佛山市库里威塑胶电器有限公司" href="http://foshan0474366.11467.com">佛山市库里威塑胶电器有限公司</a> | <a href="http://www.11467.com/foshan/co/474366.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4962750.htm"><img width="150" height="110" alt="专业生产PVC阻燃工业线槽配电柜专用塑料线槽" src="http://img1.11467.com/u/3053402/219489866_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4962750.htm" title="专业生产PVC阻燃工业线槽配电柜专用塑料线槽">专业生产PVC阻燃工业线槽配电柜专用塑料线槽</a></h3></dt><dd><em>报价：￥2.30/米</em></dd><dd><a href="http://www.11467.com/4962750.htm">防火等级:M1，FV-0 | 耐燃温度:-25℃~85℃</a></dd><dd><a class="courl" title="佛山市顺德区创美特电器实业有限公司" href="http://foshan0186270.11467.com">佛山市顺德区创美特电器实业有限公司</a> | <a href="http://www.11467.com/foshan/co/186270.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4955761.htm"><img width="150" height="110" alt="FR-4绝缘板" src="http://img1.11467.com/u/26709057/219159567_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4955761.htm" title="FR-4绝缘板">FR-4绝缘板</a></h3></dt><dd><em>报价：￥40.00/公斤</em></dd><dd><a href="http://www.11467.com/4955761.htm">品牌:凯诚 | 型号:FR4</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4955755.htm"><img width="150" height="110" alt="3240环氧板插板" src="http://img1.11467.com/u/26709057/219159415_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4955755.htm" title="3240环氧板插板">3240环氧板插板</a></h3></dt><dd><em>报价：￥25.00/公斤</em></dd><dd><a href="http://www.11467.com/4955755.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4955746.htm"><img width="150" height="110" alt="FR-4拼布板加工件" src="http://img1.11467.com/u/26709057/219159252_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4955746.htm" title="FR-4拼布板加工件">FR-4拼布板加工件</a></h3></dt><dd><em>报价：￥50.00/个</em></dd><dd><a href="http://www.11467.com/4955746.htm">品牌:凯诚 | 型号:FR4</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4955661.htm"><img width="150" height="110" alt="环氧树脂绝缘板" src="http://img1.11467.com/u/26709057/219150398_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4955661.htm" title="环氧树脂绝缘板">环氧树脂绝缘板</a></h3></dt><dd><em>报价：￥12.00/公斤</em></dd><dd><a href="http://www.11467.com/4955661.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4955651.htm"><img width="150" height="110" alt="3240异型环氧垫" src="http://img1.11467.com/u/26709057/219149195_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4955651.htm" title="3240异型环氧垫">3240异型环氧垫</a></h3></dt><dd><em>报价：￥2.00/个</em></dd><dd><a href="http://www.11467.com/4955651.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4955647.htm"><img width="150" height="110" alt="3240绝缘板卡具" src="http://img1.11467.com/u/26709057/219149001_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4955647.htm" title="3240绝缘板卡具">3240绝缘板卡具</a></h3></dt><dd><em>报价：￥30.00/公斤</em></dd><dd><a href="http://www.11467.com/4955647.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4953647.htm"><img width="150" height="110" alt="漆酚导静电防腐漆" src="http://img1.11467.com/u/18569458/218989807_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4953647.htm" title="漆酚导静电防腐漆">漆酚导静电防腐漆</a></h3></dt><dd>请联系我们询价</dd><dd><a href="http://www.11467.com/4953647.htm">品牌:仲钰 | 型号:ZHONGYU</a></dd><dd><a class="courl" title="上海仲钰实业发展有限公司" href="http://shanghai0433057.11467.com">上海仲钰实业发展有限公司</a> | <a href="http://www.11467.com/shanghai/co/433057.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952981.htm"><img width="150" height="110" alt="圆形号码管,线缆标识管,配线标识,标识热缩管" src="http://img1.11467.com/u/21172136/218976754_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952981.htm" title="圆形号码管,线缆标识管,配线标识,标识热缩管">圆形号码管,线缆标识管,配线标识,标识热缩管</a></h3></dt><dd><em>报价：￥.90/个</em></dd><dd><a href="http://www.11467.com/4952981.htm">品牌:邦豪 | 型号:BH</a></dd><dd><a class="courl" title="深圳市邦豪新材料有限公司" href="http://shenzhen0943530.11467.com">深圳市邦豪新材料有限公司</a> | <a href="http://www.11467.com/shenzhen/co/943530.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952940.htm"><img width="150" height="110" alt="销售O型圈,CR泡绵,EPDM泡绵,SBR泡绵" src="http://img1.11467.com/u/2448052/218976687_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952940.htm" title="销售O型圈,CR泡绵,EPDM泡绵,SBR泡绵">销售O型圈,CR泡绵,EPDM泡绵,SBR泡绵</a></h3></dt><dd>请联系我们询价</dd><dd><a href="http://www.11467.com/4952940.htm">品牌:凯鸿 | 型号:CR泡绵</a></dd><dd><a class="courl" title="东莞市凯鸿包装制品厂" href="http://dongguan0491143.11467.com">东莞市凯鸿包装制品厂</a> | <a href="http://www.11467.com/dongguan/co/491143.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952918.htm"><img width="150" height="110" alt="焊锡端子热缩管  焊锡端子" src="http://img1.11467.com/u/21172136/218976550_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952918.htm" title="焊锡端子热缩管  焊锡端子">焊锡端子热缩管  焊锡端子</a></h3></dt><dd><em>报价：￥.90/个</em></dd><dd><a href="http://www.11467.com/4952918.htm">品牌:邦豪 | 型号:BH</a></dd><dd><a class="courl" title="深圳市邦豪新材料有限公司" href="http://shenzhen0943530.11467.com">深圳市邦豪新材料有限公司</a> | <a href="http://www.11467.com/shenzhen/co/943530.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952914.htm"><img width="150" height="110" alt="东莞厂家大量批发PP绝缘片,PC垫片,PC绝缘片" src="http://img1.11467.com/u/2448052/218976527_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952914.htm" title="东莞厂家大量批发PP绝缘片,PC垫片,PC绝缘片">东莞厂家大量批发PP绝缘片,PC垫片,PC绝缘片</a></h3></dt><dd>请联系我们询价</dd><dd><a href="http://www.11467.com/4952914.htm">品牌:凯鸿 | 型号:PP绝缘片</a></dd><dd><a class="courl" title="东莞市凯鸿包装制品厂" href="http://dongguan0491143.11467.com">东莞市凯鸿包装制品厂</a> | <a href="http://www.11467.com/dongguan/co/491143.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952901.htm"><img width="150" height="110" alt="光缆接头盒热缩管/光缆热缩管/热缩管" src="http://img1.11467.com/u/21172136/218976353_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952901.htm" title="光缆接头盒热缩管/光缆热缩管/热缩管">光缆接头盒热缩管/光缆热缩管/热缩管</a></h3></dt><dd><em>报价：￥8.00/米</em></dd><dd><a href="http://www.11467.com/4952901.htm">品牌:邦豪 | 型号:BH</a></dd><dd><a class="courl" title="深圳市邦豪新材料有限公司" href="http://shenzhen0943530.11467.com">深圳市邦豪新材料有限公司</a> | <a href="http://www.11467.com/shenzhen/co/943530.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952894.htm"><img width="150" height="110" alt="电缆修补片  拉链式热缩套管" src="http://img1.11467.com/u/21172136/218976217_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952894.htm" title="电缆修补片  拉链式热缩套管">电缆修补片  拉链式热缩套管</a></h3></dt><dd><em>报价：￥60.00/根</em></dd><dd><a href="http://www.11467.com/4952894.htm">品牌:邦豪 | 型号:BH</a></dd><dd><a class="courl" title="深圳市邦豪新材料有限公司" href="http://shenzhen0943530.11467.com">深圳市邦豪新材料有限公司</a> | <a href="http://www.11467.com/shenzhen/co/943530.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952853.htm"><img width="150" height="110" alt="带胶半硬厚壁热缩套管" src="http://img1.11467.com/u/21172136/218975628_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952853.htm" title="带胶半硬厚壁热缩套管">带胶半硬厚壁热缩套管</a></h3></dt><dd><em>报价：￥12.00/米</em></dd><dd><a href="http://www.11467.com/4952853.htm">品牌:邦豪 | 型号:BH</a></dd><dd><a class="courl" title="深圳市邦豪新材料有限公司" href="http://shenzhen0943530.11467.com">深圳市邦豪新材料有限公司</a> | <a href="http://www.11467.com/shenzhen/co/943530.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952845.htm"><img width="150" height="110" alt="厂家供应环保柔软型带胶双壁热缩管" src="http://img1.11467.com/u/21172136/218975515_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952845.htm" title="厂家供应环保柔软型带胶双壁热缩管">厂家供应环保柔软型带胶双壁热缩管</a></h3></dt><dd><em>报价：￥3.20/米</em></dd><dd><a href="http://www.11467.com/4952845.htm">品牌:邦豪 | 型号:BH</a></dd><dd><a class="courl" title="深圳市邦豪新材料有限公司" href="http://shenzhen0943530.11467.com">深圳市邦豪新材料有限公司</a> | <a href="http://www.11467.com/shenzhen/co/943530.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4952297.htm"><img width="150" height="110" alt="正品17123M胶泥胶带价格-3M胶泥胶带供应" src="http://img1.11467.com/u/16934131/218949097_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4952297.htm" title="正品17123M胶泥胶带价格-3M胶泥胶带供应">正品17123M胶泥胶带价格-3M胶泥胶带供应</a></h3></dt><dd><em>报价：￥1.00/3M中国有限公司</em></dd><dd><a href="http://www.11467.com/4952297.htm">品牌:3M | 型号:无</a></dd><dd><a class="courl" title="北京东方旭普科技有限公司" href="http://beijing0414122.11467.com">北京东方旭普科技有限公司</a> | <a href="http://www.11467.com/beijing/co/414122.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4949261.htm"><img width="150" height="110" alt="顺德绝缘材料，双面发热云母片" src="http://img1.11467.com/u/26171622/218823238_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4949261.htm" title="顺德绝缘材料，双面发热云母片">顺德<em>绝缘材料</em>，双面发热云母片</a></h3></dt><dd><em>报价：￥11.00/张</em></dd><dd><a href="http://www.11467.com/4949261.htm">品牌:库里威 | 型号:HP5</a></dd><dd><a class="courl" title="佛山市库里威塑胶电器有限公司" href="http://foshan0474366.11467.com">佛山市库里威塑胶电器有限公司</a> | <a href="http://www.11467.com/foshan/co/474366.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4947348.htm"><img width="150" height="110" alt="大量供应顺德绝缘环保云母板" src="http://img1.11467.com/u/26171622/218739239_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4947348.htm" title="大量供应顺德绝缘环保云母板">大量供应顺德绝缘环保云母板</a></h3></dt><dd><em>报价：￥11.00/张</em></dd><dd><a href="http://www.11467.com/4947348.htm">库里威:600 | 通用:200</a></dd><dd><a class="courl" title="佛山市库里威塑胶电器有限公司" href="http://foshan0474366.11467.com">佛山市库里威塑胶电器有限公司</a> | <a href="http://www.11467.com/foshan/co/474366.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4947096.htm"><img width="150" height="110" alt="顺德厂家供应微波炉专用云母垫片 容桂云母板" src="http://img1.11467.com/u/26171622/218733572_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4947096.htm" title="顺德厂家供应微波炉专用云母垫片 容桂云母板">顺德厂家供应微波炉专用云母垫片 容桂云母板</a></h3></dt><dd><em>报价：￥16.00/张</em></dd><dd><a href="http://www.11467.com/4947096.htm">库里威:600 | HP5:300</a></dd><dd><a class="courl" title="佛山市库里威塑胶电器有限公司" href="http://foshan0474366.11467.com">佛山市库里威塑胶电器有限公司</a> | <a href="http://www.11467.com/foshan/co/474366.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945764.htm"><img width="150" height="110" alt="3240绝缘管套管" src="http://img1.11467.com/u/26709057/218714673_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945764.htm" title="3240绝缘管套管">3240绝缘管套管</a></h3></dt><dd><em>报价：￥30.00/公斤</em></dd><dd><a href="http://www.11467.com/4945764.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945757.htm"><img width="150" height="110" alt="绝缘板插板 模压插板" src="http://img1.11467.com/u/26709057/218714571_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945757.htm" title="绝缘板插板 模压插板">绝缘板插板 模压插板</a></h3></dt><dd><em>报价：￥30.00/公斤</em></dd><dd><a href="http://www.11467.com/4945757.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945749.htm"><img width="150" height="110" alt="黄色绝缘板 3240环氧板" src="http://img1.11467.com/u/26709057/218714457_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945749.htm" title="黄色绝缘板 3240环氧板">黄色绝缘板 3240环氧板</a></h3></dt><dd><em>报价：￥12.00/公斤</em></dd><dd><a href="http://www.11467.com/4945749.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945712.htm"><img width="150" height="110" alt="3240环氧绝缘瓦片" src="http://img1.11467.com/u/26709057/218713638_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945712.htm" title="3240环氧绝缘瓦片">3240环氧绝缘瓦片</a></h3></dt><dd><em>报价：￥40.00/公斤</em></dd><dd><a href="http://www.11467.com/4945712.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945693.htm"><img width="150" height="110" alt="环氧板精密加工 环氧板雕刻垫片 环氧板雕刻加工" src="http://img1.11467.com/u/26709057/218713185_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945693.htm" title="环氧板精密加工 环氧板雕刻垫片 环氧板雕刻加工">环氧板精密加工 环氧板雕刻垫片 环氧板雕刻加工</a></h3></dt><dd><em>报价：￥.80/个</em></dd><dd><a href="http://www.11467.com/4945693.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945681.htm"><img width="150" height="110" alt="3240绝缘板 环氧板" src="http://img1.11467.com/u/26709057/218712891_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945681.htm" title="3240绝缘板 环氧板">3240绝缘板 环氧板</a></h3></dt><dd><em>报价：￥12.00/公斤</em></dd><dd><a href="http://www.11467.com/4945681.htm">品牌:凯诚 | 型号:3240</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945605.htm"><img width="150" height="110" alt="耐高温云母板加工件" src="http://img1.11467.com/u/26709057/218710123_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945605.htm" title="耐高温云母板加工件">耐高温云母板加工件</a></h3></dt><dd><em>报价：￥40.00/千克</em></dd><dd><a href="http://www.11467.com/4945605.htm">品牌:凯诚 | 型号:HP-8</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945600.htm"><img width="150" height="110" alt="耐高温云母管 绝缘管 HP -5云母管" src="http://img1.11467.com/u/26709057/218709994_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945600.htm" title="耐高温云母管 绝缘管 HP -5云母管">耐高温云母管 绝缘管 HP -5云母管</a></h3></dt><dd><em>报价：￥35.00/千克</em></dd><dd><a href="http://www.11467.com/4945600.htm">品牌:凯诚 | 型号:HP-5</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945595.htm"><img width="150" height="110" alt="耐高温绝缘管 云母管" src="http://img1.11467.com/u/26709057/218709872_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945595.htm" title="耐高温绝缘管 云母管">耐高温绝缘管 云母管</a></h3></dt><dd><em>报价：￥35.00/千克</em></dd><dd><a href="http://www.11467.com/4945595.htm">品牌:凯诚 | 型号:HP-8</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li><li><span class="plistimg"><a class="imglink" href="http://www.11467.com/4945591.htm"><img width="150" height="110" alt="HP-8金色云母管" src="http://img1.11467.com/u/26709057/218709749_small.jpg"></a></span><dl><dt><h3><a href="http://www.11467.com/4945591.htm" title="HP-8金色云母管">HP-8金色云母管</a></h3></dt><dd><em>报价：￥40.00/千克</em></dd><dd><a href="http://www.11467.com/4945591.htm">品牌:凯诚 | 型号:HP-8</a></dd><dd><a class="courl" title="扬州市凯诚电工绝缘材料有限公司" href="http://yangzhou0118058.11467.com">扬州市凯诚电工绝缘材料有限公司</a> | <a href="http://www.11467.com/yangzhou/co/118058.htm">黄页介绍</a></dd> </dl></li> -->

			

		</ul>

	</div>



	</div>	
	
	
</div>

<script type="text/javascript">
function checkData(){
	var typeStr = "";
	var typeid = "";
	var type = "";

	$("#J_titleCon a").each(function(){
		typeid = $(this).attr("data-typeid").split("|")[1];
		type = typeid
		if(type != "")
			typeStr += type + ",";
	});
	if(typeStr.length>0){
		typeStr = typeStr.substr(0,typeStr.length-1);
	}
	console.log(typeStr);
	$("#types").val(typeStr);
	console.log($('#types'));
	$('#queryForm').submit();	
}
</script>