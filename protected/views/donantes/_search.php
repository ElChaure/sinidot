<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'donante_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cedula',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'apellido1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'apellido2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nombre1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nombre2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'fecha_nacimiento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'causa_muerte',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'fecha_muerte',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tipo_donante_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nacionalidad',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'peso',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'talla',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'genero',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textAreaRow($model,'diagnostico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'antecedentes_personales_patologicos',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'antecedentes_epidemiologicos',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'examen_fisico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'hemodinamia',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'diuresis',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'proceso_infeccioso',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'tratamiento_antibiotico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'sangre_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'perfil_renal',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'perfil_hepatico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'hematies',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'hemoglobina',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'hematocrito',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'vcm',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'hcm',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'chcm',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'leucocitos',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'plaquetas',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textAreaRow($model,'cultivos',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'serologia',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'drogas_vasoactivas',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
        
        <?php echo $form->textAreaRow($model,'estatus_id',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
