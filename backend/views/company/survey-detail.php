<?php 
use yii\helpers\Html;
use common\models\Action;
$this->title = '问卷调查';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="outwrap">	
	<div class="innerwrap" >

		

		<table align="center" class="outerframe" width="100%" border="0" cellpadding="2" cellspacing="0">

	<tbody><tr>

		<td>

<form method="post" action="/survey/index.php" id="limesurvey" name="limesurvey" autocomplete="off">

      <!-- INPUT NAMES -->

      <input type="hidden" name="fieldnames" value="84113X34X129|84113X34X130|84113X34X132|84113X34X133|84113X34X134|84113X34X135|84113X34X136" id="fieldnames">

<div class="aiv367_title" style="margin-top:30px;">

	<div class="L">中小企业创业创新服务需求调查表</div>

	<div class="R"><script type="text/javascript">

	$(function() {

		$("#progressbar").progressbar({

			value: 0

		});

	});

	</script>

	

	<div id="progress-wrapper">

	<span class="hide">您已经完成了本调查0% </span>

		<div id="progress-pre">0%</div>

		<div id="progressbar" class="ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 0%; display: none;"></div></div>

		<div id="progress-post">100%</div>

	</div>

		<script type="text/javascript">

			$(document).ready(function() {

				$("div.ui-progressbar-value").hide();

			}); 

		</script></div>

</div><input type="hidden" id="runonce" value="1">

    <!-- JAVASCRIPT FOR CONDITIONAL QUESTIONS -->

    <script type="text/javascript">

    <!--

	function noop_checkconditions(value, name, type)

	{

	}



	function checkconditions(value, name, type)

	{

            if (type == 'radio' || type == 'select-one')

        {

            var hiddenformname='java'+name;

            document.getElementById(hiddenformname).value=value;

        }



        if (type == 'checkbox')

        {

            var hiddenformname='java'+name;

            var chkname='answer'+name;

            if (document.getElementById(chkname).checked)

            {

                document.getElementById(hiddenformname).value='Y';

            } else

            {

		        document.getElementById(hiddenformname).value='';

            }

        }



	document.getElementById('runonce').value=1

	}

	//-->

	</script>







<!-- START THE GROUP -->

<table class="answerBox" width="100%" align="center" bgcolor="#d2e0f2" border="0" style="border-collapse:collapse; border-color:#111111; border:1px solid #92B6C5; background:#D2E0F2;">

	<tbody><tr>

		<td align="center">

			<div id="survey_paper">

<!-- PRESENT THE QUESTIONS -->

<div id="question137" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>&nbsp;1、云服务平台用户服务<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_137 = document.limesurvey.onsubmit;

function ensureOther_137()

