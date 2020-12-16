<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('examen_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->examen_id),array('view','id'=>$data->examen_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paciente_id')); ?>:</b>
	<?php echo CHtml::encode($data->paciente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_examen')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_examen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aghbs')); ?>:</b>
	<?php echo CHtml::encode($data->aghbs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anticore')); ?>:</b>
	<?php echo CHtml::encode($data->anticore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hvc')); ?>:</b>
	<?php echo CHtml::encode($data->hvc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acaghbs')); ?>:</b>
	<?php echo CHtml::encode($data->acaghbs); ?>
	<br />


</div>