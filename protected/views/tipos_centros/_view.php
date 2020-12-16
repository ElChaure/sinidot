<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_centro_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_centro_id),array('view','id'=>$data->tipo_centro_id)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_centro')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_centro); ?>
	<br />
	<hr>
</div>
