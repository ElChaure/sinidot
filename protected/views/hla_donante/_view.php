<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('donante_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->donante_id),array('view','id'=>$data->donante_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_prueba')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_prueba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identificacion_prueba')); ?>:</b>
	<?php echo CHtml::encode($data->identificacion_prueba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locus_a_alelo_1')); ?>:</b>
	<?php echo CHtml::encode($data->locus_a_alelo_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locus_b_alelo_1')); ?>:</b>
	<?php echo CHtml::encode($data->locus_b_alelo_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locus_dr_alelo_1')); ?>:</b>
	<?php echo CHtml::encode($data->locus_dr_alelo_1); ?>
	<br />


</div>