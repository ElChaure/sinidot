
<?php
/* @var $this ExpedientesController */
/* @var $model Expedientes */
/* @var $model_datosPersonales */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expedientes-form',
	'enableAjaxValidation'=>true,
	//'enctype' => 'multipart/form-data',
)); ?>

	<p class="note">Los Campos <span class="required">*</span> son obligatorios.</p>
	<br />
	<?php 
	if ($model->isNewRecord==false) 
	{ 
		$model_datosPersonales=DatosPersonales::model()->findByPk($model->id_datos_personales); 
		if($model_beneficiario->id_beneficiario != NULL){ 
		$model_beneficiario=Beneficiario::model()->findByPk($model->id_beneficiario); }
	}
	?>
	<!--Añadir Modelo Beneficiario, una vez creado-->

	<!-- Pestaña Status -->	
	<div style="padding-left:30px;">
		<div class="pest1" id="pest1">ACTIVO</div>
	</div>	

	<div style="padding-left:30px;">
		<div class="pest2" id="pest2">EGRESADO / <span id="fecha_egreso"></span></div>
	</div>

	<!-- Inicio Formulario Datos Personales-->
<div class="dform">
	<table border="0" style="width: 750px;">
	<tr>
	<td colspan="3" class="stform">Datos Personales</td>
	</tr>	
	<tr>
	<td>	
		<?php echo $form->labelEx($model_datosPersonales,'cedula'); ?>
		<?php echo $form->textField($model_datosPersonales,'cedula',array('size'=>8,'maxlength'=>8, 'id'=>'cedula', 'onkeypress'=>'return numeros(event);')); ?> <img style="vertical-align:top; cursor:pointer;" title="Presione para Validar" src="<?php echo Yii::app()->request->baseUrl; ?>/images/search.png"/>
		<?php echo $form->error($model_datosPersonales,'cedula'); ?>
	</td>
	<!-- Peticion ajax -->
	<script>
	    $('#cedula').on('blur', function(){
	        $.ajax({
	        url: <?php echo "'".CController::createUrl('expedientes/Validar')."'"; ?>,
	            data: {'cedula' : $('#cedula').val()},
	            type: "post",
	            success: function(data){	
	            	var info = JSON.parse(data);    
	            	/* La cédula se encuentra registrar en el Sistema de Expedientes */            				
	                if (info["donde"] == "2"){
		                if (confirm("Existe un Expediente activo en el sistema asociado al número de cédula "+". \nPresione Aceptar si desea realizar el cambio de expediente correspondiente al titular, en caso contrario si desea verificar nuevamente el dato ingresado presione Cancelar")) {
							location.href="<?php echo Yii::app()->createUrl('expedientes/admin'); ?>";
						}
					}

					/* Mostrar en TextField valores asociados a la Cedula ingresada desde la consulta a SIGEFIRRHH */
					if (info["donde"] == "3"){
			            nombres.value = info["primer_nombre"]+" "+info["segundo_nombre"];
			            $("#nombres").prop("readonly", true);
			            apellidos.value = info["primer_apellido"]+" "+info["segundo_apellido"];
			            $("#apellidos").prop("readonly", true);
			          	ingreso_mpps.value = info["fecha_ingreso"];
			          	cargo.value = info["descripcion_cargo"];
			          	cargo.title = info["descripcion_cargo"];
			          	$("#cargo").prop("readonly", true);
			          	dependencia.value = info["nombre"];
			          	dependencia.title = info["nombre"];
			          	$("#dependencia").prop("readonly", true);
			          	
			          	if(info["estatus"] == 'A'){ $("#pest2").hide(); $("#pest1").show(); }	
			          	if(info["estatus"] == 'E'){ $("#pest1").hide(); $("#pest2").show(); $("#fecha_egreso").html(info["fecha_egreso"]); } 

					} 
	            }
	        });
	    });
	</script>
		<td>	
			<?php echo $form->labelEx($model_datosPersonales,'ingreso_mpps'); ?>
			<!-- Calendario de Fecha -->
			<?php
				 if ($model_datosPersonales->ingreso_mpps!='') {
				 $model_datosPersonales->ingreso_mpps=date('d-m-Y',strtotime($model_datosPersonales->ingreso_mpps));
				 }
				 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				 'model'=>$model_datosPersonales,
				 'attribute'=>'ingreso_mpps',
				 'language' => 'es',
				 'htmlOptions' => array('readonly'=>"readonly",'id'=>'ingreso_mpps'),
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
					 'maxDate'=>'date("Y-m-d")', //Fecha Máxima
					 ),
				 )); ?>	
			<?php echo $form->error($model_datosPersonales,'ingreso_mpps'); ?>
		</td>
	</tr>
	<tr>
	<td>
		<?php echo $form->labelEx($model_datosPersonales,'apellidos'); ?>
		<?php echo $form->textField($model_datosPersonales,'apellidos',array('id'=>'apellidos', 'onkeypress'=>'return letras(event);')); ?>
		<?php echo $form->error($model_datosPersonales,'apellidos'); ?>
	</td>
	<td>
		<?php echo $form->labelEx($model_datosPersonales,'nombres'); ?>
		<?php echo $form->textField($model_datosPersonales,'nombres',array('id'=>'nombres', 'onkeypress'=>'return letras(event);')); ?>
		<?php echo $form->error($model_datosPersonales,'nombres'); ?>
	</td>
	</tr>
	</table>
