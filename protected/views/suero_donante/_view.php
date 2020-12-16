<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('suero_don_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->suero_don_id),array('view','id'=>$data->suero_don_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('donante_id')); ?>:</b>
	<?php echo CHtml::encode($data->donante_id); ?>
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