{

	othercboxval=document.getElementById('answer84113X35X137othercbox').checked;

	otherval=document.getElementById('answer84113X35X137other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_137 == 'function') {

	return oldonsubmitOther_137();

}

	}

	else {

alert('您标记了问题 \u0022&nbsp;8、云服务平台用户服务\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_137;

	-->

</script>

<input type="hidden" name="MULTI84113X35X137" value="4">





<ul>

	



	<li id="javatbd84113X35X13701">



	<input type="hidden" name="tbdisp84113X35X13701" id="tbdisp84113X35X13701" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13701" id="answer84113X35X13701" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13701" class="answertext">已是重点企业用户</label>

		<input type="hidden" name="java84113X35X13701" id="java84113X35X13701" value="">

	</li>

	



	<li id="javatbd84113X35X13702">



	<input type="hidden" name="tbdisp84113X35X13702" id="tbdisp84113X35X13702" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13702" id="answer84113X35X13702" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13702" class="answertext">已是企业用户</label>

		<input type="hidden" name="java84113X35X13702" id="java84113X35X13702" value="">

	</li>

	



	<li id="javatbd84113X35X13703">



	<input type="hidden" name="tbdisp84113X35X13703" id="tbdisp84113X35X13703" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13703" id="answer84113X35X13703" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13703" class="answertext">申请注册重点企业用户</label>

		<input type="hidden" name="java84113X35X13703" id="java84113X35X13703" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X137othercbox" alt="其它" id="answer84113X35X137othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X137other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X137other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X137other" id="answer84113X35X137other" onkeypress="if ($.trim($(&quot;#answer84113X35X137other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X137othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X137other" id="java84113X35X137other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X137" id="display137" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question138" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>&nbsp;2、政策政务服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<input type="hidden" name="MULTI84113X35X138" value="2">





<ul>

	



	<li id="javatbd84113X35X13801">



	<input type="hidden" name="tbdisp84113X35X13801" id="tbdisp84113X35X13801" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13801" id="answer84113X35X13801" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13801" class="answertext">政策政务信息</label>

		<input type="hidden" name="java84113X35X13801" id="java84113X35X13801" value="">

	</li>

	



	<li id="javatbd84113X35X13802">



	<input type="hidden" name="tbdisp84113X35X13802" id="tbdisp84113X35X13802" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13802" id="answer84113X35X13802" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13802" class="answertext">政策政务咨询服务</label>

		<input type="hidden" name="java84113X35X13802" id="java84113X35X13802" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X138" id="display138" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question139" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>&nbsp;3、融资服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_139 = document.limesurvey.onsubmit;

function ensureOther_139()

{

	othercboxval=document.getElementById('answer84113X35X139othercbox').checked;

	otherval=document.getElementById('answer84113X35X139other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_139 == 'function') {

	return oldonsubmitOther_139();

}

	}

	else {

alert('您标记了问题 \u0022&nbsp;10、融资服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_139;

	-->

</script>

<input type="hidden" name="MULTI84113X35X139" value="10">





<ul>

	



	<li id="javatbd84113X35X13901">



	<input type="hidden" name="tbdisp84113X35X13901" id="tbdisp84113X35X13901" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13901" id="answer84113X35X13901" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13901" class="answertext">助保金贷款</label>

		<input type="hidden" name="java84113X35X13901" id="java84113X35X13901" value="">

	</li>

	



	<li id="javatbd84113X35X13902">



	<input type="hidden" name="tbdisp84113X35X13902" id="tbdisp84113X35X13902" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13902" id="answer84113X35X13902" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13902" class="answertext">政府采购贷</label>

		<input type="hidden" name="java84113X35X13902" id="java84113X35X13902" value="">

	</li>

	



	<li id="javatbd84113X35X13903">



	<input type="hidden" name="tbdisp84113X35X13903" id="tbdisp84113X35X13903" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13903" id="answer84113X35X13903" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13903" class="answertext">银行信用贷款</label>

		<input type="hidden" name="java84113X35X13903" id="java84113X35X13903" value="">

	</li>

	



	<li id="javatbd84113X35X13904">



	<input type="hidden" name="tbdisp84113X35X13904" id="tbdisp84113X35X13904" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13904" id="answer84113X35X13904" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13904" class="answertext">融资租赁</label>

		<input type="hidden" name="java84113X35X13904" id="java84113X35X13904" value="">

	</li>

	



	<li id="javatbd84113X35X13905">



	<input type="hidden" name="tbdisp84113X35X13905" id="tbdisp84113X35X13905" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13905" id="answer84113X35X13905" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13905" class="answertext">转贷（过桥）</label>

		<input type="hidden" name="java84113X35X13905" id="java84113X35X13905" value="">

	</li>

	



	<li id="javatbd84113X35X13906">



	<input type="hidden" name="tbdisp84113X35X13906" id="tbdisp84113X35X13906" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13906" id="answer84113X35X13906" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13906" class="answertext">股权融资</label>

		<input type="hidden" name="java84113X35X13906" id="java84113X35X13906" value="">

	</li>

	



	<li id="javatbd84113X35X13907">



	<input type="hidden" name="tbdisp84113X35X13907" id="tbdisp84113X35X13907" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13907" id="answer84113X35X13907" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13907" class="answertext">私募债权</label>

		<input type="hidden" name="java84113X35X13907" id="java84113X35X13907" value="">

	</li>

	



	<li id="javatbd84113X35X13908">



	<input type="hidden" name="tbdisp84113X35X13908" id="tbdisp84113X35X13908" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13908" id="answer84113X35X13908" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13908" class="answertext">资产并购重组</label>

		<input type="hidden" name="java84113X35X13908" id="java84113X35X13908" value="">

	</li>

	



	<li id="javatbd84113X35X13909">



	<input type="hidden" name="tbdisp84113X35X13909" id="tbdisp84113X35X13909" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X13909" id="answer84113X35X13909" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X13909" class="answertext">众筹</label>

		<input type="hidden" name="java84113X35X13909" id="java84113X35X13909" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X139othercbox" alt="其它" id="answer84113X35X139othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X139other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X139other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X139other" id="answer84113X35X139other" onkeypress="if ($.trim($(&quot;#answer84113X35X139other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X139othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X139other" id="java84113X35X139other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X139" id="display139" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question141" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>4、培训与创业服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_141 = document.limesurvey.onsubmit;

function ensureOther_141()

{

	othercboxval=document.getElementById('answer84113X35X141othercbox').checked;

	otherval=document.getElementById('answer84113X35X141other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_141 == 'function') {

	return oldonsubmitOther_141();

}

	}

	else {

alert('您标记了问题 \u002211、培训与创业服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_141;

	-->

</script>

<input type="hidden" name="MULTI84113X35X141" value="8">





<ul>

	



	<li id="javatbd84113X35X14101">



	<input type="hidden" name="tbdisp84113X35X14101" id="tbdisp84113X35X14101" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14101" id="answer84113X35X14101" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14101" class="answertext">互联网工业知识培训</label>

		<input type="hidden" name="java84113X35X14101" id="java84113X35X14101" value="">

	</li>

	



	<li id="javatbd84113X35X14102">



	<input type="hidden" name="tbdisp84113X35X14102" id="tbdisp84113X35X14102" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14102" id="answer84113X35X14102" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14102" class="answertext">智能制造培训</label>

		<input type="hidden" name="java84113X35X14102" id="java84113X35X14102" value="">

	</li>

	



	<li id="javatbd84113X35X14103">



	<input type="hidden" name="tbdisp84113X35X14103" id="tbdisp84113X35X14103" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14103" id="answer84113X35X14103" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14103" class="answertext">互联网营销</label>

		<input type="hidden" name="java84113X35X14103" id="java84113X35X14103" value="">

	</li>

	



	<li id="javatbd84113X35X14104">



	<input type="hidden" name="tbdisp84113X35X14104" id="tbdisp84113X35X14104" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14104" id="answer84113X35X14104" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14104" class="answertext">创业创新项目路演</label>

		<input type="hidden" name="java84113X35X14104" id="java84113X35X14104" value="">

	</li>

	



	<li id="javatbd84113X35X14105">



	<input type="hidden" name="tbdisp84113X35X14105" id="tbdisp84113X35X14105" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14105" id="answer84113X35X14105" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14105" class="answertext">高层管理者培训</label>

		<input type="hidden" name="java84113X35X14105" id="java84113X35X14105" value="">

	</li>

	



	<li id="javatbd84113X35X14106">



	<input type="hidden" name="tbdisp84113X35X14106" id="tbdisp84113X35X14106" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14106" id="answer84113X35X14106" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14106" class="answertext">中层管理者培训</label>

		<input type="hidden" name="java84113X35X14106" id="java84113X35X14106" value="">

	</li>

	



	<li id="javatbd84113X35X14107">



	<input type="hidden" name="tbdisp84113X35X14107" id="tbdisp84113X35X14107" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14107" id="answer84113X35X14107" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14107" class="answertext">工商管理培训</label>

		<input type="hidden" name="java84113X35X14107" id="java84113X35X14107" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X141othercbox" alt="其它" id="answer84113X35X141othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X141other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X141other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X141other" id="answer84113X35X141other" onkeypress="if ($.trim($(&quot;#answer84113X35X141other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X141othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X141other" id="java84113X35X141other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X141" id="display141" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question142" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>5、技术服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_142 = document.limesurvey.onsubmit;

function ensureOther_142()

{

	othercboxval=document.getElementById('answer84113X35X142othercbox').checked;

	otherval=document.getElementById('answer84113X35X142other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_142 == 'function') {

	return oldonsubmitOther_142();

}

	}

	else {

alert('您标记了问题 \u002212、技术服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_142;

	-->

</script>

<input type="hidden" name="MULTI84113X35X142" value="8">





<ul>

	



	<li id="javatbd84113X35X14201">



	<input type="hidden" name="tbdisp84113X35X14201" id="tbdisp84113X35X14201" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14201" id="answer84113X35X14201" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14201" class="answertext">产学研对接服务</label>

		<input type="hidden" name="java84113X35X14201" id="java84113X35X14201" value="">

	</li>

	



	<li id="javatbd84113X35X14202">



	<input type="hidden" name="tbdisp84113X35X14202" id="tbdisp84113X35X14202" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14202" id="answer84113X35X14202" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14202" class="answertext">工业设计服务</label>

		<input type="hidden" name="java84113X35X14202" id="java84113X35X14202" value="">

	</li>

	



	<li id="javatbd84113X35X14203">



	<input type="hidden" name="tbdisp84113X35X14203" id="tbdisp84113X35X14203" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14203" id="answer84113X35X14203" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14203" class="answertext">技术中心辅导</label>

		<input type="hidden" name="java84113X35X14203" id="java84113X35X14203" value="">

	</li>

	



	<li id="javatbd84113X35X14204">



	<input type="hidden" name="tbdisp84113X35X14204" id="tbdisp84113X35X14204" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14204" id="answer84113X35X14204" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14204" class="answertext">企业研发费用加计扣除辅导</label>

		<input type="hidden" name="java84113X35X14204" id="java84113X35X14204" value="">

	</li>

	



	<li id="javatbd84113X35X14205">



	<input type="hidden" name="tbdisp84113X35X14205" id="tbdisp84113X35X14205" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14205" id="answer84113X35X14205" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14205" class="answertext">专业技术培训</label>

		<input type="hidden" name="java84113X35X14205" id="java84113X35X14205" value="">

	</li>

	



	<li id="javatbd84113X35X14206">



	<input type="hidden" name="tbdisp84113X35X14206" id="tbdisp84113X35X14206" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14206" id="answer84113X35X14206" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14206" class="answertext">技术需求难题咨询服务</label>

		<input type="hidden" name="java84113X35X14206" id="java84113X35X14206" value="">

	</li>

	



	<li id="javatbd84113X35X14207">



	<input type="hidden" name="tbdisp84113X35X14207" id="tbdisp84113X35X14207" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14207" id="answer84113X35X14207" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14207" class="answertext">展会推介服务</label>

		<input type="hidden" name="java84113X35X14207" id="java84113X35X14207" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X142othercbox" alt="其它" id="answer84113X35X142othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X142other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X142other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X142other" id="answer84113X35X142other" onkeypress="if ($.trim($(&quot;#answer84113X35X142other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X142othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X142other" id="java84113X35X142other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X142" id="display142" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question143" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>6、找场地服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_143 = document.limesurvey.onsubmit;

function ensureOther_143()

{

	othercboxval=document.getElementById('answer84113X35X143othercbox').checked;

	otherval=document.getElementById('answer84113X35X143other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_143 == 'function') {

	return oldonsubmitOther_143();

}

	}

	else {

alert('您标记了问题 \u002213、找场地服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_143;

	-->

</script>

<input type="hidden" name="MULTI84113X35X143" value="5">





<ul>

	



	<li id="javatbd84113X35X14301">



	<input type="hidden" name="tbdisp84113X35X14301" id="tbdisp84113X35X14301" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14301" id="answer84113X35X14301" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14301" class="answertext">小企业产业园</label>

		<input type="hidden" name="java84113X35X14301" id="java84113X35X14301" value="">

	</li>

	



	<li id="javatbd84113X35X14302">



	<input type="hidden" name="tbdisp84113X35X14302" id="tbdisp84113X35X14302" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14302" id="answer84113X35X14302" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14302" class="answertext">小企业创业（孵化）基地</label>

		<input type="hidden" name="java84113X35X14302" id="java84113X35X14302" value="">

	</li>

	



	<li id="javatbd84113X35X14303">



	<input type="hidden" name="tbdisp84113X35X14303" id="tbdisp84113X35X14303" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14303" id="answer84113X35X14303" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14303" class="answertext">写字楼</label>

		<input type="hidden" name="java84113X35X14303" id="java84113X35X14303" value="">

	</li>

	



	<li id="javatbd84113X35X14304">



	<input type="hidden" name="tbdisp84113X35X14304" id="tbdisp84113X35X14304" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14304" id="answer84113X35X14304" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14304" class="answertext">众创空间</label>

		<input type="hidden" name="java84113X35X14304" id="java84113X35X14304" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X143othercbox" alt="其它" id="answer84113X35X143othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X143other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X143other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X143other" id="answer84113X35X143other" onkeypress="if ($.trim($(&quot;#answer84113X35X143other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X143othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X143other" id="java84113X35X143other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X143" id="display143" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question144" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>7、投资咨询服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_144 = document.limesurvey.onsubmit;

function ensureOther_144()

{

	othercboxval=document.getElementById('answer84113X35X144othercbox').checked;

	otherval=document.getElementById('answer84113X35X144other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_144 == 'function') {

	return oldonsubmitOther_144();

}

	}

	else {

alert('您标记了问题 \u002214、投资咨询服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_144;

	-->

</script>

<input type="hidden" name="MULTI84113X35X144" value="8">





<ul>

	



	<li id="javatbd84113X35X14401">



	<input type="hidden" name="tbdisp84113X35X14401" id="tbdisp84113X35X14401" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14401" id="answer84113X35X14401" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14401" class="answertext">立项建议书</label>

		<input type="hidden" name="java84113X35X14401" id="java84113X35X14401" value="">

	</li>

	



	<li id="javatbd84113X35X14402">



	<input type="hidden" name="tbdisp84113X35X14402" id="tbdisp84113X35X14402" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14402" id="answer84113X35X14402" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14402" class="answertext">可行性研究报告</label>

		<input type="hidden" name="java84113X35X14402" id="java84113X35X14402" value="">

	</li>

	



	<li id="javatbd84113X35X14403">



	<input type="hidden" name="tbdisp84113X35X14403" id="tbdisp84113X35X14403" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14403" id="answer84113X35X14403" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14403" class="answertext">节能评估报告</label>

		<input type="hidden" name="java84113X35X14403" id="java84113X35X14403" value="">

	</li>

	



	<li id="javatbd84113X35X14404">



	<input type="hidden" name="tbdisp84113X35X14404" id="tbdisp84113X35X14404" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14404" id="answer84113X35X14404" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14404" class="answertext">社会稳定风险评估</label>

		<input type="hidden" name="java84113X35X14404" id="java84113X35X14404" value="">

	</li>

	



	<li id="javatbd84113X35X14405">



	<input type="hidden" name="tbdisp84113X35X14405" id="tbdisp84113X35X14405" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14405" id="answer84113X35X14405" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14405" class="answertext">清洁生产审核咨询</label>

		<input type="hidden" name="java84113X35X14405" id="java84113X35X14405" value="">

	</li>

	



	<li id="javatbd84113X35X14406">



	<input type="hidden" name="tbdisp84113X35X14406" id="tbdisp84113X35X14406" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14406" id="answer84113X35X14406" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14406" class="answertext">环境减排贡献量审核咨询</label>

		<input type="hidden" name="java84113X35X14406" id="java84113X35X14406" value="">

	</li>

	



	<li id="javatbd84113X35X14407">



	<input type="hidden" name="tbdisp84113X35X14407" id="tbdisp84113X35X14407" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14407" id="answer84113X35X14407" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14407" class="answertext">企业食品信用诚信体系建设</label>

		<input type="hidden" name="java84113X35X14407" id="java84113X35X14407" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X144othercbox" alt="其它" id="answer84113X35X144othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X144other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X144other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X144other" id="answer84113X35X144other" onkeypress="if ($.trim($(&quot;#answer84113X35X144other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X144othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X144other" id="java84113X35X144other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X144" id="display144" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question145" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>8、信息化服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_145 = document.limesurvey.onsubmit;

function ensureOther_145()

{

	othercboxval=document.getElementById('answer84113X35X145othercbox').checked;

	otherval=document.getElementById('answer84113X35X145other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_145 == 'function') {

	return oldonsubmitOther_145();

}

	}

	else {

alert('您标记了问题 \u002215、信息化服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_145;

	-->

</script>

<input type="hidden" name="MULTI84113X35X145" value="10">





<ul>

	



	<li id="javatbd84113X35X14501">



	<input type="hidden" name="tbdisp84113X35X14501" id="tbdisp84113X35X14501" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14501" id="answer84113X35X14501" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14501" class="answertext">自动化生产线</label>

		<input type="hidden" name="java84113X35X14501" id="java84113X35X14501" value="">

	</li>

	



	<li id="javatbd84113X35X14502">



	<input type="hidden" name="tbdisp84113X35X14502" id="tbdisp84113X35X14502" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14502" id="answer84113X35X14502" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14502" class="answertext">生产订制、销售</label>

		<input type="hidden" name="java84113X35X14502" id="java84113X35X14502" value="">

	</li>

	



	<li id="javatbd84113X35X14503">



	<input type="hidden" name="tbdisp84113X35X14503" id="tbdisp84113X35X14503" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14503" id="answer84113X35X14503" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14503" class="answertext">企业信息化建设咨询</label>

		<input type="hidden" name="java84113X35X14503" id="java84113X35X14503" value="">

	</li>

	



	<li id="javatbd84113X35X14504">



	<input type="hidden" name="tbdisp84113X35X14504" id="tbdisp84113X35X14504" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14504" id="answer84113X35X14504" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14504" class="answertext">两化融合贯标咨询</label>

		<input type="hidden" name="java84113X35X14504" id="java84113X35X14504" value="">

	</li>

	



	<li id="javatbd84113X35X14505">



	<input type="hidden" name="tbdisp84113X35X14505" id="tbdisp84113X35X14505" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14505" id="answer84113X35X14505" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14505" class="answertext">互联网技术应用</label>

		<input type="hidden" name="java84113X35X14505" id="java84113X35X14505" value="">

	</li>

	



	<li id="javatbd84113X35X14506">



	<input type="hidden" name="tbdisp84113X35X14506" id="tbdisp84113X35X14506" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14506" id="answer84113X35X14506" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14506" class="answertext">大数据</label>

		<input type="hidden" name="java84113X35X14506" id="java84113X35X14506" value="">

	</li>

	



	<li id="javatbd84113X35X14507">



	<input type="hidden" name="tbdisp84113X35X14507" id="tbdisp84113X35X14507" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14507" id="answer84113X35X14507" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14507" class="answertext">云计算</label>

		<input type="hidden" name="java84113X35X14507" id="java84113X35X14507" value="">

	</li>

	



	<li id="javatbd84113X35X14508">



	<input type="hidden" name="tbdisp84113X35X14508" id="tbdisp84113X35X14508" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14508" id="answer84113X35X14508" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14508" class="answertext">电子商务</label>

		<input type="hidden" name="java84113X35X14508" id="java84113X35X14508" value="">

	</li>

	



	<li id="javatbd84113X35X14509">



	<input type="hidden" name="tbdisp84113X35X14509" id="tbdisp84113X35X14509" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14509" id="answer84113X35X14509" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14509" class="answertext">微商</label>

		<input type="hidden" name="java84113X35X14509" id="java84113X35X14509" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X145othercbox" alt="其它" id="answer84113X35X145othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X145other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X145other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X145other" id="answer84113X35X145other" onkeypress="if ($.trim($(&quot;#answer84113X35X145other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X145othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X145other" id="java84113X35X145other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X145" id="display145" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question146" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>9、法律服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_146 = document.limesurvey.onsubmit;

function ensureOther_146()

{

	othercboxval=document.getElementById('answer84113X35X146othercbox').checked;

	otherval=document.getElementById('answer84113X35X146other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_146 == 'function') {

	return oldonsubmitOther_146();

}

	}

	else {

alert('您标记了问题 \u002216、法律服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_146;

	-->

</script>

<input type="hidden" name="MULTI84113X35X146" value="3">





<ul>

	



	<li id="javatbd84113X35X14601">



	<input type="hidden" name="tbdisp84113X35X14601" id="tbdisp84113X35X14601" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14601" id="answer84113X35X14601" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14601" class="answertext">法律援助</label>

		<input type="hidden" name="java84113X35X14601" id="java84113X35X14601" value="">

	</li>

	



	<li id="javatbd84113X35X14602">



	<input type="hidden" name="tbdisp84113X35X14602" id="tbdisp84113X35X14602" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14602" id="answer84113X35X14602" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14602" class="answertext">聘请法律顾问</label>

		<input type="hidden" name="java84113X35X14602" id="java84113X35X14602" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X146othercbox" alt="其它" id="answer84113X35X146othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X146other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X146other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X146other" id="answer84113X35X146other" onkeypress="if ($.trim($(&quot;#answer84113X35X146other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X146othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X146other" id="java84113X35X146other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X146" id="display146" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question147" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>10、管理服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_147 = document.limesurvey.onsubmit;

function ensureOther_147()

{

	othercboxval=document.getElementById('answer84113X35X147othercbox').checked;

	otherval=document.getElementById('answer84113X35X147other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_147 == 'function') {

	return oldonsubmitOther_147();

}

	}

	else {

alert('您标记了问题 \u002217、管理服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_147;

	-->

</script>

<input type="hidden" name="MULTI84113X35X147" value="3">





<ul>

	



	<li id="javatbd84113X35X14701">



	<input type="hidden" name="tbdisp84113X35X14701" id="tbdisp84113X35X14701" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14701" id="answer84113X35X14701" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14701" class="answertext">管理诊断</label>

		<input type="hidden" name="java84113X35X14701" id="java84113X35X14701" value="">

	</li>

	



	<li id="javatbd84113X35X14702">



	<input type="hidden" name="tbdisp84113X35X14702" id="tbdisp84113X35X14702" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14702" id="answer84113X35X14702" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14702" class="answertext">管理咨询</label>

		<input type="hidden" name="java84113X35X14702" id="java84113X35X14702" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X147othercbox" alt="其它" id="answer84113X35X147othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X147other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X147other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X147other" id="answer84113X35X147other" onkeypress="if ($.trim($(&quot;#answer84113X35X147other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X147othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X147other" id="java84113X35X147other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X147" id="display147" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div><div id="question148" class="multiple-opt">

	<table width="75%" align="center" border="0" style="border-collapse: collapse; " bgcolor="white">

		<tbody><tr>

			<td align="center">

				<table width="100%" cellspacing="0">

					<tbody><tr>

						<td class="questiontext">

							<span class="asterisk"></span>11、其他服务需求<span class="questionhelp" style="text-align:right">请勾选所有符合的选项</span>

							

							<!--���͸���-->

						</td>

					</tr>

					<tr>

						<td class="answer">

							<script type="text/javascript">

	<!--

oldonsubmitOther_148 = document.limesurvey.onsubmit;

function ensureOther_148()

{

	othercboxval=document.getElementById('answer84113X35X148othercbox').checked;

	otherval=document.getElementById('answer84113X35X148other').value;

	if (otherval != '' || othercboxval != true) {

if(typeof oldonsubmitOther_148 == 'function') {

	return oldonsubmitOther_148();

}

	}

	else {

alert('您标记了问题 \u002218、其他服务需求\u0022的\u0022其它\u0022 字段。请再填写相应的\u0022其它评论\u0022字段。');

return false;

	}

}

document.limesurvey.onsubmit = ensureOther_148;

	-->

</script>

<input type="hidden" name="MULTI84113X35X148" value="5">





<ul>

	



	<li id="javatbd84113X35X14801">



	<input type="hidden" name="tbdisp84113X35X14801" id="tbdisp84113X35X14801" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14801" id="answer84113X35X14801" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14801" class="answertext">依托云平台开展紧密合作</label>

		<input type="hidden" name="java84113X35X14801" id="java84113X35X14801" value="">

	</li>

	



	<li id="javatbd84113X35X14802">



	<input type="hidden" name="tbdisp84113X35X14802" id="tbdisp84113X35X14802" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14802" id="answer84113X35X14802" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14802" class="answertext">盘活闲置厂房楼宇建创业创新园区（基地）或“双创”服务平台</label>

		<input type="hidden" name="java84113X35X14802" id="java84113X35X14802" value="">

	</li>

	



	<li id="javatbd84113X35X14803">



	<input type="hidden" name="tbdisp84113X35X14803" id="tbdisp84113X35X14803" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14803" id="answer84113X35X14803" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14803" class="answertext">检测与认证</label>

		<input type="hidden" name="java84113X35X14803" id="java84113X35X14803" value="">

	</li>

	



	<li id="javatbd84113X35X14804">



	<input type="hidden" name="tbdisp84113X35X14804" id="tbdisp84113X35X14804" value="on">

		<input class="checkbox" type="checkbox" name="84113X35X14804" id="answer84113X35X14804" value="Y" onclick="cancelBubbleThis(event);noop_checkconditions(this.value, this.name, this.type)">

<label for="answer84113X35X14804" class="answertext">人才招聘</label>

		<input type="hidden" name="java84113X35X14804" id="java84113X35X14804" value="">

	</li>

	<li>



		<input class="checkbox" type="checkbox" name="84113X35X148othercbox" alt="其它" id="answer84113X35X148othercbox" onclick="cancelBubbleThis(event);document.getElementById(&quot;answer84113X35X148other&quot;).value=&quot;&quot;;">

		<label for="answer84113X35X148other" class="answertext">其他：</label>

		<input class="text" type="text" name="84113X35X148other" id="answer84113X35X148other" onkeypress="if ($.trim($(&quot;#answer84113X35X148other&quot;).val())!=&quot;&quot;) {document.getElementById(&quot;answer84113X35X148othercbox&quot;).checked=true;}">

		<input type="hidden" name="java84113X35X148other" id="java84113X35X148other" value="">

	</li>

</ul>



	<input type="hidden" name="display84113X35X148" id="display148" value="on">



						</td>

					</tr>

					<tr>

						<td class="questionhelp">

							

						</td>

					</tr>

				</tbody></table>

			</td>

		</tr>

	</tbody></table>

	<table>

		<tbody><tr>

			<td height="10"></td>

		</tr>

	</tbody></table>

</div>

<div class="dotline"></div>



<!-- END THE GROUP -->

		</div></td>

	</tr>

</tbody></table>

<table><tbody><tr><td height="2"></td></tr></tbody></table>





<!-- PRESENT THE NAVIGATOR -->

<table width="100%" align="center" cellpadding="8" bgcolor="#EEF6FF" class="btngroup">

	<tbody><tr>

		<td align="left" width="30%">

			

		</td>

		<td align="center" width="40%">

			<input type="hidden" name="move" value="movenext" id="movenext"><input class="submit" accesskey="p" type="button" onclick="javascript:document.limesurvey.move.value = 'moveprev'; document.limesurvey.submit();" value=" << 上一页 " name="move2" id="moveprevbtn">

	<input class="submit" type="submit" accesskey="n" onclick="javascript:document.limesurvey.move.value = 'movenext';" value=" 下一页 >> " name="move2" id="movenextbtn">



		</td>

		<td align="right" width="30%">

			<div class="clearall"><a href="/survey/index.php?sid=84113&amp;move=clearall&amp;lang=zh-Hans" onclick="return confirm(&quot;您确定要清除所有反馈吗？&quot;)">[退出并清除调查]</a></div>



		</td>

	</tr>

</tbody></table>

<!-- group2.php -->

<input type="hidden" name="mandatory" value="84113X34X129|84113X34X130|84113X34X132|84113X34X133|84113X34X134|84113X34X135|84113X34X136" id="mandatory">

<input type="hidden" name="mandatoryfn" value="84113X34X129|84113X34X130|84113X34X132|84113X34X133|84113X34X134|84113X34X135|84113X34X136" id="mandatoryfn">

<input type="hidden" name="thisstep" value="1" id="thisstep">

<input type="hidden" name="sid" value="84113" id="sid">

<input type="hidden" name="token" value="" id="token">

</form>

			

		</td>

	</tr>

</tbody></table>

		

		

	</div>
</div>
