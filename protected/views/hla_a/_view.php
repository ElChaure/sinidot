<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('locus_a_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->locus_a_id),array('view','id'=>$data->locus_a_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locus_a_alelo_1')); ?>:</b>
	<?php echo CHtml::encode($data->locus_a_alelo_1); ?>
	<br />


</div>