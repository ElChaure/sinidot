<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<table>
<tr>
<td width="400">
</td>
<td>
<div id="body">
   <div id="logo"><?php echo "<img src=".Yii::app()->request->baseUrl."/images/higado.jpg width='100%'>"; ?></div>
</div><!-- body -->
</td>
</tr>
</table>
