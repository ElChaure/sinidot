<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_donante_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_donante_id),array('view','id'=>$data->tipo_donante_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_donante')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_donante); ?>
	<br />
	<hr>
	<br />
</div>