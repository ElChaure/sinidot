<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sangre_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sangre_id),array('view','id'=>$data->sangre_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo_sanguineo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo_sanguineo); ?>
	<br />
	<hr>
	<br />
</div>