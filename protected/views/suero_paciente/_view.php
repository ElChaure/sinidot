<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('suero_pac_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->suero_pac_id),array('view','id'=>$data->suero_pac_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paciente_id')); ?>:</b>
	<?php echo CHtml::encode($data->paciente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_entrega')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_entrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identificacion_muestra')); ?>:</b>
	<?php echo CHtml::encode($data->identificacion_muestra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identificacion_prueba')); ?>:</b>
	<?php echo CHtml::encode($data->identificacion_prueba); ?>
	<br />


</div>