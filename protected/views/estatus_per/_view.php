<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->estatus_id),array('view','id'=>$data->estatus_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>
