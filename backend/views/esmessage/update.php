<?php
use yii\helpers\Html;
?>

  

<!--顶部-->

<!--中间-->
<?php 
$this->title = '处理信息';
$this->params['breadcrumbs'][] = ['label' => '处理信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<!--此处是内容区部分-->

<div class="outwrap">	

	

	<div class="innerwrap bg_form">

		

		<div class="innerCotent">

			<div class="formTitle">处理信息</div>

        
			<form name='commentForm' id="commentForm" method="post" enctype="multipart/form-data" action="index.php?r=esmessage/update&action=save&id=<?php echo $model->id;?>">

				<table class="mytb midTb" cellpadding="0" cellspacing="0">
<tr>

						<td class="col-sm-3 text-center bg_lable">处理</td>

						<td class="col-sm-9">
						    <select class="form-control" style="width:120px;" name="status">
						 
					           				
					<?php 
					
			 
					   $paramArr = \Yii::$app->params["esStatus"];
					  $status= $model->status;
				 
					   foreach ($paramArr as $key=>$value){
					       if($status && $key==$status ){
			           ?>
                     
                        <option  selected="selected"  value="<?php echo $key;?>"><?php echo $value;?></option>
                       <?php                                    
                               }else{
                       ?>     
                          <option   value="<?php echo $key;?>"><?php echo $value;?></option>
                            
                       <?php         
                               }
   					   }
   				    ?>449
							</select>
						</td>						

					</tr>
					<tr>

						<td class="col-sm-3 text-center bg_lable">标题</td>

						<td class="col-sm-9">
						 <?php echo $model->Title;?>
						</td>						

					</tr>

					<tr>

						<td class="col-sm-3 text-center bg_lable">姓名</td>

						<td class="col-sm-9">
						 <?php echo $model->name;?>
						</td>						

					</tr>
						<tr>

						<td class="col-sm-3 text-center bg_lable">电话</td>

						<td class="col-sm-9">
						 <?php echo $model->Phone;?>
						</td>						

					</tr>
							<tr>

						<td class="col-sm-3 text-center bg_lable">Email</td>

						<td class="col-sm-9">
						 <?php echo $model->Email;?>
						</td>						

					</tr>
								<tr>

						<td class="col-sm-3 text-center bg_lable">描述</td>

						<td class="col-sm-9">
						 <?php echo $model->description;?>
						</td>						

					</tr>
									<tr>

						<td class="col-sm-3 text-center bg_lable">创建时间</td>

						<td class="col-sm-9">
						 <?php echo $model->createtime;?>
						</td>						

					</tr>
										<tr>

						<td class="col-sm-3 text-center bg_lable">创建时间</td>

						<td class="col-sm-9">
						 <?php echo $model->createtime;?>
						</td>						

					</tr>
										<tr>

						<td class="col-sm-3 text-center bg_lable">处理时间</td>

						<td class="col-sm-9">
						 <?php echo $model->Updatetime;?>
						</td>						

					</tr>
											<tr>

						<td class="col-sm-3 text-center bg_lable">处理人</td>

						<td class="col-sm-9">
						 <?php echo $model->Updateuser;?>
						</td>						

					</tr>
					 
					 

				</table>
				
			 

				<div class="buttnGroup">

					<input class="submit" type="submit" value="提交">

		 

				</div>

				

			</form>

		</div>

 

	</div>

</div>

<!--底部-->

<script>



//$(document).ready(function(){

//需要参考jquery validate 验证插件

//	$("#commentForm").validate();



	//form 表单提交之后触发

//$.validator.setDefaults({

//    submitHandler: function() {

//      alert("提交事件!");

//    }

//});

	

	

//});





</script>

