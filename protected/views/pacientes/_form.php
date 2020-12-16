<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pacientes-form',
	'enableAjaxValidation'=>false,
)); ?>

<!-- javascript  -->
<?php Yii::app()->clientScript->registerCoreScript("jquery"); 
echo $model->estatus_id;
?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php 
    if(!$model->isNewRecord){
       $estatus="Estatus_pac";
      ?>
        
	<script>
	$(document).ready(function(){
     $("#Pacientes_tipo_trasplante_id").prop("disabled", true);
	 $("#nac").prop("disabled", true);
	 $("#cedula").prop("readonly", true);  
	 $("#Pacientes_apellido1").prop("readonly", true);
	 $("#Pacientes_apellido2").prop("readonly", true);
	 $("#Pacientes_nombre1").prop("readonly", true);
	 $("#Pacientes_nombre2").prop("readonly", true);
     $("#Pacientes_fecha_nac").prop("readonly", true);
      
	});
	</script>
      <?php }
	  else{ 
              $estatus="Estatus_pac_normal"; 
              ?>
                
	  	<script>
	   $(document).ready(function(){
          $("#Pacientes_estatus_id").prop("disabled", true);	 
	   });
	   </script>
	  <?php };
	echo $form->dropDownListRow($model, 'tipo_trasplante_id',  CHtml::listData(Tipos_trasplantes::model()->findAll(), 'tipo_trasplante_id', 'tipo_trasplante'));?>

    <?php echo $form->labelEx($model,'cedula'); ?>
    <?php echo $form->dropDownList($model,'nacionalidad',array('V'=>'Venezolano','E'=>'Extranjero') ,array('style'=>'width:120px', 'id'=>'nac')); ?>
	<?php echo $form->textField($model,'cedula',array('size'=>12,'maxlength'=>12, 'id'=>'cedula','onkeypress'=>'return numeros(event);','style'=>'width:147px;')); ?>
