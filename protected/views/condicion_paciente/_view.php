<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('condicion_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->condicion_id),array('view','id'=>$data->condicion_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condicion')); ?>:</b>
	<?php echo CHtml::encode($data->condicion); ?>
	<br />
        <br />
        <hr>
</div>