</div>	
	<!-- Fin Formulario Datos Personales -->
<br />

	<!-- Formulario Datos Expedientes -->
<div class="dform">
	<table border="0" style="width: 750px;">
		<tr>
		<td colspan="3" class="stform">Datos Expediente</td>
		</tr>	
		<tr>
		<td>	
			<?php echo $form->labelEx($model_datosPersonales,'id_condicion'); ?>
			<?php echo $form->dropDownList($model_datosPersonales,'id_condicion', CHtml::listData(Condicion::model()->findAll(array('order' => 'descripcion DESC')),'id_condicion','descripcion'));?>
			<?php echo $form->error($model_datosPersonales,'id_condicion'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'id_tipo_personal'); ?>
			<?php echo $form->dropDownList($model,'id_tipo_personal', CHtml::listData(TipoPersonal::model()->findAll(),'id_tipo_personal','personal'), array('empty'=>'--Seleccione una opcion--')); ?>
			<?php echo $form->error($model,'id_tipo_personal'); ?>
		</td>
		</tr>
		<tr>
		<td>
			<?php echo $form->labelEx($model,'cargo'); ?>
			<?php echo $form->textField($model,'cargo',array('id'=>'cargo','size'=>60,'maxlength'=>150)); ?>
			<?php echo $form->error($model,'cargo'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'dependencia'); ?>
			<?php echo $form->textField($model,'dependencia',array('id'=>'dependencia','size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'dependencia'); ?>
		</td>
		</tr>
		<!-- Status se almacena por defecto en 1 => Activo -->
		<tr>
		<td>
			<?php echo $form->labelEx($model,'prestado'); ?>
			<?php $datos=array('N'=>'No','S'=>'Si')?>
			<?php echo $form->DropDownList($model,'prestado',$datos);?>
			<?php echo $form->error($model,'prestado'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'id_tipo_expediente'); ?>
			<?php echo $form->dropDownList($model,'id_tipo_expediente', CHtml::listData(TipoExpediente::model()->findAll(),'id_tipo_expediente','descripcion'), array('empty'=>'--Seleccione una opcion--','id'=>'tipoexpediente')); ?>
			<?php echo $form->error($model,'id_tipo_expediente'); ?>
		</td>
		</tr>
		<tr>
			<?php if ($model->isNewRecord==true) { ?>
			<td>
				<?php echo $form->labelEx($model,'n_folios'); ?>
				<?php echo $form->textField($model,'n_folios',array('onkeypress'=>'return numeros(event);')); ?>
				<?php echo $form->error($model,'n_folios'); ?>
			</td>
		<?php } ?>
		<!-- Hidden/Show Formulario Beneficiarios -> $model_beneficiario -->
		<script>    
	        $(document).ready(function(){
	            var droplist = $('#tipoexpediente');
	            droplist.change(function(e){
	                if (droplist.val() == 12){
	                    $('#benef').show();
	                    return false;
	                }
	                else{
	                	$('#benef').hide();
	                    return false;
	                }
	            })
	        });
		</script>

		<td>
			<?php echo $form->labelEx($model,'observaciones'); ?>
			<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'observaciones'); ?>
		</td>
		</tr>
		<tr>
		<td colspan="3" style="background-color:#e5e5e5; text-align:center;">Mobiliario</td>
		</tr>
		<tr>
		<td>
			<?php echo $form->labelEx($model,'id_mobiliario'); ?>
			<?php echo $form->dropDownList($model,'id_mobiliario', CHtml::listData(Mobiliario::model()->findAll(array('order' => 'mobiliario ASC')),'id_mobiliario','mobiliario','id_típo_expediente'), array('empty'=>'--Seleccione una opcion--')); ?>
			<?php echo $form->error($model,'id_mobiliario'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model,'id_bandeja_mobi'); ?>
			<?php echo $form->dropDownList($model,'id_bandeja_mobi', CHtml::listData(BandejaMobi::model()->findAll(),'id_bandeja_mobi','bandeja'), array('empty'=>'--Seleccione una opcion--')); ?>
			<?php echo $form->error($model,'id_bandeja_mobi'); ?>
		</td>
		</tr>
	</table>
</div>
	<br />
<div id="benef" class="dform" style="display:none">
	<table border="0" style="width: 750px;">
		<tr>
			<p style="color:#3f75cd; font-size:12px">Únicamente aplica para Tipo de Expediente: <b>Resueltos</b></p>
		</tr>
		<tr>
		<td>	
			<?php echo $form->labelEx($model_beneficiario,'cedula'); ?>
			<?php echo $form->textField($model_beneficiario,'cedula'); ?>
			<?php echo $form->error($model_beneficiario,'cedula'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model_beneficiario,'nombres'); ?>
			<?php echo $form->textField($model_beneficiario,'nombres'); ?>
			<?php echo $form->error($model_beneficiario,'nombres'); ?>	
		</td>
		</tr>
		<tr>
		<td>
			<?php echo $form->labelEx($model_beneficiario,'apellidos'); ?>
			<?php echo $form->textField($model_beneficiario,'apellidos'); ?>
			<?php echo $form->error($model_beneficiario,'apellidos'); ?>
		</td>
		<td>
			<?php echo $form->labelEx($model_beneficiario,'id_tipo_bene'); ?>
			<?php echo $form->dropDownList($model_beneficiario,'id_tipo_bene', CHtml::listData(TipoBene::model()->findAll(),'id_tipo_bene','parentesco'), array('empty'=>'--Seleccione una opcion--'));?>
			<?php echo $form->error($model_beneficiario,'id_tipo_bene'); ?>
		</td>
		</tr>
	</table>
</div>	
<!--<div class="dform">
	<table border="0" style="width: 750px;">
		<tr>
		<td colspan="3" class="stform">Carga de Archivos</td>
		</tr>	

		<tr>
		<td colspan="3" style="background-color:#e5e5e5; text-align:center;"></td>
		</tr>
		<tr>
		<td>
			<div class="uplo">
				<p style="color:#3f75cd; font-size:12px; text-align:center">Seleccione el <b>archivo</b> asociado al Expediente</p>				
		    </div>
		
		</td>
		<td>
			<div class="uplo">
				<p style="color:#3f75cd; font-size:12px; text-align:center">Archivos Cargados</p>
			</div>
		</td>
		</tr>
	</table>
</div>-->
<!-- Inicio Formulario Carga Expediente Digital-->


	<!-- Fin Formulario Beneficiarios -->
	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar'); ?>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->