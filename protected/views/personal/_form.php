<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'personal-form',
	'enableAjaxValidation'=>false,
)); ?>

<!-- javascript  -->
<?php Yii::app()->clientScript->registerCoreScript("jquery"); ?>
	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php 
    if(!$model->isNewRecord){?>
	<script>
	$(document).ready(function(){
	 $("#nac").prop("disabled", true);
	 $("#cedula").prop("readonly", true);  
	 $("#Personal_apellido1").prop("readonly", true);
	 $("#Personal_apellido2").prop("readonly", true);
	 $("#Personal_nombre1").prop("readonly", true);
	 $("#Personal_nombre2").prop("readonly", true);    
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
		   url: <?php echo "'".CController::createUrl('Personal/Buscapersona')."'"; ?>,
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
			$("#nac").prop("readonly", true);
                        $('#cedula').val(info.NUMCEDULA);
			$("#cedula").prop("readonly", true);  
			$('#Personal_apellido1').val(info.PRIMERAPELLIDO);
			$("#Personal_apellido1").prop("readonly", true);
                        $('#Personal_apellido2').val(info.SEGUNDOAPELLIDO);
		        $("#Personal_apellido2").prop("readonly", true);
                        $('#Personal_nombre1').val(info.PRIMERNOMBRE);
			$("#Personal_nombre1").prop("readonly", true);
                        $('#Personal_nombre2').val(info.SEGUNDONOMBRE);
			$("#Personal_nombre2").prop("readonly", true);

		   }
        }
					        });
					    });
					</script>	
	
	
	

	<?php echo $form->textFieldRow($model,'apellido1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'apellido2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model,'centro_id', 
                   CHtml::listData(Centros_hospitalarios::model()->findAll(), 'centro_id', 'nombre'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>

	<?php //echo $form->textFieldRow($model,'cargo_id',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model,'cargo_id', 
                   CHtml::listData(Cargos::model()->findAll(), 'cargo_id', 'cargo'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>


	<?php //echo $form->textFieldRow($model,'fecha_ingreso',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
		<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 
			 'attribute'=>'fecha_ingreso',
			 'language' => 'es',
			 //'htmlOptions' => array('readonly'=>"readonly",'id'=>'ingreso_mpps'),
			 'options'=>array(
				 'autoSize'=>true,
				 'dateFormat'=>'yy-mm-dd',
				 'selectOtherMonths'=>true,
				 'duration'=>'fast',
				 'showAnim'=>'slide',
				 'showButtonPanel'=>true,
				 'showOtherMonths'=>true,
				 'changeMonth' => 'true',
				 'changeYear' => 'true',
				 ),
			 )); ?>	


	<?php //echo $form->textFieldRow($model,'estatus_id',array('class'=>'span5')); ?>
    <?php echo $form->dropDownListRow($model,'estatus_id', 
                   CHtml::listData(Estatus_per::model()->findAll(), 'estatus_id', 'estatus'),
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
