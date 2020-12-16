<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'donantes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php 
    if(!$model->isNewRecord){?>
	<script>
	$(document).ready(function(){
	 $("#nac").prop("disabled", true);
	 $("#cedula").prop("readonly", true);  
	 $("#Donantes_apellido1").prop("readonly", true);
	 $("#Donantes_apellido2").prop("readonly", true);
	 $("#Donantes_nombre1").prop("readonly", true);
	 $("#Donantes_nombre2").prop("readonly", true);
         $("#Donantes_fecha_nacimiento").prop("disabled", true);    
	});
	</script>
      <?php };




           echo $form->labelEx($model,'cedula'); ?>
    <?php echo $form->dropDownList($model,'nacionalidad',array('V'=>'Venezolano','E'=>'Extranjero') ,array('style'=>'width:120px', 'id'=>'nac')); ?>
	<?php echo $form->textField($model,'cedula',array('size'=>12,'maxlength'=>12, 'id'=>'cedula','onkeypress'=>'return numeros(event);','style'=>'width:147px;')); ?>
<img id="imgLoad" alt="Cargando..." src="<?php echo Yii::app()->theme->baseUrl; ?>/css/loading.gif" style="max-width:24px; vertical-align:top; display:none" />
	<?php echo $form->error($model,'cedula'); ?>	
	<!-- Peticion ajax -->
	<script>
	$('#cedula').on('change', function(){
	   $.ajax({
		   url: <?php echo "'".CController::createUrl('Donantes/Buscapersona')."'"; ?>,
		   data: { 'nac':$("#nac").val(), 'ced':$("#cedula").val()},
                   type: 'post',
		   beforeSend: function(){
		      $("#imgLoad").show();
		   },
		   complete: function(){
		      $("#imgLoad").hide();
		   },
		   success: function(data){	
		   var info = JSON.parse(data);
		   if (info["donde"] == "3"){
		      alert('Esta persona ya se encuentra registrada');
                      $('#cedula').val("");
                      document.getElementById("cedula").focus();      
 
		   }
                   /* Mostrar en TextField valores asociados a la Cedula ingresada desde la consulta a SAIME */
		   else {
                        $('#nac').val(info.LETRA);
			$("#nac").prop("disabled", true);
                        $('#cedula').val(info.NUMCEDULA);
			$("#cedula").prop("readonly", true);  
			$('#Donantes_apellido1').val(info.PRIMERAPELLIDO);
			$("#Donantes_apellido1").prop("readonly", true);
                        $('#Donantes_apellido2').val(info.SEGUNDOAPELLIDO);
		        $("#Donantes_apellido2").prop("readonly", true);
                        $('#Donantes_nombre1').val(info.PRIMERNOMBRE);
			$("#Donantes_nombre1").prop("readonly", true);
                        $('#Donantes_nombre2').val(info.SEGUNDONOMBRE);
			$("#Donantes_nombre2").prop("readonly", true);
                        $('#Donantes_fecha_nacimiento').val(info.FECHANAC);
			$("#Donantes_fecha_nacimiento").prop("disabled", true);

		   }
        }
					        });
					    });
					</script>

	
	<?php echo $form->textFieldRow($model,'apellido1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'apellido2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nombre1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'nombre2',array('class'=>'span5','maxlength'=>20)); ?>


	<?php echo $form->labelEx($model,'fecha_nacimiento'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_nacimiento',
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


	<?php echo $form->textFieldRow($model,'causa_muerte',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'fecha_muerte',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'fecha_muerte'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_muerte',
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
			 
			 
	<?php //echo $form->textFieldRow($model,'tipo_donante_id',array('class'=>'span5')); ?>
	<?php echo $form->dropDownListRow($model,'tipo_donante_id', 
                   CHtml::listData(Tipos_donantes::model()->findAll(), 'tipo_donante_id', 'tipo_donante'),
                   array('class'=>'span5','maxlength'=>12)); 
    ?>

	<?php //echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); ?>
	<?php echo $form->dropDownListRow($model,'centro_id', 
                   CHtml::listData(Centros_hospitalarios::model()->findAll(), 'centro_id', 'nombre'),
                   array('class'=>'span5','maxlength'=>12)); 
    ?>
	<?php echo $form->textFieldRow($model,'peso',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'talla',array('class'=>'span5','maxlength'=>5)); ?>

	<?php //echo $form->textFieldRow($model,'genero',array('class'=>'span5','maxlength'=>1)); ?>
	<?php echo $form->dropDownListRow($model,'genero', 
                   CHtml::listData(Generos::model()->findAll(), 'id', 'genero'),
                   array('class'=>'span5','maxlength'=>12)); 
    ?>
	<?php echo $form->textAreaRow($model,'diagnostico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'antecedentes_personales_patologicos',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'antecedentes_epidemiologicos',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'examen_fisico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'hemodinamia',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'diuresis',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'proceso_infeccioso',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'tratamiento_antibiotico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<h2>Laboratorios</h2>
	
	<?php //echo $form->textFieldRow($model,'sangre_id',array('class'=>'span5')); ?>
	<?php echo $form->dropDownListRow($model,'sangre_id', 
                   CHtml::listData(Sangre::model()->findAll(), 'sangre_id', 'grupo_sanguineo'),
                   array('class'=>'span5','maxlength'=>12)); 
    ?>	

	<?php echo $form->textAreaRow($model,'perfil_renal',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'perfil_hepatico',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'hematies',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'hemoglobina',array('class'=>'span5','maxlength'=>5)); ?>

	<h2>Hemograma Completo</h2>
	
	<?php echo $form->textFieldRow($model,'hematocrito',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'vcm',array('class'=>'span5','maxlength'=>5)); ?>
	
	<?php
     /*echo $form->labelEx($model,'vcm');
     $this->widget('CMaskedTextField', array(
         'model' => $model,
         'attribute' => 'vcm',
         'mask' => '99999.99',
         'charMap' => array('x' => '[0-9]')
     ));
	 */
?>

	<?php echo $form->textFieldRow($model,'hcm',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'chcm',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'leucocitos',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'plaquetas',array('class'=>'span5','maxlength'=>6)); ?>

	<h2>Cultivos y Serologia</h2>
	
	<?php echo $form->textAreaRow($model,'cultivos',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'serologia',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<h2>Mantenimiento de Donante (tiempo y dosis)</h2>
	
	<?php echo $form->textAreaRow($model,'drogas_vasoactivas',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

        <?php echo $form->dropDownListRow($model,'estatus_id', 
                   CHtml::listData(Estatus_don::model()->findAll(), 'estatus_id', 'estatus'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
