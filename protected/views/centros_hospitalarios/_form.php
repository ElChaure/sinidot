<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'centros-hospitalarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'cedula',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nombre',array('class'=>'span5','maxlength'=>80)); ?>

	<?php //echo $form->textFieldRow($model,'tipo_centro_id',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model,'tipo_centro_id', 
                   CHtml::listData(Tipos_centros::model()->findAll(), 'tipo_centro_id', 'tipo_centro'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>

	<?php echo $form->textAreaRow($model,'direccion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>


        <?php echo $form->dropDownListRow($model,'estado_id',
                   CHtml::listData(Estados::model()->findAll(),'estado_id','estado'),
				        //array('empty'=>'- Seleccione Estado -'),
                        array(
                            'class'=>'span5','maxlength'=>12,
                            'ajax'=>array(
                            'type'=>'POST',
                            'url'=>CController::createUrl('Centros_hospitalarios/Selectmunicipio'),
                            'update'=>'#Centros_hospitalarios_municipio_id',
                            'beforeSend' => 'function(){
                               $("#Centros_hospitalarios_municipio_id").find("option").remove();
                            }',  
                            ),'prompt'=>'Seleccione un Estado'
        )                
        ); ?>

        <?php echo $form->dropDownListRow($model,'municipio_id',
                   CHtml::listData(Municipios::model()->findAll(),'municipio_id','municipio'),
				        //array('empty'=>'- Seleccione Municipio -'),				   
                        array(
                              'class'=>'span5','maxlength'=>12,   
                              'ajax'=>array(
                              'type'=>'POST',
                              'url'=>CController::createUrl('Centros_hospitalarios/Selectparroquia'),
                              'update'=>'#'.CHtml::activeId($model,'parroquia_id'),
                              'beforeSend' => 'function(){
                               $("#Centros_hospitalarios_parroquia_id").find("option").remove();
                               }',  
                            ),'prompt'=>'Seleccione un Municipio'
                        )
        ); ?>


       <?php echo $form->dropDownListRow($model,'parroquia_id',CHtml::listData(Parroquias::model()->findAll(),'parroquia_id', 'parroquia'),
	         //array('empty'=>'- Seleccione Parroquia -'),	   
             array('class'=>'span5','maxlength'=>12,),
             array('prompt'=>'Seleccione una Parroquia')); ?>

        <?php echo $form->dropDownListRow($model,'region_id', 
                   CHtml::listData(Regiones::model()->findAll(), 'region_id', 'region'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>

        <?php echo $form->dropDownListRow($model, 'ctx_id',array('1' => 'Es Centro de Trasplante', '2' => 'No Es Centro de Trasplante')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