<img id="imgLoad" alt="Cargando..." src="<?php echo Yii::app()->theme->baseUrl; ?>/css/loading.gif" style="max-width:24px; vertical-align:top; display:none" />
	<?php echo $form->error($model,'cedula'); ?>	
	<!-- Peticion ajax -->
	<script>
	$('#cedula').on('change', function(){
	   $.ajax({
		   url: <?php echo "'".CController::createUrl('Pacientes/Buscapersona')."'"; ?>,
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
			$('#Pacientes_apellido1').val(info.PRIMERAPELLIDO);
			$("#Pacientes_apellido1").prop("readonly", true);
                        $('#Pacientes_apellido2').val(info.SEGUNDOAPELLIDO);
		        $("#Pacientes_apellido2").prop("readonly", true);
                        $('#Pacientes_nombre1').val(info.PRIMERNOMBRE);
			$("#Pacientes_nombre1").prop("readonly", true);
                        $('#Pacientes_nombre2').val(info.SEGUNDONOMBRE);
			$("#Pacientes_nombre2").prop("readonly", true);
                        $('#Pacientes_fecha_nac').val(info.FECHANAC);
			$("#Pacientes_fecha_nac").prop("readonly", true);

		   }
        }
					        });
					    });
					</script>
	
	<?php echo $form->textFieldRow($model,'apellido1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'apellido2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre1',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'nombre2',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'fecha_nac',array('class'=>'span5')); ?>

	
	<?php echo $form->labelEx($model,'peso'); ?>
	<?php //echo $form->textFieldRow($model,'peso',array('class'=>'span5','maxlength'=>5));
	$this->widget('CMaskedTextField',array(
       'model'=>$model,
       'attribute'=>'peso',
       'name'=>'peso',
       'mask'=>'099.99',
	   'placeholder' => 'x',
       'htmlOptions'=>array(
        'style'=>'width:80px;'
    ),
    ));
    ?>
	<?php //echo $form->textFieldRow($model,'talla',array('class'=>'span5','maxlength'=>5)); ?>
	<?php echo $form->labelEx($model,'talla');?>
	<?php
	$this->widget('CMaskedTextField',array(
       'model'=>$model,
       'attribute'=>'talla',
       'name'=>'talla',
       'mask'=>'9.99',
       'htmlOptions'=>array(
        'style'=>'width:80px;'
    ),
));
 ?>

	<?php //echo $form->textFieldRow($model,'sangre_id',array('class'=>'span5','maxlength'=>20)); 
          echo $form->dropDownListRow($model, 'sangre_id',  CHtml::listData(Sangre::model()->findAll(), 'sangre_id', 'grupo_sanguineo')); 
    ?> 
	

	<?php //echo $form->textFieldRow($model,'centro_id',array('class'=>'span5')); 
            echo $form->dropDownListRow($model, 'centro_id',  CHtml::listData(Centros_hospitalarios::model()->findAll(), 'centro_id', 'nombre')); 
    ?> 
	<?php echo $form->labelEx($model,'fecha_ini_prog'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_ini_prog',
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
    
	<?php echo $form->labelEx($model,'fecha_ini_dial'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_ini_dial',
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

	<?php //echo $form->textFieldRow($model,'dialisis_id',array('class'=>'span5')); 
            echo $form->dropDownListRow($model, 'dialisis_id',  CHtml::listData(Tipos_dialisis::model()->findAll(), 'dialisis_id', 'tipo_dialisis')); 
	?>

	<?php echo $form->textAreaRow($model,'parametros_dialisis',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->labelEx($model,'telefono'); ?>
	<?php //echo $form->textFieldRow($model,'telefono',array('class'=>'span5','maxlength'=>20)); 
     $this->widget('CMaskedTextField',array(
       'model'=>$model,
       'attribute'=>'telefono',
       'name'=>'telefono',
       'mask'=>'(0999) 999.99.99',
	   'placeholder' => 'x',
       'htmlOptions'=>array(
        'style'=>'width:160px;'
    ),
    ));
    ?>
	
	<?php echo $form->labelEx($model,'celular'); ?>
	<?php //echo $form->textFieldRow($model,'celular',array('class'=>'span5','maxlength'=>20)); 
	 $this->widget('CMaskedTextField',array(
       'model'=>$model,
       'attribute'=>'celular',
       'name'=>'celula',
       'mask'=>'(0499) 999.99.99',
	   'placeholder' => 'x',
       'htmlOptions'=>array(
        'style'=>'width:160px;'
    ),
    ));
	?>

	<?php echo $form->textFieldRow($model,'correo_electronico',array('class'=>'span5','maxlength'=>50)); ?>

	<?php //echo $form->textFieldRow($model,'region_id',array('class'=>'span5')); 
            echo $form->dropDownListRow($model, 'region_id',  CHtml::listData(Regiones::model()->findAll(), 'region_id', 'region'));
	?>

       <?php echo $form->dropDownListRow($model,'estado_id',
                   CHtml::listData(Estados::model()->findAll(),'estado_id','estado'),
                        array(
                            'class'=>'span5','maxlength'=>12,
                            'ajax'=>array(
                            'type'=>'POST',
                            'url'=>CController::createUrl('Pacientes/Selectmunicipio'),
                            'update'=>'#Pacientes_municipio_id',
                            'beforeSend' => 'function(){
                               $("#Pacientes_municipio_id").find("option").remove();
                            }',  
                            ),'prompt'=>'Seleccione un Estado'
        )                
        ); ?>

        <?php echo $form->dropDownListRow($model,'municipio_id',
                   CHtml::listData(Municipios::model()->findAll(),'municipio_id','municipio'),
                        array(
                              'class'=>'span5','maxlength'=>12,   
                              'ajax'=>array(
                              'type'=>'POST',
                              'url'=>CController::createUrl('Pacientes/Selectparroquia'),
                              'update'=>'#'.CHtml::activeId($model,'parroquia_id'),
                              'beforeSend' => 'function(){
                               $("#Pacientes_parroquia_id").find("option").remove();
                               }',  
                            ),'prompt'=>'Seleccione un Municipio'
                        )
        ); ?>


       <?php echo $form->dropDownListRow($model,'parroquia_id',CHtml::listData(Parroquias::model()->findAll(),'parroquia_id', 'parroquia'),
             array('class'=>'span5','maxlength'=>12),
             array('prompt'=>'Seleccione una Parroquia')); ?>

	<?php echo $form->textFieldRow($model,'persona_contacto',array('class'=>'span5','maxlength'=>50)); ?>
    
	<?php echo $form->labelEx($model,'telefono_contacto'); ?>
	<?php //echo $form->textFieldRow($model,'telefono_contacto',array('class'=>'span5','maxlength'=>20)); 
	  $this->widget('CMaskedTextField',array(
       'model'=>$model,
       'attribute'=>'telefono_contacto',
       'name'=>'telefono_contacto',
       'mask'=>'(0999) 999.99.99',
	   'placeholder' => 'x',
       'htmlOptions'=>array(
        'style'=>'width:160px;'
    ),
    ));
	?>

	<?php echo $form->labelEx($model,'porcentaje_par'); ?>
	<?php //echo $form->textFieldRow($model,'porcentaje_par',array('class'=>'span5')); 
	$this->widget('CMaskedTextField',array(
       'model'=>$model,
       'attribute'=>'porcentaje_par',
       'name'=>'porcentaje_par',
       'mask'=>'99',
	   'placeholder' => 'x',
       'htmlOptions'=>array(
        'style'=>'width:160px;'
    ),
    ));
	
	?>

	<?php //echo $form->textFieldRow($model,'fecha__act_par',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'fecha__act_par'); ?>
	<?php
			 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha__act_par',
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
	<?php echo $form->textAreaRow($model,'enfermedad_actual',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'antecedentes_pers',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'accesos_vasculares',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'genero',array('class'=>'span5','maxlength'=>1)); 
            echo $form->dropDownListRow($model, 'genero',  CHtml::listData(Generos::model()->findAll(), 'id', 'genero'));
	?>

	<?php //echo $form->textFieldRow($model,'condicion_id',array('class'=>'span5')); 
           echo $form->dropDownListRow($model, 'condicion_id',  CHtml::listData(Condicion_paciente::model()->findAll(), 'condicion_id', 'condicion'));
	?>

	<?php if($model->isNewRecord){
           echo $form->dropDownListRow($model, 'estatus_id',  CHtml::listData(Estatus_pac::model()->findAll(), 'estatus_id', 'estatus'));
         }
         else
         {
        echo $form->dropDownListRow($model, 'estatus_id',  CHtml::listData(Estatus_pac_normal::model()->findAll(), 'estatus_id', 'estatus'));
         } 
	?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
