<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<?php 
    if($this->title){
?>
<div class="pageTitleWrap">

	<div class="pageTitle">

		<div class="title"><i class="icon_squre"></i><?= $this->title ?></div>

		<div class="positions">

			<a href="index.php?r=home">首 页</a> &gt; <?= $this->title ?>

		</div>

	</div>

</div>
<?php 
    }
?>

<div class="outwrap">
    <?= $content ?>
</div>
