<?phpuse yii\helpers\Html;use common\models\PublicinfoMenu;?><?php $this->title = '菜单管理';$this->params['breadcrumbs'][] = $this->title;?>
<!--顶部-->
<!--中间--><script >function editor(obj){		var id = $(obj).parent().find('input').eq(0).val();			$('#editor_menuID').val(id);			var file = $('#exampleInputFile');		    file.after(file.clone().val("")); 		    file.remove();			$('#J_uploadFile').modal('show');	}	function del(obj){		var id = $(obj).parent().find('input').eq(0).val();		$('#delete_menuID').val(id);		$('#delModal').modal('show');	}// 	function update(obj){// 		document.menuUpdate.submit();// 	}	function update(obj){		var file = $('#exampleInputFile').get(0).files[0];	    if (file) {	        var fileSize = 0;	        if (file.size > 1024 * 1024){ 	            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';	            if(Math.round(file.size * 100 / (1024 * 1024)) / 100 > 10){		            showAlert("pic_error","文件不可大于10MB");		            return false;	            }	        }else{ 	            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';	        }	        console.log(file.name, fileSize, file.type);	        if (!/\.(gif|jpg|jpeg|png|GIF|JPG|PNG)$/.test(file.name)) {                  showAlert("pic_error","图片格式不正确");                  return false;              }  	    }	    console.log(document.getElementById("menuUpdate"));		var form = new FormData(document.getElementById("menuUpdate"));		console.log(new FormData(document.getElementById("menuUpdate")));		$.ajax({			url:"index.php?r=publicinfo/menuupdate",			type:"post",			data:form,			cache:false,			processData:false,			contentType:false,			success:function(data){												data = $.parseJSON(data);				if(data['code']==0){					showAlert("pic_error",data['msg']);				}else if(data['code']==1){					showAlert("pic_alert",data['msg']);// 					var file = $('#exampleInputFile');// 				    file.after(file.clone().val("")); // 				    file.remove();					$('#J_uploadFile').modal('hide');					window.location.reload();				}else if(data['code']==2){					showAlert("pic_error",data['msg']);				}			},			error:function(e){				showAlert("pic_error","文件保存失败");			},			complete:function(){			}		})	}	function deleteMenu(obj){		console.log("delete");		var id = $('#delete_menuID').val();		$.ajax({			url :"index.php?r=publicinfo/menudelete",			data:{'id':id},			method:'get',			success:function(result){				if(result){					//alert(result);					showAlert("pic_alert","已成功删除" );					$('#delModal').modal('hide');					window.location.reload();				}			},			error:function(result){				showAlert("pic_error","删除失败" );				$('#delModal').modal('hide');			}		});	}</script>
<!--
	
	描述：中间内容区替换内容
-->

<div class="outwrap">	
	
	<div class="innerwrap container-fluid listTop">
		
		<table class="tableList" cellpadding="0" cellspacing="0">			
			<tr>
				<th class="num">序号</th>
				<th class="userpic">
					菜单缩略图
				</th>
				<th>菜单名称</th>				
				<th class="op">操作</th>
			</tr>						<?php foreach ($menus as $key => $menu):?>			
			<tr>
				<td class="num"><?=Html::encode($key+1)?></td>
				<td class="userpic"><img class="pic" src="<?php echo $menu['menu_icon']?>" ></td>
				<td><?=Html::encode($menu['menu_name'])?> </td>				
				<td class="op op_2">
					<input style='display: none' id='id' value='<?=Html::encode($menu['id'])?>'>					
					<a href="javascript:void(0)" class="mobtn mobtnSm primary_btn"  onclick='editor(this);'>编辑</a><!-- 					<span class="mobtn mobtnSm primary_btn" id='editor'>编辑</span> -->
					<a href="javascript:void(0)" class="mobtn mobtnSm dangerous_btn" onclick='del(this);'>删除</a>
					
				</td>				
			</tr>						<?php endforeach;?>
		</table>
		
		
	</div>
</div>
<!--底部-->


<!--此处为上传菜单图标弹出模版-->
<div class="modal fade in modalUploadFile" id="J_uploadFile" tabindex="-1" role="dialog" aria-labelledby="uploadFile" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="picon_modal_del"></span></button>
                <h4 class="modal-title" id="uploadFile"><span class="picon_double_arrow"></span>编辑菜单</h4>
            </div>
            <div class="modal-body">
            	<form role="form" name="menuUpdate" id="menuUpdate" method="post" enctype="multipart/form-data" action="index.php?r=publicinfo/menuupdate">									<input type='text' value ='' style='display: none' name='menu[id]' id='editor_menuID'>									
	              <div class="box-body">
	              	<div class="form-group">
		                <label class="col-sm-3 control-label">菜单名称</label>
								    <div class="col-sm-9">
<!-- 								      <input type="text" class="form-control" placeholder="请输入您要查询的关键字"> -->								      <input type="text" class="form-control" name='menu[menu_name]' id="editor_menuname">
								    </div>
							    </div>
	                <div class="form-group">
	                  <label class="col-sm-3 control-label">菜单图标</label>
	                  <div class="col-sm-9">
		                  <input type="file" id="exampleInputFile" name='upload_file'>	
		                  <p class="help-block">提示：图片大小为80像素*80像素为最佳</p>
		                </div>
	                </div>
	                
	              </div>
	              <!-- /.box-body -->
	
	            </form>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
                <button type="button" class="modalBtn" onclick="update();">确认提交</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!--此处为弹出是否删除模版-->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 300px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">确认删除？</h4>
          </div>
          <div class="modal-body">
            <p>删除后图片将不做保留</p>
          </div>
          <div class="modal-footer">          	          	<input type='text' style="display: none" id="delete_menuID">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
            <button id="J_deletMenu" type="button" class="btn btn-danger" onclick="deleteMenu(this);">删除</button>
          </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- <link rel="stylesheet" href="../css/datepicker.css"> -->
<!-- <script src="../js/jquery.min.js" type="text/javascript" ></script> -->
<!-- <script src="../js/jquery.validate.js"  type="text/javascript" ></script> -->
<!-- <script src="../js/bootstrap.min.js" type="text/javascript" ></script> -->
<!-- <script src="../js/bootstrap-datepicker.js" type="text/javascript" ></script> -->
<!-- <script src="../js/apps.js" type="text/javascript" ></script> -->


<script>
	
	//删除后弹出确认方式/*
	$(document).on("click","#J_deletMenu",function(){
		//调用弹出提示，包含   pic_alert 对号， pic_warn 感叹号  ，pic_error 错误 三种图标		console.log("dddd");				var id = $('#delete_menuID').val();		$.ajax({			url :"index.php?r=publicinfo/menudelete",			data:{'id':id},			method:'get',			success:function(result){				if(result){					//alert(result);					showAlert("pic_alert","已成功删除" );					$('#delModal').modal('hide');					window.location.reload();				}			},			error:function(result){				showAlert("pic_alert","删除失败" );				$('#delModal').modal('hide');				}			});
	});	*/// 	function showAlert(icon,text ){	    // 	    var html = '<div class="J_alert">' // 	        +'<div class="bg"></div>'// 	        +'<div class="alertInner">'// 	        +'<p><i class="'+icon+' alertIcon"></i></p>'// 	        +'<p class="name">'+text+'</p>'// 	        +'</div>'// 	        +'</div>';// 	    $("body").append(html);// 	    setTimeout(function(){// 	            $(".J_alert").fadeOut(500);// 	            //$(".J_alert").remove();// 	            },700);// 	}
</script>
