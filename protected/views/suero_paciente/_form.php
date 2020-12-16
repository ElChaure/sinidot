<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'suero-paciente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fecha_entrega',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'fecha_entrega'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_entrega',
			 'language' => 'es',
			 'options'=>array(
				 'autoSize'=>true,
				 'dateFormat'=>'dd-mm-yy',
				 'selectOtherMonths'=>true,
				 'duration'=>'fast',
				 'showAnim'=>'slide',
				 'showButtonPanel'=>true,
				 'showOtherMonths'=>true,
				 'changeMonth' => 'true',
				 'changeYear' => 'true',
				 ),
	)); ?>

	<?php echo $form->textFieldRow($model,'identificacion_muestra',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'identificacion_prueba',array('class'=>'span5','maxlength'=>30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
