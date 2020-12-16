<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<center><h2>Error <?php echo $code; ?></h2></center>
<br>
<table WIDTH=1170>
<tr>
<td  ALIGN=CENTER>
<?php 
   

    if ($code=='400') {
       echo "<img src=".Yii::app()->request->baseUrl."/images/error_400.png  width='350' height='350'>"; 
	}	
	if ($code=='401') {
       echo "<img src=".Yii::app()->request->baseUrl."/images/error_401.png  width='350' height='350'>"; 
	}
    if ($code=='402') {
       echo "<img src=".Yii::app()->request->baseUrl."/images/Sign-Error-icon.png  width='350' height='350'>"; 
	}	
    if ($code=='403') {
       echo "<img src=".Yii::app()->request->baseUrl."/images/error_403.png  width='350' height='350'>"; 
	}	
    if ($code=='404') {
	   echo "<img src=".Yii::app()->request->baseUrl."/images/error_404.png  width='350' height='350'>"; 
	}
    if ($code=='500') {
	   echo "<img src=".Yii::app()->request->baseUrl."/images/error_500.png  width='350' height='350'>"; 
	}
?>
	</td>
	</tr>
</table>	
<br>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
<br>
<br>
