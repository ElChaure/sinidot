<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_name')); ?>:</b>
	<?php echo CHtml::encode($data->from_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_email')); ?>:</b>
	<?php echo CHtml::encode($data->from_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_email')); ?>:</b>
	<?php echo CHtml::encode($data->to_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_attempts')); ?>:</b>
	<?php echo CHtml::encode($data->max_attempts); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('attempts')); ?>:</b>
	<?php echo CHtml::encode($data->attempts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('success')); ?>:</b>
	<?php echo CHtml::encode($data->success); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_published')); ?>:</b>
	<?php echo CHtml::encode($data->date_published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_attempt')); ?>:</b>
	<?php echo CHtml::encode($data->last_attempt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_sent')); ?>:</b>
	<?php echo CHtml::encode($data->date_sent); ?>
	<br />

	*/ ?>

</div>