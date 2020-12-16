<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'usuario',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'clave',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'rol_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estatus_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tipo_trasplante_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
