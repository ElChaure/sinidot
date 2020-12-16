<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    //'heading'=>'Bienvenido al '.CHtml::encode(Yii::app()->name),
)); 
?>

<div id="collage" backgound_color='#bbbbbb' align='center'>
         <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fondo2.png" style="width: 40%; height: 40%"/>
      </div>

<?php $this->endWidget(); ?>

