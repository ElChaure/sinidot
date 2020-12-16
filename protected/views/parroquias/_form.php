<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'parroquias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'parroquia_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'municipio_id',array('class'=>'span5')); ?>
  <?php echo $form->dropDownListRow($model,'municipio_id',CHtml::listData(Municipios::model()->findAll(),'municipio_id', 'municipio'),
	 array('class'=>'span5','maxlength'=>12,),
	 array('prompt'=>'Seleccione un Municipio')); ?>
	 
	<?php echo $form->textFieldRow($model,'parroquia',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
