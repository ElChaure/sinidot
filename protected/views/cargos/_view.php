<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cargo_id),array('view','id'=>$data->cargo_id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_cargo); ?>
	<br />	

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />
    <hr>
	<br />

</div>
