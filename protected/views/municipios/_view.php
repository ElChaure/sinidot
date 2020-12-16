<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->municipio_id),array('view','id'=>$data->municipio_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_id')); ?>:</b>
	<?php echo CHtml::encode($data->estado->estado); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio')); ?>:</b>
	<?php echo CHtml::encode($data->municipio); ?>
	<br />
    <hr>
	<br />
</div>