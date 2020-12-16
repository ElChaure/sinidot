<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tipo_trasplante_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cedula',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nacionalidad',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'apellido1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'apellido2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fecha_nac',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'peso',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'talla',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'sangre_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_ini_prog',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_ini_dial',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'dialisis_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'parametros_dialisis',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'celular',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'correo_electronico',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'region_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estado_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'municipio_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'parroquia_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'persona_contacto',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'telefono_contacto',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'porcentaje_par',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha__act_par',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'enfermedad_actual',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'antecedentes_pers',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'accesos_vasculares',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'genero',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'condicion_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'estatus_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
