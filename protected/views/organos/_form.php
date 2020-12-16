<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'organos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php 
    if($model->isNewRecord){
    ?>
	<script>
	$(document).ready(function(){
     $("#Organos_paciente_id").prop("disabled", true);
	 $("#Organos_hora_asignacion").prop("readonly", true);
     $("#Organos_estatus_id").prop("disabled", true);  	 
	});
	</script>
      <?php }?>
	
	
	
	<?php //echo $form->textFieldRow($model,'donante_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'codigo',array('class'=>'span5','maxlength'=>25)); ?>

	<?php //echo $form->textFieldRow($model,'fecha_ablacion',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'fecha_ablacion'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_ablacion',
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

	<?php //echo $form->textFieldRow($model,'hora_ablacion',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'hora_ablacion'); ?>
	<?php 

	/*$this->widget('ext.timepicker.timepicker', array(
		'model'=>$model,
		'name'=>'hora_ablacion',
		
	));
	
 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
    'model'=>$model,
     'attribute'=>'hora_ablacion',
     // additional javascript options for the date picker plugin
     'options'=>array(
         'showPeriod'=>false,
		 'showSeconds'=>true,
         ),
     'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
 ));


*/
	?>
	<?php
 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
    'model'=>$model,
     'attribute'=>'hora_ablacion',
     // additional javascript options for the date picker plugin
     'options'=>array(
         'showPeriod'=>false,
		 'hourText'=>'Hora',             // Define the locale text for "Hours"
        ' minuteText'=>'Minuto',
         ),
     'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
 ));
 
?>
	
	
	
	<?php //echo $form->textFieldRow($model,'rinon_id',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'rinon_id'); ?>
	<?php echo $form->dropDownList($model, 'rinon_id', array('1'=>'Riñon Izquierdo', '2'=>'Riñon Derecho')); ?>

	<?php //echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5')); ?>
    <?php  echo $form->dropDownListRow($model, 'paciente_id',  CHtml::listData(Pacientes_alfa::model()->findAll(), 'paciente_id', 'nombre'));?> 	
	

	<?php echo $form->textFieldRow($model,'hora_asignacion',array('class'=>'span5')); ?>
	
    <?php echo $form->labelEx($model,'estatus_id'); ?>
	<?php echo $form->dropDownList($model, 'estatus_id', array('1'=>'Por Asignar', '2'=>'Asignado', '3'=>'Perdido')); ?>
	<?php //echo $form->textFieldRow($model,'estatus_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
