<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'suero_don_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'donante_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_entrega',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'identificacion_muestra',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'identificacion_prueba',array('class'=>'span5','maxlength'=>30)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
