<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('parroquia_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->parroquia_id),array('view','id'=>$data->parroquia_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio_id')); ?>:</b>
	<?php echo CHtml::encode($data->municipio->municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parroquia')); ?>:</b>
	<?php echo CHtml::encode($data->parroquia); ?>
	<br />
<hr>
<br />
</div>