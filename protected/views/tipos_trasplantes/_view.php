<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_trasplante_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_trasplante_id),array('view','id'=>$data->tipo_trasplante_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_trasplante')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_trasplante); ?>
	<br />
<hr>
<br />
</div>