<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'organo_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'donante_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'codigo',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'fecha_ablacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hora_ablacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'rinon_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'hora_asignacion',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estatus_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
