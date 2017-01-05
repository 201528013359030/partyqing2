<?php 
use yii\helpers\Html;
use common\models\Action;
$this->title = '微门户';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">	
	<div class="innerwrap bg_form">

		

		<div class="innerCotent">

			

			<div class="mo-tabs">

		    <ul id="myTab" class="nav nav-tabs" role="tablist">

		      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">电商模版信息</a></li>

		      		      

		    </ul>

		    <div id="myTabContent" class="tab-content">

		      <div role="tabpanel" class="tab-pane fade  active in" id="home" aria-labelledby="home-tab">

		        

		        <div class="row">

							<div class="col-sm-7">

								

								<form id="commentForm" method="post" action="index.php?r=microsite/index">

									<!--

					          	提交校验功能，必填项目  name required

					          	具体用法参考

					          	http://www.runoob.com/jquery/jquery-plugin-validate.html

					        -->

									<table class="mytb myTpl" cellpadding="0" cellspacing="0">

										<tr>

											<td class="tdName">背景图片<img src="../web/images/star.png"></td>

											<td>

												<a href="javascript:void(0)" class="mobtn primary_btn">上传图片</a>

												<a href="javascript:void(0)" class="mobtn default_btn">重置</a>

												<small class="mobtn_tip fc-default">支持jpg图片，图片大小1920*300，下图为默认图片</small>

												<div class="showPic">

													<img src="../web/images/banner.png" class="img-responsive">

												</div>

											</td>

																			

										</tr>

										<tr>

											<td class="tdName">公司简介<img src="../web/images/star.png"></td>

											<td>

												<textarea class="form-control valid" rows="5" aria-invalid="false" placeholder="请简要描述您公司的的基本情况"></textarea>

												<small class="mobtn_tip fc-default">150-200 字最佳</small>

											</td>

																			

										</tr>

										<tr>

											<td class="tdName">公司相册<img src="../web/images/star.png"></td>

											<td>

												<a href="javascript:void(0)" class="mobtn primary_btn">上传图片</a>

												<small class="mobtn_tip fc-default">支持XXX格式，图片大小600*400 至少上传5张为最佳</small>

																					

											</td>

																			

										</tr>

										<tr>

											<td class="tdName">公司名称<img src="../web/images/star.png"></td>

											<td class="col-sm-9">

												<input type="text" class="form-control" value="沈阳天牛家具有限公司">

											</td>

																			

										</tr>

										<tr>

											<td class="tdName">电话<img src="../web/images/star.png"></td>

											<td class="col-sm-9">

												<input type="text" class="form-control" value="13940058902">

											</td>

																			

										</tr>

										<tr>

											<td class="tdName">传真<img src="../web/images/star.png"></td>

											<td class="col-sm-9">

												<input type="text" class="form-control" value="800-400-4568">

											</td>

																			

										</tr>

										<tr>

											<td class="tdName">地址<img src="../web/images/star.png"></td>

											<td class="col-sm-9">

												<input type="text" class="form-control" value="沈阳经济技术开发区星海路18号	">

											</td>

																			

										</tr>

										

									</table>

									<div class="buttnGroup">

										<input class="submit" type="submit" value="保存">

										<a target="_blank" href="../../zpage/template/html/home.html" class="mobtn second_btn">在线预览</a>

									</div>

									

								</form>

								

							</div>

							<div class="col-sm-5">

								<div class="tpl_smBox">

									<div class="smTitle">请选择：</div>

									<div class="smBox">

										<a href="javascript:void(0)" class="curr">

											<img src="../web/images/tpl_sm1.jpg" class="tpl_sm">

										</a>

										<!--<a href="javascript:void(0)" >

											<img src="../web/images/tpl_sm1.jpg" class="tpl_sm">

										</a>	-->

									</div>

								</div>

								<div class="tpl_lgBox">

									<div class="lgTitle">样式预览：</div>

									<p><img src="../web/images/tpl_lg1.jpg" class="tpl_lg img-responsive"></p>

								</div>

							</div>

							

						</div>

		        

		      </div>

		      

		      

		    </div>

		  </div>

			

			

		</div>

		

	</div>
</div>
