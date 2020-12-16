<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'examen_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_examen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'aghbs',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'anticore',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hvc',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'acaghbs',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
