<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<!--中间-->
<?php 
$this->title = '供应信息发布';
//$this->params['breadcrumbs'][] = ['label' => '公共信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?=Html::jsFile('@web/ueditor/ueditor.config.js')?>
	<?=Html::jsFile('@web/ueditor/ueditor.all.js')?>
    <script type="text/javascript">
		var ue = UE.getEditor("editor",{
			toolbars: [[
		        'undo', //撤销
		        'redo', //重做
		        'fontsize', //字号
		        'bold', //加粗
		        'underline', //下划线
		        'forecolor', //字体颜色
		        'indent', //首行缩进
		        'lineheight', //行间距
		        'justifyleft', //居左对齐
		        'justifyright', //居右对齐
		        'justifycenter', //居中对齐
		        'justifyjustify', //两端对齐
		        'horizontal', //分隔线
		        'insertframe', //插入Iframe
		        'simpleupload', //单图上传
		        'imagenone', //默认
		        'imageleft', //左浮动
		        'imageright', //右浮动
		        'imagecenter', //居中
		        'fullscreen', //全屏
		        ]]
				,maximumWords:8000
		});
    </script>
<!--此处是内容区部分-->
<div class="outwrap">	
	
	<div class="innerwrap bg_form">
		
		<div class="innerCotent">
			<div class="formTitle"><a href="#" onclick="javascript:history.back(-1);">返回上一页</a></div>
			<form id="commentForm" method="post" action="<?=Url::to(['product/create-sup'])?>">
				<table class="mytb midTb" cellpadding="0" cellspacing="0">
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品标题</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[title]" class="form-control" required placeholder="产品标题" value="">
						</td>						
					</tr>
					<tr>
					<td class="col-sm-3 text-center bg_lable">产品类型</td>
						<td class="col-sm-9">
							<select class="form-control"  id="first" onchange="setSelect(this,'second')" required >

							  <option value =''>请选择产品类型</option> 
							  
							  <?php foreach ($menus as $menu):?>
							  
							  <option value='<?=Html::encode($menu['Id'])?>'><?=Html::encode($menu['name'])?></option>
							  
							  <?php endforeach;?>

							</select>
							<br>
							<select class="form-control"  id="second" onchange="setSelect(this,'third')" required disabled>
								  <option value =''>请选择产品类型</option> 
							</select>
							<br>
						<select class="form-control" name = "Form[type]"  id="third" required disabled >

							  <option value =''>请选择产品类型</option> 

							</select>
						</td>						

					</tr>
					
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品供应商</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[provider]" class="form-control" required value="<?=Yii::$app->session['user.company']?>"  placeholder="产品供应商" disabled>
							<input type="text" name="Form[provider]" class="form-control" value="<?=Yii::$app->session['user.company']?>"  placeholder="产品供应商" style="display:none">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品报价</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[quote]" class="form-control" required value="" placeholder="产品报价">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品品牌</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[brand]" class="form-control" required value="" placeholder="产品品牌">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品型号</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[model]" class="form-control" required value="" placeholder="产品型号">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品规格</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[standard]" class="form-control" required value="" placeholder="产品规格">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品所在地</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[location]" class="form-control" required value="" placeholder="产品所在地">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>联系人</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[contact_name]" class="form-control" required value="<?=Yii::$app->session['userName']?>" placeholder="联系人">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>联系电话</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[contact_tel]" class="form-control" required value="<?=Yii::$app->session['loginName']?>" placeholder="联系电话">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>关键词</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[keyword]" class="form-control" required value="" placeholder="关键词">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>
					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>产品编号</div></td>
						<td class="col-sm-9">
							<input type="text" name="Form[number]" class="form-control" required value="" placeholder="产品编号">
<!-- 							<p class="help-block">例如：关于异地就医直接结算政策的问题</p> -->
						</td>						
					</tr>

					<tr>
						<td class="col-sm-3 text-center bg_lable"><div>详细信息</div></td>

						<td class="col-sm-9">
							<textarea name="Form[detail]" id="content" class="form-control" style="display: none" rows="10" required  placeholder=""></textarea>
						
							<a href="#" class="tooltip-content"  title="请填写内容" data-placement="right">
								<script id="editor" type="text/plain" style="width:100%;height:300px;" name="Form[detail]"></script>
							</a>
							
						</td>	

					</tr>
					

					<tr>

						<td class="col-sm-3 text-center bg_lable">产品展示</td>
						<td class="col-sm-9">
							<div id="upload_attach" class="inpBox">
								<div class="btnAtta" onclick="upload_btn_click();">
									<i class="icon_clip"></i>
									<span class="ic_text">上传图片</span>									
								</div>
							</div>
							<div id="file_list" class="inpBox inpBox_atta" style="display: block;">								
							</div>
							
						</td>
					</tr>
				</table>

				
				<div class="buttnGroup">
