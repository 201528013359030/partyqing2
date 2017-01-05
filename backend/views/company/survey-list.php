<?php 
use yii\helpers\Html;
use common\models\Action;
$this->title = '问卷调查';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">	
	<div class="innerwrap" >

		

		<div class="innerCotent">



			<div class="formTitle">

				<a href="#" class="fr" onclick="javascript:history.back(-1);">返回上一页</a>

				三维数据技术需求调查问卷	</div>

			

			<div class="panel-group" id="accordion" >

		    <div class="panel panel-default">

		        <div class="panel-heading" id="headingOne">

		            <h4 class="panel-title"><a href="#collapseOne" aria-expanded="true" >1.云服务平台用户服务</a></h4>

		        </div>

		        <div id="collapseOne" class="panel-collapse collapse in">

		            

		            

	        		<div class="table-responsive">

							    <table class="table table-bordered">

							        <thead>

							            <tr  class="info">

							                <th class="td40">#</th>

							                <th>选项</th>

							                <th class="td100">小计</th>

							                <th class="td100">比例</th>

							                <th class="td100">&nbsp;</th>

							            </tr>

							        </thead>

							        <tbody>

							            <tr>

							                <td>A</td>

							                <td>已是重点企业用户</td>

							                <td>3</td>

							                <td><span class="dangerous_col">70%</span></td>

							                <td><a data-toggle="modal" data-target="#myModal">[查看详细]</a></td>

							            </tr>

							            <tr>

							                <td>B</td>

							                <td>已是企业用户</td>

							                <td>1</td>

							                <td><span class="second_col">10%</span></td>

							                <td><a href="###">[查看详细]</a></td>

							            </tr>

							            <tr>

							                <td>C</td>

							                <td>申请注册重点企业用户</td>

							                <td>1</td>

							                <td><span class="second_col">10%</span></td>

							                <td><a href="###">[查看详细]</a></td>

							            </tr>

							            <tr>

							                <td>D</td>

							                <td>其他</td>

							                <td>1</td>

							                <td><span class="second_col">10%</span></td>

							                <td><a href="###">[查看详细]</a></td>

							            </tr>

							            <tr>

							            	<td colspan="5">

							            		<p>其他选项汇总答案如下：</p>

							            		<p>1、<b>[ 沈阳天牛家具有限公司 ]</b>:促进整个服务联盟的有效竞争机制，同时合理规避不良竞争，将评价与实地考核相结合，把高、中、低端的各类服务商企业区分开来，同时建立激励制度，给优秀的服务商企业更多的展示机会，结合信息化推广工作，邀请优秀服务商给中小企业做公益类讲座，帮助提升企业的品牌价值，激励平台服务商。</p>							    						

							            	</td>

							            </tr>

							        </tbody>

							    </table>

							    

							</div>

		        	

		            

		        </div>

		    </div>

		    <div class="panel panel-default">

		        <div class="panel-heading" >

		            <h4 class="panel-title"><a class="collapsed"   href="#collapseTwo" > 2.政策政务服务需求</a></h4>

		        </div>

		        <div id="collapseTwo" class="panel-collapse collapse in" >

		            

		            <div class="table-responsive">

							    <table class="table table-bordered">

							        <thead>

							            <tr  class="info">

							                <th class="td40">#</th>

							                <th>选项</th>

							                <th class="td100">小计</th>

							                <th class="td100">比例</th>

							                <th class="td100">&nbsp;</th>

							            </tr>

							        </thead>

							        <tbody>

							            <tr>

							                <td>A</td>

							                <td>政策政务信息</td>

							                <td>3</td>

							                <td><span class="dangerous_col">50%</span></td>

							                <td><a href="###">[查看详细]</a></td>

							            </tr>

							            <tr>

							                <td>B</td>

							                <td>政策政务咨询服务</td>

							                <td>3</td>

							                <td><span class="dangerous_col">50%</span></td>

							                <td><a href="###">[查看详细]</a></td>

							            </tr>

							            

							        </tbody>

							    </table>

							    

							</div>

		            

		        </div>

		    </div>

		    <div class="panel panel-default">

		        <div class="panel-heading" >

		            <h4 class="panel-title"><a class="collapsed" href="#collapseThree"  > 3.融资服务需求</a></h4>

		        </div>

		        <div id="collapseThree" class="panel-collapse collapse in"  >

		            <div class="table-responsive">

							    <table class="table table-bordered">

							        <thead>

							            <tr  class="info">

							                <th class="td40">#</th>

							                <th>选项</th>

							                <th class="td100">小计</th>

							                <th class="td100">比例</th>

							                <th class="td100">&nbsp;</th>

							            </tr>

							        </thead>

							        <tbody>

							            <tr>

							                <td>A</td>

							                <td>助保金贷款</td>

							                <td>0</td>

							                <td><span class="second_col">0%</span></td>

							                <td><a href="###">[查看详细]</a></td>

							            </tr>

							            <tr>

							                <td>B</td>

							                <td>政府采购贷</td>

							                <td>6</td>

							                <td><span class="dangerous_col">100%</span></td>

							                <td><a href="###">[查看详细]</a></td>

							            </tr>

							            

							        </tbody>

							    </table>

							    

							</div>

		        </div>

		    </div>

		</div>

			

			

		

		</div>

		

		

		

		

	</div>
</div>
<div id="myModal" class="modal fade">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>

        <h4 class="modal-title">A.已是重点企业用户</h4>

      </div>

      <div class="modal-body">

      	<ol class="ul_companyList">

      		<li>沈阳天牛家具有限公司</li>

      		<li>沈阳金保利橡塑模具有限公司</li>

      		<li>沈阳久九纸板有限公司</li>

      	</ol>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

      </div>

    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
