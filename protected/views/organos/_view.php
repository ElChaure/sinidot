<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('organo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->organo_id),array('view','id'=>$data->organo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('donante_id')); ?>:</b>
	<?php echo CHtml::encode($data->donante_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ablacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ablacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_ablacion')); ?>:</b>
	<?php echo CHtml::encode($data->hora_ablacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rinon_id')); ?>:</b>
	<?php echo CHtml::encode($data->rinon_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paciente_id')); ?>:</b>
	<?php echo CHtml::encode($data->paciente_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_asignacion')); ?>:</b>
	<?php echo CHtml::encode($data->hora_asignacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_id')); ?>:</b>
	<?php echo CHtml::encode($data->estatus_id); ?>
	<br />

	*/ ?>

</div>