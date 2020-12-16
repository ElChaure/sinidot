<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cedula',array('class'=>'span5','maxlength'=>10)); ?>
	
	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'tipo_centro_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'estado_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'municipio_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'parroquia_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'region_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ctx_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
