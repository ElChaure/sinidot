<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'municipios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'estado_id',array('class'=>'span5')); ?>
   <?php echo $form->dropDownListRow($model,'estado_id',CHtml::listData(Estados::model()->findAll(),'estado_id', 'estado'),
	 array('class'=>'span5','maxlength'=>12,),
	 array('prompt'=>'Seleccione un Estado')); ?>
	 
	<?php echo $form->textFieldRow($model,'municipio_id',array('class'=>'span5')); ?>	

	<?php echo $form->textFieldRow($model,'municipio',array('class'=>'span5','maxlength'=>30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