<!-- 					<input class="submit" type="submit" value="发布信息"> -->
					<input class="submit" onclick="send_submit()" value="发布供应信息">
					<!-- <a href="javascript:void(0)" class="mobtn default_btn">取消</a> -->
				</div>
				
			</form>

				<div id="uploadfile" style="display:none">

		<form name="upload_form" id="upload_form" class="upload_form"  method="post" target='upload_frame' enctype="multipart/form-data" action="index.php?r=product/uploadfile">
			<!--input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);"-->
            <input id="taskID" type="hidden" name="taskID" value=0>
			<input type="file" id="upload_button" name="upload_file" class="upload_button"  onchange="upload_fun(this.value);">
			<iframe id="upload_frame" name="upload_frame" style="display:none"></iframe>
		</form> 
				</div> 
		</div>


		
	</div>

</div>
<!--底部-->


<script>
window.onload=function(){ 

	//需要参考jquery validate 验证插件
	//$("#commentForm").validate();
	
	//form 表单提交之后触发
// 	$.validator.setDefaults({
// 	    submitHandler: function() {
// 	      alert("提交事件!");
// 	    }
// 	});
	
};
/**
 * 删除文件
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
function file_del(id){
	$("#attach"+id).remove();	
    $('#upload_attach').css('display',"block");	
}
/**
 * 触发上传文件
 * @return {[type]} [description]
 */
function upload_btn_click(){
	$("#upload_button").click();
	
}
var taskID = 0;
/**
 * 上传文件
 * @return {[type]} [description]
 */
	function upload_fun(x){
	    var file = $('#upload_button').get(0).files[0];
	  	//var filetype = $("#publicinfoform-filetype").attr('value');
	    if (file) {
	        var fileSize = 0;
	        var errorSize = 0;
	        var str = "";
	        if (file.size > 1024 * 1024){ 
	            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
	            if(Math.round(file.size * 100 / (1024 * 1024)) / 100 > 5){
	                //str = "错误！文件不可大于200MB。";
					str = "文件不可大于5MB";
	                errorSize =1;   
	            }
	        }else{ 
	            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
	        }
	        console.log(file.name, fileSize, file.type);
	        if (!/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name)) {  
		        str = "图片格式不正确";
		        errorSize = 1;
                //showAlert("pic_error","图片格式不正确");  
               // return false;  
            }  
	        if(errorSize == 1){
	            upload_file_end(0,'上传失败',str,null,null);
	            return 0;
	        }
	    }
	    $("#taskID").val(++taskID);
	    document.upload_form.submit();
	    var file = $('#upload_button');
	    file.after(file.clone().val("")); 
	    file.remove();
	    $('#upload_attach').css('display','none');
	}
	function upload_file_end(result,state,str,fileinfo,tmpTaskID){
	    if(result){
	    	 var html = "<div id='attach"+tmpTaskID+"' href='#' class='attaIteam' style='display: block;'>"+
	    	 "<div class='icon_del fr' style='cursor:pointer;' onclick='file_del("+tmpTaskID+")'></div>"+
	    	 
	    	 "<i class='icon_file'></i><span  id='attachName1'>"+fileinfo.name+"</span><input id='file_"+tmpTaskID+"' type='hidden'  name='file_list[]' value=''></div>";	    	 
	    	 $("#file_list").append(html);
	    	 $("#file_"+tmpTaskID).attr("value",JSON.stringify(fileinfo));
	    	 console.log($("#file_"+tmpTaskID).val());
	    }else{
			showAlert("pic_error", str);
	    }	    
	}

// 	function file_del(id){
// 		$("#attach"+id).css("display","none");
// 		$('#upload_button').css("display");
// 	}
	function send_submit(){
		$("#content").val(UE.getEditor('editor').getContent());
		$("#commentForm").validate();
		$("#commentForm").submit();
		return true;

	}

	function setSelect(obj,flag){
		var val = obj.value;
		if(flag == "second"){
			$('#third').attr('disabled',true);
			$('#third').empty();
			$('#third').append("<option value =''>请选择产品类型</option>");
		}
		$('#'+flag).empty();
		$('#'+flag).attr("disabled",true);
		$('#'+flag).append("<option value =''>请选择产品类型</option>");
		$.ajax({
			url:"index.php?r=product/get-menus",
			type:"get",
			data:{"id":val},
			success:function(data){								
				data = $.parseJSON(data);
				

				//console.log(data.length);
				for(var i=0;i<data.length;i++){
					//$('#'+fl)
					//console.log(data[i]['name']);
					$('#'+flag).append("<option value='"+data[i]['Id']+"'>"+data[i]['name']+"</option>");
					
					//menus.options[i]=new Option(data[i]['name'],data[i]['Id']);
				}
				$('#'+flag).attr("disabled",false);
				//console.log($('#second'));
				//console.log(data);
			},
			error:function(e){
				showAlert('pic_error','获取菜单失败');
			},
			complete:function(){
			}
		})
		
		//var menus = document.getElementById(falg);
		//console.log(val);
	}
</script>
