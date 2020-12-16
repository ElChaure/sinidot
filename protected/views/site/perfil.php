
<!-- Incluimos archivos requeridos -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/validaciones.js"></script>

<?php


$this->breadcrumbs=array(
	'Perfil de Usuario',
);
?>

<body onselectstart="return false;" ondragstart="return false;">
	
	<h1>Perfil de Usuario (<?php echo Yii::app()->user->name; ?>)</h1>
	<br />
		<!-- Inicio Form  -->	
	<div class="form-user">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'edit-user-form',
				'enableAjaxValidation'=>false,
				'action'=>'?r=site/perfil',
			)); ?>
                <div class="edit-user">
						<table border="0" style="width: 100%;">
						<tr>
							<td class="edit-h6" colspan="4"><h6>Cuenta de Usuario</h6></td>
						</tr>	
						<tr style="height: 10px;"></tr>
						<tr>
							<td style="padding-left:10px;">Nombre de Usuario: </td>
	                        <td><input id="username" type="text" name="username" readonly="readonly" value="<?php echo Yii::app()->user->name;?>"/>&nbsp;</td>
							<td style="padding-left:10px;">Correo Electrónico: </td>
	                        <td><input id="correo" type="text" name="correo" readonly="readonly" value="<?php echo Yii::app()->user->email;?>"/>&nbsp;</td>
                            </div>        
	                    </tr>
	                    <tr>
							<td class="edit-h6" colspan="4"><h6>Actualizar Contraseña</h6></td>
						</tr>	
						<tr style="height: 10px;"></tr>
						<tr>
							<td style="padding-left:10px;">Nueva Contraseña: </td>
	                        <td><input id="clave" type="password" name="clave"/>&nbsp;</td>
	                    </tr>  
						</table>

					</div>
			<br />		
			<div class="but">
				<input id="cmdbus" type="submit" name="cmdbus" value="Guardar Cambio"/>
			</div>		

			<?php $this->endWidget(); ?>
	</div>
	<!-- Fin Form  -->	
</body>


