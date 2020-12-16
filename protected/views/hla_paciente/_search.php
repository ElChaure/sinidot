<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_prueba',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'identificacion_prueba',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'locus_a_alelo_1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'locus_b_alelo_1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'locus_dr_alelo_1',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
