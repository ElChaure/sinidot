<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'personal_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cedula',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'apellido1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'apellido2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cargo_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_ingreso',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estatus_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nacionalidad',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
