<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('locus_dr_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->locus_dr_id),array('view','id'=>$data->locus_dr_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locus_dr_alelo_1')); ?>:</b>
	<?php echo CHtml::encode($data->locus_dr_alelo_1); ?>
	<br />


</div>