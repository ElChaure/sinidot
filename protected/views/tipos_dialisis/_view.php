<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dialisis_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dialisis_id),array('view','id'=>$data->dialisis_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_dialisis')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_dialisis); ?>
	<br />
<hr>
<br />
</div>