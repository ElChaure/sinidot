<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'examenes-form',
	'enableAjaxValidation'=>false,
)); ?>
       
	<p class="help-block">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'paciente_id',array('class'=>'span5'));?>

	<?php //echo $form->textFieldRow($model,'fecha_examen',array('class'=>'span5')); ?>
	<?php echo $form->labelEx($model,'fecha_examen'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			 'model'=>$model,
			 'attribute'=>'fecha_examen',
			 'language' => 'es',
			 'options'=>array(
				 'autoSize'=>true,
				 'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.gif',
                 'buttonImageOnly'=>true,
                 'buttonText'=>'Fecha de Nacimiento',
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



	<?php //echo $form->textFieldRow($model,'aghbs',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model,'aghbs', 
                   CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>

	<?php //echo $form->textFieldRow($model,'anticore',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model,'anticore', 
                   CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>

	<?php //echo $form->textFieldRow($model,'hvc',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model,'hvc', 
                   CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
                   array('class'=>'span5','maxlength'=>12)); 
        ?>

	<?php //echo $form->textFieldRow($model,'acaghbs',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model,'acaghbs', 
                   CHtml::listData(Posinega::model()->findAll(), 'id', 'valor'),
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
